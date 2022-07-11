<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCC;
class NhaCCController extends Controller
{
    public function index(){
    $data = NhaCC::all();
    return json_encode($data);
   }
   public function getall(){
       return NhaCC::all();
   }
   public function update(request $request,$id){
        $db = NhaCC::findorFail($id);
        $db->ten_ncc=$request->ten_ncc;;
        $db->diachi_ncc = $request->diachi_ncc;
        $db->sdt = $request->sdt;
        $db->email = $request->email;
        $db->save();
        return $db;
    }
    public function show($id){
        return NhaCC::find($id);
    }
    public function destroy($id){
        return NhaCC::destroy($id);
    }
    public function store(Request $request)
    {
        $db = new NhaCC();
        // $db=$request->all();
        $db->id = $request->id;
        $db->ten_ncc=$request->ten_ncc;;
        $db->diachi_ncc = $request->diachi_ncc;
        $db->sdt = $request->sdt;
        $db->email = $request->email;
        $db->save();
        return $db;
    }
}
