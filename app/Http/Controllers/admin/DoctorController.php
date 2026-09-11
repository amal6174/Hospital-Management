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

use function Termwind\render;

class DoctorController extends Controller
{
    public function index(Request $request)

    {
        $searchString =  $request->text;

        $search = $request->text;

        $doctors  =  Doctor::with([
            'category',
            'qualifications'
        ])->latest()->paginate(config('app.pagination_limit'));

           // manual search
        // if ($searchString != null) {

        //     $doctors =  Doctor::where('name', 'like', "%$searchString%")
        //         ->orWhere('email', 'like', "%$searchString%")
        //         ->orWhere('phone', 'like', "%$searchString%")
        //         ->paginate(5);

        //      return view('admin.doctor_view', compact('doctors'));
        // }

        $doctors = Doctor::with('category')
                             ->when($search, function ($query) use ($search){

                             $query->where( function ($q) use ($search){

                                // Doctor field
                                $q->where('name', 'like',  "%{$search}%")
                                ->orWhere('email','like', "%{$search}%")
                                ->orWhere('phone', 'like', "%{$search}%")



                                ->orWhereHas('category', function ($categoryQuery) use ($search){

                                $categoryQuery->where('category_name', 'like', "%{$search}%");

                                });

                             });

                             })  ->latest()
                                 ->paginate(config('app.pagination_limit'))
                                 ->withQueryString();









        if ($request->ajax()) {

            return view('admin.doctors.partials.doctor-lists', [
                'doctors' => $doctors
            ])->render();
        }



        // admin.doctors.partials.doctor-lists

        return view('admin.doctor_view', compact('doctors'));
    }


    public function create()
    {


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


    public function edit(Request $request, Doctor $doctor)
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


        $page  =  $request->page;



        return view('admin.doctor_edit', compact(
            'doctor',
            'categories',
            'qualifications',
            'selectedQualifications',
            'page'
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
            $page  =  $request->page ?? 1;


            // Update pivot table data
            $doctor->qualifications()->sync($qualificationIds);

            DB::commit();



            return redirect()
                ->route('admin.doctor.index', ['page' => $page])
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


        try {
        } catch (\Throwable $e) {
        }

        $doctor =  Doctor::findOrfail($id);

        $doctor->delete();

        return redirect()->route('admin.doctor.index');
    }

    // public function Search($searchString){



    // }

}
