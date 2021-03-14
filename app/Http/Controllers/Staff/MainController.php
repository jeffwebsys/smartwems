<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Ticket;
use App\Equipment;
use App\EquipmentCategory;
use DataTables;
use Response;

class MainController extends Controller
{
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
                    return $data->id;
                })
                ->addColumn('item_name', function ($data) {
                    return $data->eqticket->item_name;
                })
                ->addColumn('name', function ($data) {
                    return $data->ticketuser['name'];
                })
                ->addColumn('status', function ($data) {
                    if ($data->eqticket->status == 2):
                        return '<span class="badge outline-badge-warning"> With Pending Request </span>';
                    endif;
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
    public function openticket(Request $request)
    {
        $ticket = Ticket::create([
            'equipment_id' => $request->item2,
            'staff_id' => auth()->user()->id,
            'name' => 'Logged Ticket',
            'reason' => $request->item4,
            'status' => 0,
        ]);

        Equipment::where('id', $request->item2)->update(['status' => 2]);
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
