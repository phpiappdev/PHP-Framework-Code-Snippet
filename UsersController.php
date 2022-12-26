<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendor_list = User::where('id', Auth::id())->first();

        //Check Roles of Admin and Vendors
        if ($vendor_list->hasRole('admin')) {
            $vendor_list = User::role('vendor')->get();
        } else {
            $vendor_list = User::where('id', Auth::id())->get();
        }

        // check user request
        if ($request->segment(2) == 'users') {
            return view('admin.users.index');
        }
        if ($request->segment(2) == 'vendors') {
            return view('admin.vendors.index', compact('vendor_list'));
        }
        if ($request->segment(2) == 'agents') {
            return view('admin.agents.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $user_type = '';
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $password = Str::random(10);
            $data = User::create([
                'firstname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                // 'user_type' => $user_type,
                'password'  => Hash::make($password),
            ]);
            if ($request->segment(2) == 'vendors') {
                $data->assignRole('vendor');
            }

            \Mail::to($request->email)->send(new \App\Mail\CreateVendor(['email' => $request->email, 'password' => $password, 'link' => $request->root()]));

            return response()->json(['success' => 'Vendor create successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user_detail = User::with('userDetail', 'attachment')->where('id', $id)->first()->toArray();
        //check user request
        if ($request->segment(2) == 'vendors') {
            return view('admin.vendors.view', compact('user_detail'));
        }
        if ($request->segment(2) == 'agents') {
            return view('admin.agents.view');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_type = '';
        //Validate Request
        $request->validate([
            'delivery_charges' => 'required',
            'vendor_tax' => 'required',
            'gst' => 'required',
        ]);

        $data = User::where('id', $id)->first();
        $data->firstname = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->location = $request->location;

        $update = $data->save();

        // Save file to Database
        if ($request->hasFile('attach')) {
            Attachment::updateOrCreate(['parent_id' => $id, 'type' => 'user_profile'], ['attach' => $request->file('attach')]);
        }

        $userDetails = UserDetail::updateOrCreate([
            'user_id'   => $id,
        ], [
            'alternate_number'     => isset($request->alternate_number) ? $request->alternate_number : '',
            'delivery_charges' => isset($request->delivery_charges) ? $request->delivery_charges : '',
            'vendor_tax'    => isset($request->vendor_tax) ? $request->vendor_tax : '',
            'gst'   => isset($request->gst) ? $request->gst : '',
        ]);
        return redirect('admin/vendors/' . $id)->with('message', 'User details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Reset password
    public function resetpassword(Request $request)
    {
        $request->validate(['password' => ['required', 'string', 'min:8']]);
        $data = User::where('id', Auth::id())->first();
        $data->password = Hash::make($request->password);
        $update = $data->save();

        return redirect('admin/vendors/' . Auth::id())->with('message', 'User Password has been updated successfully');
    }
}
