<?php

namespace App\Http\Controllers;
use App\Models\billban;
use Illuminate\Http\Request;
use \Datetime;
class billbanController extends Controller
{
    //
    public function index(){
        $data = billban::all();
        return json_encode($data);
    }
    public function Get(){
        return billban::all();
    }
    public function update(Request $request,$id){
        $db = billban::find($id);
        $db->id_kh = $request->id_kh;
        $db->name_kh = $request->name_kh;
      

        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->note = $request->note;
        $db->created_at = $request->created_at;
        $db->updated_at = $request->updated_at;
        $db->save();
        return $db;
        
     }
     public function show($id){
         return billban::find($id);
     }
     public function destroy($id){
         $db = billban::destroy($id);
     }
     public function store(Request $request){
         $db = new billban();
         $db->id = $request->id;
         $db->id_kh = $request->id_kh;
         $db->name_kh = $request->name_kh;
      

         $db->date_order = $request->date_order;
         $db->tong_tien = $request->tong_tien;
         $db->payment = $request->payment;
            $db->note = $request->note;
         $db->created_at = $request->created_at;
         $db->updated_at = $request->updated_at;
         $db->save();
         return $db;
        
      }
 }
 