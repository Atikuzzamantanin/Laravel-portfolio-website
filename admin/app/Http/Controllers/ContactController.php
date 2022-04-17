<?php

namespace App\Http\Controllers;
use App\ContactModel;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactIndex()
    {
        return view('contact');
    }

    public function getcontactData()
    {
       $result=json_encode(ContactModel::orderBy('id','desc')->get());
       return $result;    
    }

    public function contactDelete(Request $req)
    {
        $id = $req->input('id');
        $result = ContactModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
