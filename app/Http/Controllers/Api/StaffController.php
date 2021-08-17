<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 1;
        $data = Staff::all();
        if ($data->isEmpty()) {
            $status = -1;
            $message = "No Data";
        }
        else {
            $message = "Successful!";
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
            ]);
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'user_id' => 'required|exists:users,id',
        ], [
            //Required
            'fullname.required' => 'Please enter the fullname!',
            'phone_number.required' => 'Please enter the phone number!',
            'gender.required' => 'Please enter the gender',
            'address.required' => 'Please enter the address!',
            'email.required' => 'Please enter the email!',
            'user_id.required' => 'Please enter the User!',
            //Exists
            'user_id.exists' => 'Please enter a correct User!',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => -2,
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        $staff = Staff::create([
            'fullname' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json([
            'status' => 1,
            'data' => $staff,
            'message' => "Create Staff Successful!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = 1;
        $staff = Staff::find($id);
        if ($staff == null) {
            $status = -1;
            $message = "Cannot find this Staff!";
        }
        else {
            $message = "Successful!";
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $staff,
            ]);
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
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
        $status = 1;
        $staff = Staff::find($id);
        if ($staff == null) {
            $status = -1;
            $message = "Cannot find this Staff!";
        }
        else {
            $staff->update($request->all());
            $message = "Update Successful!";
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 1;
        $staff = Staff::find($id);
        if ($staff == null) {
            $status = -1;
            $message = "Cannot find this Staff!";
        }
        else {
            $staff->delete();
            $message = "Delete Successful!";
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
}
