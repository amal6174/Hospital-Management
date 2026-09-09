<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Http\Requests\DoctroRequest;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Qualification;
use Throwable;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index(Request $request)
    {

        $doctors  =  Doctor::with([
            'category',
            'qualifications'
        ])->latest()->paginate(config('app.pagination_limit'));



        //   if($request-=>ajax()){

        //   return response()->json([
        //     'doctors' => $doctors->items(),
        //     'current_page' => $doctors->currentPage(),
        //     'last_page' => $doctors->lastPage(),
        //     'total' => $doctors->total(),
        // ]);

        //   }


        return view('admin.doctor_view', compact('doctors'));
    }

    public function create()
    {

        //   $doctors = Doctor::with([
        //            'category',
        //            'qualifications'
        //             ])->get();

        //   $doctors = Doctor::with([
        //     'categories',
        //     'qualifications'
        //   ])->get();


        $categories  =  Category::where('status', 1)
            ->orderBy('category_name')
            ->get();

        $qualifications =  Qualification::where('status', 1)
            ->orderBy('qualification_name')
            ->get();


        return view('admin.doctor_create', compact('categories', 'qualifications'));
    }




    public function insert(DoctorRequest $request)
    {
        //  public function insert(Request $request){
        // dd($request->all());
        // dd('STORE METHOD HIT');
        // dd($request->all());

        DB::beginTransaction();

        try {

            $data  =  $request->validated();
            //   $data  =  $request->all();
            //  dd($data);

            // Qualification Id
            $qualificationIds = $data['qualification_name'];

            // remove qualification
            unset($data['qualification_name']);

            // upload image
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('doctors', 'public');
            }

            // ccreate Doctor
            $doctor  =  Doctor::create($data);

            // insert pivot record
            //    $doctor->qualification_name()->attach($qualificationIds);

            $doctor->qualifications()->attach($qualificationIds);


            DB::commit();

            return redirect()->route('admin.doctor.index')
                ->with('success', 'Doctor Added Successfull');
        } catch (\Throwable $e) {
            DB::rollBack();

            // return back()
            //         ->with('error',"errorrrr");
            dd($e->getMessage());
        }
    }


    public function edit(Doctor $doctor)
    {
        // dd($doctor);

        $categories =  Category::where('status', 1)
            ->orderBy('category_name')
            ->get();
        $qualifications = Qualification::where('status', 1)
            ->orderBy('qualification_name')
            ->get();





        $selectedQualifications = $doctor->qualifications
            ->pluck('id')
            ->toArray();

        return view('admin.doctor_edit', compact(
            'doctor',
            'categories',
            'qualifications',
            'selectedQualifications'
        ));





        // return view(
        //     'admin.doctor_edit',
        //     compact(
        //         'doctor',
        //         'categories',
        //         'qualifications',
        //         'selectedQualifications'
        //     )
        // );

    }


    public function update(DoctorUpdateRequest $request, $id)
    {
        //  dd($request->all());
        DB::beginTransaction();

        //   dd($request->all());
        //   dd('update method reached');

        $data  =  $request->all();
        try {


            $doctor =  Doctor::findOrFail($id);

            // dd($data['qualification_name']);
            $qualificationIds = $data['qualification_name'];

            // doctor table a qualification jabe na tai unlink kora holo
            unset($data['qualification_name']);

            // image upload new

            if ($request->hasFile('image')) {

                if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {

                    Storage::disk('public')->delete($doctor->image);
                }

                // new iimage store
                $data['image'] = $request->file('image')->store('doctors', 'public');
            }

            // new iimage store
            //  $data['image'] = $request->file('image')->store('doctors','public');


            $doctor->update($data);


            // Update pivot table data
            $doctor->qualifications()->sync($qualificationIds);

            DB::commit();

            return redirect()
                ->route('admin.doctor.index')
                ->with('success', 'Doctor Updated Successfully');
        } catch (Throwable $e) {

            // dd($e->getMessage());
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }


    public function delete($id)
    {

        try{



        } catch(\Throwable $e){

        }

        $doctor =  Doctor::findOrfail($id);

        $doctor->delete();

        return redirect()->route('admin.doctor.index');
    }
}
