<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use PDF;
use App\User;
use App\Equipment;
use App\Ticket;
use App\TicketHistory;
use App\UserTicket;
use App\Notify;
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
        $equipment = Equipment::where('id', $request->equipment_id)->update(['status' => 3]);

        $history = TicketHistory::create([
            'ticket_id' => $request->ticket_id,
            'description' => 'The ticket is now assigned to one of the maintenance team',
            'status' => 'The ticket is now assigned',
            'logs' => auth()->user()->name]
        );

        return response()->json([$userTicket, $ticket, $equipment]);
    }
    public function notifyStore(Request $request)
    {
        // dd($request->all());
        $ticket = Ticket::where('id', $request->ticket_id)->update(['status' => 3]);
        $equipment = Equipment::where('id', $request->equipment_id)->update(['status' => 5]);

        $history = TicketHistory::create([
            'ticket_id' => $request->ticket_id,
            'description' => 'Supervisor has officially completed the ticket',
            'status' => 'The ticket is now completed',
            'logs' => auth()->user()->name]
        );
      
        return back()->with('message','Ticket Completed');
    }
    public function ticketUpdate(Request $request)
    {
        // dd($request->all());
        $ticket = Ticket::where('id', $request->ticket_update)->update(['status' => 2]);
        $equipment = Equipment::where('id', $request->equipment_update)->update(['status' => 4]);

        $history = TicketHistory::create([
            'ticket_id' => $request->ticket_update,
            'description' => 'Supervisor re-opened the ticket',
            'status' => 'The ticket is re-opened',
            'logs' => auth()->user()->name]
        );
      
        return back()->with('message','Ticket Re-Opened');
    }
     public function printReport(Request $request)
    {
        $ac =  $request->ac_cost;
        $sl =  $request->sv_life;
        $sv =  $request->sv_value;
        $dv =  $request->d_value;
        $url = url("equipmentview/$request->equipment_id");
        $equipment = Equipment::find($request->equipment_id);
        $qrcode = base64_encode(QrCode::format('svg')
            ->size(200)
            ->errorCorrection('H')
            ->generate($url));
        if ($equipment) {
            $pdf = PDF::loadView('reports', compact('equipment','qrcode','ac','sl','dv','sv'));
            return $pdf->stream(); 
        } else {
            return redirect()->route('home');
        }
    }
    public function assets(Request $request)
    {
       
        return view('supervisor.main.assetsview');
    }
    public function assetsStore(Request $request)
    {
        // $who = Notify::findOrFail($request->ticket_id);
        try {
            $equipment = Equipment::findOrFail($request->equipment_id);
        } catch (ModelNotFoundException $e) {
            return back()
                ->withError('Equipment ID: ' . $request->equipment_id . ' Not Found!')
                ->withInput();
        }

        return view('supervisor.main.assets', compact('equipment'));
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
    public function notify(){
        $data = Notify::paginate(3);
        return view('supervisor.main.notify',compact('data'));
    }
}
