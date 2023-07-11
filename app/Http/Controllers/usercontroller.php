<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usercontroller extends Controller
{
    public $token = 'stoken5';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
       return $users;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = request(); 
        
        if(!$request->get('name')){
            return response()->json(['message' => ' you have not passed any name data '], 400 );
        }
        if(!$request->get('email')){
            return response()->json(['message' => ' you have not passed any email data '], 400 );
        }
        if(!$request->get('password')){
            return response()->json(['message' => ' you have not passed any password data '], 400 );
        }
        //check for any existing users
        $user_exists=User::where('email',$request->get('email'))->first();
        if($user_exists){
            return response()->json(['message' => ' you account already exists'], 409);   
        }
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return response()->json(['message' => ' Users successfully created '], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( string $id)
    {
      $user = User::find($id);
      if($user)
      return $user;
      else
      return response()->json(['message' => ' user Not Found !'], 404);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
      $user = User::find($id);
      if(!$request->get('token')){
        return response()->json(['message' => 'Unauthorized:  you have not passed the access token '], 403 );
     }
     else{
        if($request->get('token')!=$this->token){
            return response()->json(['message' => 'Unauthorized: Invalid Access Token '], 403 );
        }
     }
      if($user){
        if($request->get('name'))
        $user->name = $request->get('name'); 
        if($request->get('email')){
            return response()->json(['message' => ' Email updation is not allowed'], 403);
        }
        if($request->get('password'))
        $user->password = $request->get('password');
        $user->save();
        return response()->json(['message' => ' User Successfully updated'], 200 );
      } 
      else{
        return response()->json(['message' => ' user Not Found !'], 404);
      } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user)
        {
            $user->delete();
            return response()->json(['message' => ' user Successfully deleted'], 200 );
        }
        else
        return response()->json(['message' => ' user Not Found !'], 404);
    }
}