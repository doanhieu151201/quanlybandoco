<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    //
    public function index(){ 
        $data = News::all();
        return json_encode($data);
    }
    public function Get(){
      return News::all();
    }
    public function update(Request $request,$id){
      $db = News::find($id);
      $db->title = $request->title;
      $db->content = $request->content;
      $db->image = $request->image;
      $db->created_at = $request->created_at;
      $db->updated_at = $request->updated_at;
      $db->save();
      return $db;
   }
   public function show($id){
       return News::find($id);
   }
   public function destroy($id){
       $db = News::destroy($id);
   }
   public function store(Request $request){
       $db = new News();
       $db->id_new = $request->id_new;
       $db->title = $request->title;
       $db->content = $request->content;
       $db->image = $request->image;
       $db->created_at = $request->created_at;
       $db->updated_at = $request->updated_at;
       $db->save();
       return $db;
    }
}
