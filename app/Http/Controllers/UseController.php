<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =User::create([
            'username' => $request->username,
            'password' => $request->password
        ]);

        return response()->json($user);
    }

    /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
*/
public function show($id)
{
    $user = User::findOrfail($id);

if(!$user){
    return response()->json([
        'message' => 'User not found'
    ]);
}


    return response()->json($user);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = User::find($id);
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
        $orders = User:: where('id',$id)->first();
        if(!$orders){
            return response()->json([
                'messsage' =>'item not found' 
            ]);

        }else{
            User::destroy($id);
            return response()->json([
                'message'=>'item deleted'
            ]);
        }
    }
}
