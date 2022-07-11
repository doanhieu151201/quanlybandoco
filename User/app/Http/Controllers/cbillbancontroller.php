<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cbillbans;
use Datetime;
class cbillbancontroller extends Controller
{
    //
    public function index(){
          $data = cbillbans::all();
          return json_encode($data);
    }
    public function Get(){
        return cbillbans::all();
    }


    public function store(Request $request){
        $db = new cbillbans();
    
        $db->id_bill_ban = $request->id_bill_ban;
        $db->sp = $request->sp;
        $db->sl = $request->sl;
        $db->id_kh = $request->id_kh;   
        $db->tong = $request->tong;   
    
        $db->created_at = new datetime();
        $db->updated_at = new datetime();
        $db->save();
        return $db;
     }
}
