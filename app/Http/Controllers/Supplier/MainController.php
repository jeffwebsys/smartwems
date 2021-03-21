<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UserTicket;
use App\Ticket;
use DataTables;
use App\Notify;
use App\Procurement;
use App\User;

use Response;


class MainController extends Controller
{
    //
     public function servticket(Request $request)
    {
        if ($request->ajax()) {
            $data = Notify::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ticket_id', function ($data) {
                    return $data->serviceTicket->id;
                })
                ->addColumn('created_at', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->serviceTicket->created_at));
                    return $time;
                })
                ->addColumn('user_id', function ($data) {
                    return $data->serviceTicket->reason;
                })
                ->addColumn('item', function ($data) {
                    return $data->serviceEquipment->item_name;
                })
                ->addColumn('supervisor', function ($data) {
                    return $data->serviceEquipment->model_no;
                })
                ->addColumn('status', function ($data) {
                    return '<span class="badge badge-warning"> '.$data->serviceEquipment->serial_no.' </span>';
                })
                ->addColumn('name', function ($data) {
                    return $data->serviceTicket->name;
                })
                ->addColumn('assign', function ($data) {
                    $btn = '<span class="badge badge-info"> troubleshooting details--- <i>'. $data->remarks.'</i> </span>';

                    return $btn;
                })

                ->rawColumns(['id', 'equip_id', 'ticket_id', 'user_id', 'item', 'supervisor', 'status', 'name', 'assign', 'created_at'])
                ->make(true);
        }

        return view('supplier.main.servticket')->with('data');
    }
    public function store(Request $request)
    {
        // Notify Supervisor
        $notify = Notify::updateOrCreate([
            'user_id' => auth()->user()->id],
            ['ticket_id' => $request->ticket_id,
            'equipment_id' => $request->equipment_id,
            'remarks' => $request->remarks]
        );
          // Update the Value to Approval
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 2]);

        return Response::json();
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
         $user = User::where('user_type', 6)->get();
        if ($request->ajax()) {
           
            $data = Procurement::all();
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
                ->addColumn('assign', function ($data) {
                    if($data->attachment == NULL){

                        $ath = 'No Data';
                    }

                   return $ath;
                })
                ->addColumn('action', function ($data) {
                                  
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="editUser">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';
                  
                     $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="EditProc" class="Proc">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg></a>';
                   

                    return $btn;
                    
                })

                ->rawColumns(['id', 'created_at', 'equip_name', 'request_origin', 'request_by', 'status' ,'assign', 'action'  ])
                ->make(true);
        }

        return view('supplier.main.procurement',compact('user'))->with('data');
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
