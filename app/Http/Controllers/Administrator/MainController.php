<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Notifications\AddedUser;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\EquipmentCategory;
use App\EquipmentLocation;
use DataTables;
use Response;
use Carbon\Carbon;

class MainController extends Controller
{
    //
    public function users(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereNotIn('user_type', [1])
                ->latest()
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('id', function($data){
                //     return $data->id;
                // })
                // ->addColumn('checkbox', function($data){
                //     return '<input type="checkbox" name="check[]" value="'.$data->id.'" id="check">';
                // })
                ->addColumn('user_type', function ($data) {
                    if ($data->user_type == 2) {
                        return 'Supervisor';
                    } elseif ($data->user_type == 3) {
                        return 'Maintenance Staff';
                    } elseif ($data->user_type == 4) {
                        return 'Staff';
                    } elseif ($data->user_type == 5) {
                        return 'Supply Officer';
                    } elseif ($data->user_type == 6) {
                        return 'Supplier';
                    } else {
                        return 'Staff';
                    }
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('date', function ($data) {
                    $time = date('F j, Y, g:i a', strtotime($data->created_at));
                    return $time;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Modify</a>';

                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';

                    return $btn;
                })

                ->rawColumns(['user_type', 'name', 'date', 'password', 'email', 'action'])
                ->make(true);
        }

        return view('administrator.main.users')->with('data');
    }

    public function store(Request $request)
    {
        $date = $request->banned_until;
        $banned = Carbon::now()->addDays($date);
        $password = $request->password;
        $hashed = Hash::make($password);
        $user = User::updateOrCreate(['id' => $request->user_id], ['name' => $request->name, 'password' => $hashed, 'email' => $request->email, 'banned_until' => $date == 0 ? null : $banned, 'user_type' => $request->user_type]);

        if ($user->wasRecentlyCreated) {
            $response['status'] = 'success';
            $response['message'] = 'Data saved.';
        } else {
            $response['status'] = 'warning';
            $response['message'] = 'User already exist.';
        }
        // Notify Admin
        $userNotify = User::where('id', auth()->user()->id)->first();
        $userNotify->notify(new AddedUser());
        // Notify The user
        Mail::to($user->email)->send(new WelcomeMail($user));

        return Response::json($response);
    }
    public function settings()
    {
        $equipmentCategory = EquipmentCategory::all();
        $equipmentLocation = EquipmentLocation::all();

        return view('administrator.main.settings', compact('equipmentCategory', 'equipmentLocation'));
    }
    public function settingsStore(Request $request)
    {
        if ($request->category_type == 1) {
            $eq = EquipmentCategory::create(
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ])
            );
        } else {
            $eq = EquipmentLocation::create(
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ])
            );
        }

        return back()->with(['message' => 'Category Added Successfully.', 'error' => 'Error']);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'deleted successfully.']);
    }
}
