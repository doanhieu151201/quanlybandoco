<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    //
    public function index(){
          $data = SanPham::all();
          return json_encode($data);
    }
    public function Get(){
        return SanPham::all();
    }
    public function edit($id)
    {
        //
    }
    public function show($id)
    {
        return SanPham::find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new SanPham();
        // $db=$request->all();
        $db->id = $request->id;
        $db->name=$request->name;;
        $db->ten_lsp = $request->ten_lsp;
        $db->id_ncc = $request->id_ncc;
        $db->mota_sp = $request->mota_sp;
        $db->unit_price = $request->unit_price;
        $db->so_luong = $request->so_luong;
        $db->image = $request->image;
        $db->xem = $request->xem;

        $db->don_vi_tinh = $request->don_vi_tinh;
        $db->save();
        return $db;
    }



    public function update(request $request,$id){
        $db = SanPham::findorFail($id);
        $db->name=$request->name;;
        $db->ten_lsp = $request->ten_lsp;
        $db->id_ncc = $request->id_ncc;
        $db->mota_sp = $request->mota_sp;
        $db->unit_price = $request->unit_price;
        $db->so_luong = $request->so_luong;
        $db->image = $request->image;
        $db->don_vi_tinh = $request->don_vi_tinh;
        $db->xem = $request->xem;

        $db->save();
        return $db;
    }
    public function destroy($id){
        return SanPham::destroy($id);
    }


}
