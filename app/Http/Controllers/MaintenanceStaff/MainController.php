<?php

namespace App\Http\Controllers\MaintenanceStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UserTicket;
use App\TicketHistory;
use App\Equipment;
use App\Ticket;
use App\User;
use App\Notify;
use App\Procurement;
use DataTables;
use Response;
use App\Mail\TicketRequested;
use Mail;
use DB;

class MainController extends Controller
{
    public function pending(Request $request)
    {
        if ($request->ajax()) {
            $data = UserTicket::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ticket_id', function ($data) {
                    // return $data->ticketOwner['id'];
                    return '<a href="' . route('maintenancestaff.history', $data->ticketOwner->id) . '">' . $data->id . '</a>';
                })
                ->addColumn('equip_id', function ($data) {
                    return $data->equipmentOwner->id;
                })
                ->addColumn('created_at', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->ticketOwner->created_at));
                    return $time;
                })
                ->addColumn('user_id', function ($data) {
                    return $data->equipmentOwner->item_name;
                })
                ->addColumn('reason', function ($data) {
                    return $data->ticketOwner->reason;
                })
                ->addColumn('supervisor', function ($data) {
                    return $data->staff_name;
                })
                ->addColumn('status', function ($data) {
                    return $data->tixStatus;
                })
                ->addColumn('name', function ($data) {
                    return $data->ticketOwner->name;
                })
                ->addColumn('assign', function ($data) {

                    
                    if($data->ticketOwner->status == 3):
                        return  'Completed';
                    else:
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="editUser">
                    <span class="badge badge-warning" style="font-size: 10px;"> Update </span></a>';
                  
                     $btn = $btn. '<span style="margin-right: 10px;"></span><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="EditProc" class="Proc">
                     <span class="badge badge-warning" style="font-size: 10px;"> Proc. Request </span></a>';
                   

                    return $btn;
                    endif;
                   
                })

                ->rawColumns(['id', 'equip_id', 'ticket_id', 'user_id', 'reason', 'supervisor', 'status', 'name', 'assign', 'created_at'])
                ->make(true);
        }

        return view('maintenancestaff.main.pending')->with('data');
    }
    public function history($id)
    {
        $history = TicketHistory::where('ticket_id', $id)->latest()->paginate(4);
        return view('staff.main.history',compact('history'));
    }
    public function getProcurement(Request $request)
    {
        $data = Procurement::where('user_id', auth()->user()->id);
        return view('maintenancestaff.main.pending')->with('data');
    }
    public function store(Request $request)
    {
        // Notify Supervisor
        $notify = Notify::updateOrCreate([
            'ticket_id' => $request->ticket_id],
            ['user_id' => auth()->user()->id,
            'equipment_id' => $request->equipment_id,
            'remarks' => $request->remarks]
        );
      
        // Change value to For Approval
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 2]);
        $equipment = Equipment::where('id', $request->equipment_id)->update(['status' => 4]);  

        $history = TicketHistory::create([
            'ticket_id' => $request->ticket_id,
            'description' => 'Ticket Update: '.$request->remarks,
            'status' => 'The ticket is now being viewed by supervisor',
            'logs' => auth()->user()->name]
        );
       
        $usersup = User::where('user_type', 2)->first();
        $userstaff = User::where('user_type',4)->first();

        $res = Mail::to([auth()->user()->email,$usersup->email,$userstaff->email])
        ->cc(['darksil3nt17@gmail.com','lenzras@gmail.com'])
        ->send(new TicketRequested($history));

         return response()->json();
    }
      public function procurementStore(Request $request)
    {
        // Create procurement
        $procurementStore = Procurement::updateOrCreate(
            ['ticket_id' => $request->ticket_id],
            ['user_id' => auth()->user()->id,
            'equipment_id' => $request->equipment_id
            ]);
            $history = TicketHistory::create([
                'ticket_id' => $request->ticket_id,
                'description' => 'Procurement has been requested',
                'status' => 'The ticket is now for approval',
                'logs' => auth()->user()->name]
            );

            return response()->json();
    }
    public function edit($id)
    {
        $user = UserTicket::find($id);
        return response()->json($user);
    }
    public function destroy($id)
    {
        UserTicket::find($id)->delete();

        return response()->json(['success' => 'Provincial deleted successfully.']);
    }

    public function completed(Request $request)
    {
        if ($request->ajax()) {
            $data = UserTicket::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ticket_id', function ($data) {
                    return $data->ticketOwner['id'];
                })
                ->addColumn('equip_id', function ($data) {
                    return $data->equipmentOwner->id;
                })
                ->addColumn('created_at', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->ticketOwner->created_at));
                    return $time;
                })
                ->addColumn('user_id', function ($data) {
                    return $data->equipmentOwner->item_name;
                })
                ->addColumn('reason', function ($data) {
                    return $data->ticketOwner->reason;
                })
                ->addColumn('supervisor', function ($data) {
                    return $data->staff_name;
                })
                ->addColumn('status', function ($data) {
                    return $data->tixStatus;
                })
                ->addColumn('name', function ($data) {
                    return $data->ticketOwner->name;
                })
                ->addColumn('assign', function ($data) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Update Progress</a>';

                    return $btn;
                })

                ->rawColumns(['id', 'equip_id', 'ticket_id', 'user_id', 'reason', 'supervisor', 'status', 'name', 'assign', 'created_at'])
                ->make(true);
        }

        return view('maintenancestaff.main.completed')->with('data');
    }
    public function procurement(Request $request)
    {
        if ($request->ajax()) {
            $data = Procurement::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('created_at', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->procurementTicket->created_at));
                    return $time;
                })
                ->addColumn('equip_name', function ($data) {
                    return $data->procurementEquipment->item_name;
                })
                ->addColumn('request_origin', function ($data) {
                    return $data->procurementTicket->id;
                })
                ->addColumn('request_by', function ($data) {
                    return $data->procurementUser->name;
                })
                ->addColumn('status', function ($data) {
                    return $data->tixStatus;
                })
                // ->addColumn('assign', function ($data) {
                //     if($data->attachment == NULL){

                //         $ath = 'No Data';
                //     }

                //    return $ath;
                // })

                ->rawColumns(['id', 'created_at', 'equip_name', 'request_origin', 'request_by', 'status'])
                ->make(true);
        }

        return view('maintenancestaff.main.procurement')->with('data');
    }
    public function inventory(Request $request)
    {
        if ($request->ajax()) {
            $data = UserTicket::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ticket_id', function ($data) {
                    return $data->ticketOwner['id'];
                })
                ->addColumn('equip_id', function ($data) {
                    return $data->equipmentOwner->id;
                })
                ->addColumn('created_at', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->ticketOwner->created_at));
                    return $time;
                })
                ->addColumn('user_id', function ($data) {
                    return $data->equipmentOwner->item_name;
                })
                ->addColumn('reason', function ($data) {
                    return $data->ticketOwner->reason;
                })
                ->addColumn('supervisor', function ($data) {
                    return $data->staff_name;
                })
                ->addColumn('status', function ($data) {
                    return $data->tixStatus;
                })
                ->addColumn('name', function ($data) {
                    return $data->ticketOwner->name;
                })
                ->addColumn('assign', function ($data) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Update Progress</a>';

                    return $btn;
                })

                ->rawColumns(['id', 'equip_id', 'ticket_id', 'user_id', 'reason', 'supervisor', 'status', 'name', 'assign', 'created_at'])
                ->make(true);
        }

        return view('maintenancestaff.main.inventory')->with('data');
    }
    
}  
