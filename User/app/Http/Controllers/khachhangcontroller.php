<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use Datetime;

class khachhangcontroller extends Controller
{
    
    public function index(){
          $data = khachhang::all();
          return json_encode($data);
    }
    public function Get(){
        return khachhang::all();
    }


    public function store(Request $request){
        $db = new khachhang();
        $db->ten_kh = $request->ten_kh;
        $db->email = $request->email;
        $db->dia_chi = $request->dia_chi;
        $db->sdt = $request->sdt;   

        $db->created_at = new datetime();
        $db->updated_at = new datetime();
        $db->save();
        return $db;
     }
}
