<?php

namespace App\Http\Controllers;

use App\PhotoTableModel;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    public function photoIndex(){
        return view('photo');
    }

    public function photoJSON(Request $request){
     return  PhotoTableModel::take(3)->get();
  }

  public function photoJSONById(Request $request){
    $FirstId=$request->id;
    $LastId= $FirstId+3;
   return  PhotoTableModel::where('id','>=',$FirstId)->where('id','<',$LastId)->get();
 }
    
    public function photoUlod(Request $request){
      $photoPath =$request->file('photo')->store('public');
      $photoName=(explode('/', $photoPath))[1];
      $host=$_SERVER['HTTP_HOST'];
      $location="http://".$host."/storage/".$photoName;

      $result=PhotoTableModel::insert(['location'=>$location]);
      return $result;
      
    }
}
