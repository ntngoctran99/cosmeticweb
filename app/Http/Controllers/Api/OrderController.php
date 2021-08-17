<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 1;
        $data = Order::all();
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
            'total' => 'required',
            'payment' => 'required',
            'status' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'staff_id' => 'required|exists:staffs,id',
            'customer_id' => 'required|exists:customers,id',
        ], [
            //Required
            'total.required' => 'Please enter the total!',
            'payment.required' => 'Please enter the payment!',
            'status.required' => 'Please enter the status',
            'fullname.required' => 'Please enter the fullname!',
            'address.required' => 'Please enter the address!',
            'phone_number.required' => 'Please enter the phone number!',
            'staff_id.required' => 'Please enter the staff!',
            'customer_id.required' => 'Please enter the customer!',
            //Exists
            'staff_id.exists' => 'Please enter a correct Staff!',
            'customer_id.exists' => 'Please enter a correct Customer!',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => -2,
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        $order = Order::create([
            'total' => $request->input('total'),
            'payment' => $request->input('payment'),
            'note' => $request->input('note'),
            'status' => $request->input('status'),
            'fullname' => $request->input('fullname'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'staff_id' => $request->input('staff_id'),
            'customer_id' => $request->input('customer_id'),
        ]);

        return response()->json([
            'status' => 1,
            'data' => $order,
            'message' => "Create Order Successful!",
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
        $order = Order::find($id);
        if ($order == null) {
            $status = -1;
            $message = "Cannot find this Order!";
        }
        else {
            $message = "Successful!";
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $order,
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
        $order = Order::find($id);
        if ($order == null) {
            $status = -1;
            $message = "Cannot find this Order!";
        }
        else {
            $order->update($request->all());
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
        $order = Order::find($id);
        if ($order == null) {
            $status = -1;
            $message = "Cannot find this Order!";
        }
        else {
            $order->delete();
            $message = "Delete Successful!";
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
}
