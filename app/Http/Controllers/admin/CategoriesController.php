<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function categories(Request $request){


    $categories = Category::latest()->paginate(config('app.pagination_limit'));


        if ($request->ajax()) {
        return view(
            'admin.categories.partials.category-list',
            compact('categories')
        )->render();
    }



    return view('admin.viewcategories', compact('categories'));

    }








    public function categories_page(){
        return view('admin.categories');
    }

    public function caegory_store(Request $request){

    $data = $request->validate([
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'description'   => 'nullable|string',
            'status'        => 'required|boolean',
        ]);

          if($request->hasFile('image')){
            $image  = time().'.'.$request->image->extension();

             $request->image->move(public_path('categories'),$image);
             $data['image'] =  $image;
          }





        Category::create([
            'image' => $data['image'],
            'category_name' => $data['category_name'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);

        return redirect()
                ->route('admin.view.categories')
                ->with('success', 'Category added successfully.');
    }



    public function edit(Request $request, $id){



        $categories = Category::findOrFail($id);

        $page   =  $request->page ?? 1;

        return view('admin.edit_category', compact('categories','page'));
    }






    public function update(Request $request,$id){
//    dd($request->all(), $request->file('image'));
    $data =  $request->validate([
        'image'=> 'nullable|image|mimes:jpg,jpeg,png,webp',
        'category_name'=> 'required',
        'description'=> 'nullable',
        // 'status'=> 'required',
    ]);

         $categories = Category::findOrFail($id);


        if ($request->hasFile('image')) {


        if ($categories->image && file_exists(public_path('categories/' . $categories->image))) {
            unlink(public_path('categories/' . $categories->image));
        }


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('categories'), $imageName);

        $data['image'] = $imageName;
    } else {

        // Keep old image
        $data['image'] = $categories->image;
    }



   $categories->image  =  $data['image'];
    $categories->category_name  =  $data['category_name'];
    $categories->description = $data['description'];
    // $categories->status =  $data['status'];

    $categories->save();

      $page = $request->page ?? 1;






    // return redirect()
    //     ->route('categories.index', ['page' => $page])
    //     ->with('success', 'Category updated successfully.');

    return redirect()
           ->route('admin.view.categories',['page' => $page])->with('success','Category update successfull');


    }


    public function destroy($id){

        $category  =  Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.view.categories')->with('message','Student Delete Successfull');
    }


    public function status($id){

    $category =  Category::findOrFail($id);

        $category->status = !$category->status;
        $category->save();

    // if($category->status == 1){
    //     $category['status'] = 0;
    // }else{
    //     $category['status'] = 1;
    // }

     $category->save();

      return response()->json([
        'success' => true,
        'status'  => $category->status,
        'message' => 'Status updated successfully.'
    ]);

    //  return redirect()->route('admin.view.categories');

    }



     public function view_categories(Request $request){
        // dd($request->all());
        $search =  $request->search;

    //     $categories = Category::when($search, function ($query) use ($search) {
    //     $query->where('category_name', 'LIKE', "%{$search}%");
    // })
    // ->latest()
    // ->paginate(10);

        $categories = Category::when($search, function($query) use ($search) {
        $query->where('category_name','LIKE', "%{$search}%");

    })->latest()->paginate(5);

    return view('admin.viewcategories', compact('categories', 'search'));
    }








}

