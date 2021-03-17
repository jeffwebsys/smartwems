<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Ticket;
use App\UserTicket;
use DataTables;
use Response;

class MainController extends Controller
{
    //
    public function stafflist(Request $request)
    {
        if ($request->ajax()) {
            $data = Ticket::req(0)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('item_name', function ($data) {
                    return $data->eqticket->item_name;
                })
                ->addColumn('name', function ($data) {
                    return $data->ticketuser['name'];
                })
                ->addColumn('status', function ($data) {
                    return $data->TicketStatus;
                })
                ->addColumn('reason', function ($data) {
                    return $data->reason;
                })
                ->addColumn('assign', function ($data) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Assign</a>';

                    return $btn;
                })
                ->rawColumns(['id', 'item_name', 'name', 'status', 'reason', 'assign'])
                ->make(true);
        }

        return view('supervisor.main.stafflist')->with('data');
    }
    public function store(Request $request)
    {
        // create a ticket assigned to maintenance team
        $userTicket = UserTicket::create([
            'user_id' => $request->user_id,
            'ticket_id' => $request->ticket_id,
            'equipment_id' => $request->equipment_id,
            'staff_name' => $request->staff_name,
        ]);
        // when done assigned team - with pending status
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 1]);

        return response()->json([$userTicket, $ticket]);
    }
    public function edit($id)
    {
        $user = Ticket::find($id);
        return response()->json($user);
    }
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'Provincial deleted successfully.']);
    }
}
