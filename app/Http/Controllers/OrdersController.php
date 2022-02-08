<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $orders = Orders::create([
            'item_name' =>$request->item_name,
            'quantity' =>$request->quantity,
            'amount' => $request->amount,
            'user_id'=>$request->user_id
        ]);

        return response()->json($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders= Orders::where('id',$id)->first();
        if(!$orders){
            return response()->json([
                'message'=>'item not found'
            ]);} 
        return response()->json($orders); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $orders = Orders::find($id);
        $orders->update($request -> all());
        return response()->json($orders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Orders:: where('id',$id)->first();
        if(!$orders){
            return response()->json([
                'messsage' =>'item not found' 
            ]);

        }else{
            Orders::destroy($id);
            return response()->json([
                'message'=>'item deleted'
            ]);
        }
    }
}
