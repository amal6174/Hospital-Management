<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\admin\Page;
use App\Models\admin\Page_management;
use App\Models\Doctor;
use App\Models\admin\Partner;
use App\Models\DoctrAchhivement;
use App\Models\GeneralSettings;

class homeController extends Controller
{
    public function home(){


      $data['page_content'] = Page_management::where('id',1)->first();

      $data['categories'] = Category::where('status',1)
            ->select('id', 'category_name')
            ->distinct()
            ->get();

     $general_settings = GeneralSettings::where('status',1)->get();

     $data['partners'] = Partner::where('status',1)->get();
     $data['doctors'] =  Doctor::count();


      return view('frontent.home',$data)->with('general_settings',$general_settings);
    }

    public function about(){

     $data['doctors']  = Doctor::with('category')
                                ->latest('id')
                                ->take(4)
                                ->get();

     $data['achives'] = DoctrAchhivement::where('status',1)->latest()->take(6)->get();

    $data['page_content'] = Page_management::where('id',2)->first();



        return view('frontent.about',$data);
    }



    public function service(){

        $data['page_content'] =  Page_management::where('id',3)->first();

        return view('frontent.service',$data);
        //  return view('frontent.service');
    }

    public function department(){
        $departmment =  Category::all();

        $page_content = Page_management::where('id','4')->first();


        return view('frontent.department', compact('departmment','page_content'));
    }

    public function single_department(){
        return view('frontent.department-single');
    }

    public function doctor($id = null){

    $categories  = Category::all();

    if($id){

        $doctors = Doctor::where('category_id', $id)->get();
    }else{

          $doctors = Doctor::all();

    }




       $page_content = Page_management::where('id',5)->first();

    //    $doctors  = Doctor::with('category')
    //                          ->where('status',1)
    //                          ->first()
    //                          ->take(11)
    //                          ->get();;

        return view('frontent.doctor',compact('page_content','doctors','categories'));
    }

    public function sigle_doctor( string $slug){

    // $doctor = Doctor::where('slug',$slug)->first();

    $doctor = Doctor::with('category')
                      ->where('slug',$slug)
                      ->firstOrFail();

        return view('frontent.doctor-single',compact('doctor'));
    }




    public function appointment(){
        return view('frontent.appoinment');
    }

    public function blog_sidebar(){

         $data['page_content'] = Page_management::where('id',6)->first();

         $data['blogs'] = Blog::where('status',1)
                                ->latest()
                               ->paginate(config('app.pagination_limit'));


        return view('frontent.blog-sidebar',$data);

    }


    public function contact(){

      $data['page_content'] = Page_management::where('id',7)->first();

        return view('frontent.contact',$data);
    }

    public function terms(){
        $general_settings = GeneralSettings::where('status', 1)->get()->keyBy('field_name');
        $terms            = \App\Models\TermsAndCondition::where('status', 1)
                                ->orderBy('order')
                                ->orderBy('id')
                                ->get();

        return view('frontent.terms-and-conditions', compact('general_settings', 'terms'));
    }

    public function blog_single($slug){
       $blog  = Blog::where('slug',$slug)
                      ->firstOrFail();
                    //   $blog =  Blog::findOrFail($slug);

      return view('frontent.blog-single',compact('blog'));

    }

    // public function footer(){
    //     $departments = Category::where('status',1)->get();

    //     return view('layouts.app',compact('departments'));
    // }

//
//
}
