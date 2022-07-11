<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\billban;
use Datetime;
class billbancontroller extends Controller
{
    //
    public function index(){
          $data = billban::all();
          return json_encode($data);
    }
    public function Get(){
        return billban::all();
    }


    public function store(Request $request){
        $db = new billban();
        $db->id_kh = $request->id_kh;
        $db->name_kh = $request->name_kh;
     
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->note = $request->note;
        $db->created_at = new datetime();
        $db->updated_at = new datetime();
        $db->save();
        return $db;
     }
}
