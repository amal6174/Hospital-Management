<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctrAchhivement;
use App\Models\Doctor;



class DoctrAchhivementController extends Controller
{
    public function index()
    {
        $achives  = DoctrAchhivement::with('doctor')
            ->latest()
            ->paginate(config('app.pagination_limit'));

        // $doctors  = DoctrAchhivement::with('doctors')
        //                               ->where('status',1)
        //                               ->orderBy('name')
        //                               ->get();

        return view('admin.achivement', compact('achives'));
    }

    public function create()
    {

        $doctors  = Doctor::where('status',1)->latest()->get();

        return view('admin.achivement_create', compact('doctors'));
    }



    public function insert(Request  $request)
    {
        // dd($request->all());
        $data  =  $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:150',
            'doctor_id' => 'required',
            'status' => 'required',

        ]);


        if ($request->hasFile('image')) {
            $image  =  $request->file('image')->store('achivements', 'public');
            $data['image'] = $image;
        }

        DoctrAchhivement::create([
            'image' => $data['image'],
            'name' => $data['name'],
            'doctor_id' => $data['doctor_id'],
            'status' => $data['status'],

        ]);

        return redirect()->route('admin.d.achivement.view')->with('success', 'Achivement Data Insert Successfull');
    }




       public function edit($id){
                  $achives = DoctrAchhivement::with('doctor')->findOrFail($id);

                  $doctors = Doctor::where('status',1)
                                      ->orderBy('name')
                                      ->get();

                  return view('admin.achivement_edit', compact('achives','doctors'));

           }






    public function update(Request $request, $id)
    {

        $achive  = DoctrAchhivement::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required|string',
            'doctor_id' => 'required',
            'status' => 'required'


        ]);

         // store old image
          $data['image'] =  $achive->image;

        if($request->hasFile('image')){
             $image  =  $request->file('image')->store('achivments','public');
             $data['image'] =  $image;
        }

        $achive->image = $data['image'];
        $achive->name = $data['name'];
        $achive->doctor_id = $data['doctor_id'];
        $achive->status = $data['status'];

        $achive->save();

        return redirect()->route('admin.d.achivement.view');



    }

    public function delete($id){
        $achive  =   DoctrAchhivement::findOrFail($id);

        $achive->delete();
        return redirect()->route('admin.d.achivement.view')->with('success','Data Delete Succesfull');
    }

    // public function trusht(){

    // $records = DoctrAchhivement::onlyTrashted()->latest()->get();

    // return view('admin.trusht',compact(''))

    // }

    public function SoftDelete($id){

      $record = DoctrAchhivement::withTrashed()->findOrFail($id);

      $record->delete();

      return redirect()
      ->back()
      ->with('achievement_success','Achivemment Delete Succeessfull');

    }

    public function reStore($id){
        $record = DoctrAchhivement::withTrashed()->findOrFail($id);

        $record->restore();

        return redirect()
        ->back()
        ->with('achievement_success','Achive Data Restore Success');
    }

    public function forceDelete($id){
        $record = DoctrAchhivement::withTrashed()->findOrFail($id);

        $record->forceDelete();

        return redirect()->back()->with('achievement_success','Parmanetly Delete');
    }

// php artisan make::migration add_deleted_at_column_to_achivements_table --tables=

}
