<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Datetime;
class Usercontroller extends Controller
{
    //
    public function index(){
     $db = User::all();
     return json_encode($db);
    }
    
    public function Get(){
        return User::all();
    } 
    public function update(request $request,$id){
        $db = User::findorFail($id);
        $db->users_name = $request->users_name;
        $db->email = $request->email;
        $db->password = $request->password;
      
        $db->save();
        return $db;
    }
    public function show($id){
        return User::find($id);
    }
    public function destroy($id){
        return User::destroy($id);
    }
    public function store(Request $request)
    {
        $db = new User();
    
        $db->id = $request->id;
        $db->users_name = $request->users_name;
        $db->email = $request->email;
        $db->password = $request->password;
        $db->save();
        return $db;
    }

}