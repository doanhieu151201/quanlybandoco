<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;

class sanphamcontroller extends Controller
{
    //
    public function index(){
          $data = sanpham::all();
          return json_encode($data);
    }
    public function Get(){
        return sanpham::all();
    }

    public function show($id)
    {
        return sanpham::find($id);
    }


}
