<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 1;
        $data = Cart::all();
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
            'quantity' => 'required',
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
        ], [
            //Required
            'quantity.required' => 'Please enter the quantity!',
            'product_id.required' => 'Please enter the product!',
            'customer_id.required' => 'Please enter the customer!',
            //Exists
            'product_id.exists' => 'Please enter a correct Product!',
            'customer_id.exists' => 'Please enter a correct Customer!',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => -2,
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        $cart = Cart::create([
            'quantity' => $request->input('quantity'),
            'product_id' => $request->input('product_id'),
            'customer_id' => $request->input('customer_id'),
        ]);

        return response()->json([
            'status' => 1,
            'data' => $cart,
            'message' => "Create Cart Successful!",
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
        $cart = Cart::find($id);
        if ($cart == null) {
            $status = -1;
            $message = "Cannot find this Cart!";
        }
        else {
            $message = "Successful!";
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $cart,
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
        //
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
}
