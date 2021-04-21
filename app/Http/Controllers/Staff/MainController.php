<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\User;
use App\Notify;
use App\Ticket;
use App\TicketHistory;
use App\Equipment;
use App\EquipmentCategory;
use App\EquipmentLocation;
use DataTables;
use Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\SendTicket;
use Mail;

class MainController extends Controller
{
    public function equipment(Request $request)
    {
        $equip = Equipment::get();
        $equipment = EquipmentCategory::get();
        $locations = EquipmentLocation::get();

        if ($request->ajax()) {
            $data = Equipment::get();

            // $sql = array([$data,$equipment]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('item_name', function ($data) {
                    return '<a href="' . route('staff.equipmentView', $data->id) . '">' . $data->item_name . '</a>';
                })
                ->addColumn('item_description', function ($data) {
                    return $data->item_description;
                })
                ->addColumn('ac_date', function ($data) {
                    $time = $data->ac_date;
                    return $time;
                })
                ->addColumn('model_no', function ($data) {
                    return $data->model_no;
                })
                ->addColumn('serial_no', function ($data) {
                    return $data->serial_no;
                })
                ->addColumn('status', function ($data) {
                    return $data->EquipmentStatus;
                })

                ->rawColumns(['item_name', 'item_description', 'ac_date', 'model_no', 'serial_no', 'status', 'action'])
                ->make(true);
        }

        return view('staff.main.equipment', compact('equipment', 'locations', 'equip'));
    }
    public function servicelist(Request $request)
    {
        if ($request->ajax()) {
            $data = Ticket::get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('id', function($data){
                //     return $data->id;
                // })
                // ->addColumn('checkbox', function($data){
                //     return '<input type="checkbox" name="check[]" value="'.$data->id.'" id="check">';
                // })
                ->addColumn('id', function ($data) {
                    return '<a href="' . route('staff.history', $data->id) . '">' . $data->id . '</a>';
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
                ->addColumn('date', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->created_at));
                    return $time;
                })

                ->rawColumns(['id', 'item_name', 'name', 'status', 'date'])
                ->make(true);
        }

        return view('staff.main.servicelist')->with('data');
    }
    public function track(Request $request)
    {
        // $notify = Notify::where('ticket_id', $request->ticket_id)->get();

        return view('staff.main.track');
    }
    public function trackStore(Request $request)
    {
        // $who = Notify::findOrFail($request->ticket_id);
        try {
            $notify = Ticket::findOrFail($request->ticket_id);
        } catch (ModelNotFoundException $e) {
            return back()
                ->withError('Ticket ID: ' . $request->ticket_id . ' Not Found!')
                ->withInput();
        }

        return view('staff.main.search', compact('notify'));
    }
    public function submitTicket(Request $request)
    {
        $ticket = Ticket::updateOrCreate(
            [
                'equipment_id' => $request->equipment_id,
            ],
            ['staff_id' => auth()->user()->id, 'name' => 'Logged Ticket', 'reason' => $request->equipment_remarks, 'status' => 0]
        );

        Equipment::where('id', $request->equipment_id)->update(['status' => 2]);
        
        Mail::to(auth()->user()->email)->send(new SendTicket($ticket));

        return back()->with('message', 'Request Submitted Successfully.');
    }
    public function history($id)
    {
        $history = TicketHistory::where('ticket_id', $id)->latest()->paginate(4);
        return view('staff.main.history',compact('history'));
    }
    public function printPdf(Request $request)
    {
        $purchase = PurchaseRequest::updateOrCreate(
            ['procurement_id' => $request->pro_id],
            ['user_id' => $request->user_id, 'equipment_id' => $request->eqid, 'ticket_id' => $request->ticket_id, 'remarks' => $request->remarks, 'budget' => $request->budget, 'approved_by' => auth()->user()->name]
        );

        if ($purchase) {
            $pdf = PDF::loadView('stub-form', compact('purchase'));
            return $pdf->stream();
        } else {
            return redirect()->route('home');
        }
    }
    public function openticket(Request $request)
    {
        $ticket = Ticket::updateOrCreate(
            [
                'equipment_id' => $request->item2,
            ],
            ['staff_id' => auth()->user()->id, 'name' => 'Logged Ticket', 'reason' => $request->item4, 'status' => 0]
        );
        // Send Email
        Mail::to(auth()->user()->email)->send(new SendTicket($ticket));

        Equipment::where('id', $request->item2)->update(['status' => 2]);
    }
    public function equipmentView($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('staff.main.equipmentview', compact('equipment'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'Provincial deleted successfully.']);
    }
    public function autocomplete(Request $request)
    {
        $data = Equipment::whereIn('status', [0, 1])
            ->where('item_name', "LIKE", "%{$request->input('q')}%")
            ->get();

        return response()->json(['data' => $data]);
    }
}
