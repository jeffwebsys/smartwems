<?php

namespace App\Http\Controllers\SupplyOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Equipment;
use App\EquipmentCategory;
use App\EquipmentLocation;
use App\Procurement;
use DataTables;
use Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
                    return $data['item_name'];
                })
                ->addColumn('item_description', function ($data) {
                    return $data['item_description'];
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
                    if ($data->status == 0):
                        $notif = '<span class="badge badge-warning"> Inactive </span>';
                    else:
                        $notif = '<span class="badge badge-primary"> Active </span>';
                    endif;

                    return $notif;
                })
                ->addColumn('qr_code', function ($data) {
                    $qrcode = url("equipment/$data->id");
                    $qr = Qrcode::size(50)
                        ->backgroundColor(255, 0, 0, 25)
                        ->generate($qrcode);

                    return $qr;
                })
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Edit" class="edit btn btn-primary btn-xs editUser"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';

                    // $btn =
                    //     $btn .
                    //     ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                    //     $row->id .
                    //     '" data-original-title="Delete" class="btn btn-danger btn-xs deleteUser"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>';

                    return $btn;
                })

                ->rawColumns(['item_name', 'item_description', 'ac_date', 'model_no', 'serial_no', 'status', 'action'])
                ->make(true);
        }

        return view('supplyofficer.main.equipment', compact('equipment', 'locations', 'equip'));
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

        return view('supplyofficer.main.procurement',compact('user'))->with('data');
    }
    public function store(Request $request)
    {
        $data = $this->validatedForm();
        $user = Equipment::updateOrCreate(
            [
                'id' => $request->equipment_id,
            ],
            [
                'equipment_categories_id' => $data['equipment_categories_id'],
                'equipment_locations_id' => $data['equipment_locations_id'],
                'item_name' => $data['item_name'],
                'item_description' => $data['item_description'],
                'model_no' => $data['model_no'],
                'serial_no' => $data['serial_no'],
                'property_no' => $data['property_no'],
                'ac_date' => $data['ac_date'],
                'unit_cost' => $data['unit_cost'],
                'res_personnel' => $data['res_personnel'],
                'remarks' => $data['remarks'],
                'status' => $data['status'],
                'last_pm' => $data['last_pm'],
                'next_pm' => $data['next_pm'],
            ]
        );

        if ($user->wasRecentlyCreated) {
            $response['status'] = 'success';
            $response['message'] = 'Data saved.';
        } else {
            $response['status'] = 'warning';
            $response['message'] = 'User already exist.';
        }

        return Response::json($response);
    }
    public function update(Request $request)
    {
        $data = $this->validatedForm();
        $equipment = Equipment::where('id', $request->edit_equipment_id)->update([
            'equipment_categories_id' => $data['equipment_categories_id'],
            'equipment_locations_id' => $data['equipment_locations_id'],
            'item_name' => $data['item_name'],
            'item_description' => $data['item_description'],
            'model_no' => $data['model_no'],
            'serial_no' => $data['serial_no'],
            'property_no' => $data['property_no'],
            'ac_date' => $data['ac_date'],
            'unit_cost' => $data['unit_cost'],
            'res_personnel' => $data['res_personnel'],
            'remarks' => $data['remarks'],
            'status' => $data['status'],
            'last_pm' => $data['last_pm'],
            'next_pm' => $data['next_pm'],
        ]);

        return Response::json($equipment);
    }
    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return response()->json($equipment);
    }
    public function destroy($id)
    {
        Equipment::find($id)->delete();

        return response()->json(['success' => 'Deleted Successfully.']);
    }
    protected function validatedForm()
    {
        return request()->validate([
            'equipment_categories_id' => 'required',
            'equipment_locations_id' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
            'model_no' => 'required',
            'serial_no' => 'required',
            'property_no' => 'required',
            'ac_date' => 'required',
            'unit_cost' => 'required',
            'res_personnel' => 'required',
            'remarks' => 'required',
            'status' => 'required',
            'last_pm' => 'required',
            'next_pm' => 'required',
        ]);
    }
}
