<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaisp;

class loaispcontroller extends Controller
{
    //
    public function index(){
          $data = loaisp::all();
          return json_encode($data);
    }
    public function Get(){
        return loaisp::all();
    }
}
