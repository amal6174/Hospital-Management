<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Page;
use App\Models\admin\Page_management;

class PageController extends Controller
{
    // public function service(){

    // $pages  =  page::where('status',1)
    //                 ->latest()
    //                 ->get();

    //     return view('admin.services', compact('pages'));



    // }

    // public function service_edit($id){

    // $service = Page::findOrFail($id);

    // return view('admin.service_edit',compact('service'));



    // }

    // public function service_update(Request $request){

    // }


    public function index()
    {

        $pages  =  Page_management::all();


        return view('admin.manage_pages', compact('pages'));
    }

    public function edit($id)
    {

        $page_management =  Page_management::findOrFail($id);

        return view('admin.page_edit', compact('page_management'));
    }




    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);

        // dd($request->all());

        $pageManagement = Page_management::findOrFail($id);
        // dd($pageManagement->all());

        $pageManagement->small_title_1 =  $request->small_title_1;
        $pageManagement->small_title_2 =  $request->small_title_2;
        $pageManagement->small_title_3 =  $request->small_title_3;
        $pageManagement->small_title_4 =  $request->small_title_4;
        $pageManagement->small_title_5 =  $request->small_title_5;


        $pageManagement->title_1  =  $request->title_1;
        $pageManagement->title_2  =  $request->title_2;
        $pageManagement->title_3  =  $request->title_3;
        $pageManagement->title_4  =  $request->title_4;
        $pageManagement->title_5  =  $request->title_5;


        $pageManagement->small_description_1 =  $request->small_description_1;
        $pageManagement->small_description_2 =  $request->small_description_2;
        $pageManagement->small_description_3 =  $request->small_description_3;
        $pageManagement->small_description_4 =  $request->small_description_4;
        $pageManagement->small_description_5 =  $request->small_description_5;

        $pageManagement->description_1 = $request->description_1;
        $pageManagement->description_2 = $request->description_2;
        $pageManagement->description_3 = $request->description_3;
        $pageManagement->description_4 = $request->description_4;
        $pageManagement->description_5 = $request->description_5;






        if ($request->hasFile('image_1')) {
            $pageManagement->image_1 =
                $request->file('image_1')->store('page-management', 'public');
        }

        if ($request->hasFile('image_2')) {
            $pageManagement->image_2 =
                $request->file('image_2')->store('page-management', 'public');
        }

        if ($request->hasFile('image_3')) {
            $pageManagement->image_3 =
                $request->file('image_3')->store('page-management', 'public');
        }

        if ($request->hasFile('image_4')) {
            $pageManagement->image_4 =
                $request->file('image_4')->store('page-management', 'public');
        }

        if ($request->hasFile('image_5')) {
            $pageManagement->image_5 =
                $request->file('image_5')->store('page-management', 'public');
        }

        $pageManagement->save();

        return redirect()->route('admin.service.index');
    }
}
