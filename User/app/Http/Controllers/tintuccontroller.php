<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tintuc;

class tintuccontroller extends Controller
{
    //
    public function index(){
          $data = tintuc::all();
          return json_encode($data);
    }
    public function Get(){
        return tintuc::all();
    }
    public function show($id_new)
    {
        return tintuc::find($id_new);
    }
}
