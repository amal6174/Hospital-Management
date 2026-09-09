<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Partner;
use Illuminate\Http\Request;
use App\Models\DoctrAchhivement;

class ForceDeleteController extends Controller
{
    public function index(){
        $achives = DoctrAchhivement::withTrashed()->latest()->get();
        $records = Partner::withTrashed()->latest()->get();

        return view('admin.trusht', compact('achives','records'));
    }



    public function PartnerDelete($id){
       $record = Partner::withTrashed()->findOrFail($id);
       $record->delete();

       return redirect()->back()->with('success','Delete Successful');
    }


    
}
