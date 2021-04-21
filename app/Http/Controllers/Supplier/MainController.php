<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UserTicket;
use App\SupplierReport;
use App\TicketHistory;
use App\Ticket;
use DataTables;
use App\Notify;
use App\Procurement;
use App\User;
use App\File;
use Illuminate\Support\Facades\Storage;

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
                    return '<span class="badge badge-warning"> ' . $data->serviceEquipment->serial_no . ' </span>';
                })
                ->addColumn('name', function ($data) {
                    return $data->serviceTicket->name;
                })
                ->addColumn('assign', function ($data) {
                    $btn = '<span class="badge badge-info"> troubleshooting details--- <i>' . $data->remarks . '</i> </span>';

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
        $notify = Notify::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            ['ticket_id' => $request->ticket_id, 'equipment_id' => $request->equipment_id, 'remarks' => $request->remarks]
        );
        // Update the Value to Approval
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 2]);

        return Response::json();
    }
    public function edit($id)
    {
        $user = Procurement::find($id);
        return response()->json($user);
    }
    public function destroy($id)
    {
        Procurement::find($id)->delete();

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
            $data = Procurement::where('supplier_id', auth()->user()->id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return '<a href="' . route('supplier.supplyReport', $data->id) . '">' . $data->id . '</a>';
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
                    $btn =
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $data->id .
                        '" data-original-title="EditProc" class="editUser">
                     <span class="badge badge-success">Upload File</span></a>';

                    return $btn;
                })
                ->addColumn('file', function ($data) {
                    // $filename = $data->files['title'];
                    // $file = storage_path('app/public/file/' . $filename);

                    // return '<a href="' . url('storage/file/' . $filename) . '"><img src="' . url('storage/file/' . $filename) . '" alt="item-01" width="50" height="50"/></img></a>';
                    if($data->files == NULL):
                    $filename = 'ntx.png';
                   
                    return '<a href="' . route('supplier.media.supplier', $filename) . '"><img src="' . route('supplier.media.supplier', $filename) . '" alt="item-01" width="50" height="50"/></img></a>';

                    else: 
                        $filename = $data->files['title'];
                        return '<a href="' . route('supplier.media.supplier', $filename) . '"><img src="' . route('supplier.media.supplier', $filename) . '" alt="item-01" width="50" height="50"/></img></a>';
                    endif;
                })
                ->rawColumns(['id', 'created_at', 'equip_name', 'request_origin', 'request_by', 'status', 'assign', 'file'])
                ->make(true);
        }

        return view('supplier.main.procurement')->with('data');
    }
    public function fileStore(Request $request)
    {
        $imageData = $this->imageData();

        foreach ($imageData['image'] as $val) {
            $file = $val;
            $filenameWithExt = $val->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $val->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . date('mdYHis') . uniqid() . '.' . $extension;
            $path = $val->storeAs('public/file/', $fileNameToStore);

            $filedb = File::updateOrCreate(['procurement_id' => $request->procurement_id], ['title' => $fileNameToStore]);

            return Response::json($filedb);
        }
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
    public function supplyReport($id)
    {
        $supply = SupplierReport::where('procurement_id', $id)->latest()->paginate(4);
        return view('supplier.main.supplierinfo',compact('supply'));
    }
    public function history($id)
    {
        $history = TicketHistory::where('ticket_id', $id)->latest()->paginate(4);
        return view('supplier.main.history',compact('history'));
    }
    private function imageData()
    {
        return request()->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,bmp,png|max:1024',
        ]);
    }
}
