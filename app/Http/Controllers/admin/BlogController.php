<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Blog;
use Illuminate\Support\Str;
// use Cviebrock\EloquentSluggable\Sluggable;

class BlogController extends Controller
{
    public function index()
    {

        $blogs  = Blog::latest()->paginate(config('app.pagination_limit'));


        return view('admin.blog', compact('blogs'));
    }


    public function create()
    {
        return view('admin.blog_create');
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        $data  = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string',

            'small_description' => 'required|string',
            'description' => 'required',
        ]);


        try {


            if ($request->hasFile('image')) {
                $imagename  = $request->file('image')->store('blog', 'public');
                $data['image'] = $imagename;
            }


            Blog::create([

                'image' => $data['image'],
                'title' => $data['title'],

                'small_description' => $data['small_description'],
                'description' => $data['description']
            ]);

            return redirect()->route('admin.blog.view')->with('success', 'Blog create successfull');
            
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {

        $blogs  = Blog::findOrFail($id);

        return view('admin.blog_edit', compact('blogs'));
    }

    public function update(Request $request,  $id)
    {
        //  dd($request->all());
        $blogs  = Blog::where('id', $id)->firstOrFail();

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string',
            'small_description' => 'required|string',
            'description' => 'required',
        ]);

        $imagename = $blogs->image;

        if ($request->hasFile('image')) {
            // new image
            $imagename = $request->file('image')->store('blog', 'public');
        }

        $blogs->image = $imagename;
        $blogs->title = $request->title;
        $blogs->slug = $request->slug;
        $blogs->small_description = $request->small_description;
        $blogs->description = $request->description;

        $blogs->save();
        //slug able

        return redirect()->route('admin.blog.view')->with('success', 'Blog Update Successfull');
    }

    public function delete($id)
    {

        $blog  =  Blog::findOrFail($id);

        $blog->delete();

        return redirect()->route('admin.blog.view')->with('success', 'Data Delete Successfull');
    }
}
