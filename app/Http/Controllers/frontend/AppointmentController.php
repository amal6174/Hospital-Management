<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)
            ->select('id', 'category_name')
            ->distinct()
            ->get();

        $doctors = Doctor::where('status', 1)->get();
        // dd($cat->all());

        return view('frontent.appoinment', compact('categories', 'doctors'));
    }

    public function getDoctors($category_id)
    {
        $doctors = Doctor::where('category_id', $category_id)
            ->where('status', 1)
            ->orderBy('name')
            ->get([
                'id',
                'name'
            ]);

        return response()->json($doctors);
    }




    public function  insert(Request $request)
    {
        // dd($request->all());
        $data =  $request->all();

        Appointment::create($data);

        return redirect()->route('home');
    }
}
