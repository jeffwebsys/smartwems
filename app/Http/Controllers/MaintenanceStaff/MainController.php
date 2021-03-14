<?php

namespace App\Http\Controllers\MaintenanceStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UserTicket;
use App\Ticket;
use DataTables;
use Response;

class MainController extends Controller
{
    public function pending(Request $request)
    {
        if ($request->ajax()) {
            $data = UserTicket::where('user_id', auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ticket_id', function ($data) {
                    return $data->ticketOwner['id'];
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
                
                
                ->rawColumns(['id', 'ticket_id', 'user_id', 'reason', 'supervisor','status','name','assign','created_at'])
                ->make(true);
        }

        return view('maintenancestaff.main.pending')->with('data');
    }
    public function store(Request $request)
    {
        $userTicket = UserTicket::create([
            'user_id' => $request->user_id,
            'ticket_id' => $request->ticket_id,
        ]);
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 1]);
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
}
