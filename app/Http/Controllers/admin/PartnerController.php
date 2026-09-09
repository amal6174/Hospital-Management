<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Partner;
use Intervention\Image\Laravel\Facades\Image;


use Illuminate\Support\Facades\Http;

class PartnerController extends Controller
{
    public function index()
    {

        $partners = Partner::paginate(config('app.pagination_limit'));


        return view('admin.partners', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner_create');
    }

    public function edit($id)
    {
        $partner  =  Partner::findOrFail($id);

        return view('admin.partner_edit', compact('partner'));
    }


    public function insert(Request $request)
    {
        $data  =  $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string',
            'status' => 'required',
            'g-recaptcha-response' => 'required',

        ]);

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Please verify that you are not a robot.'])
                ->withInput();
        }





        //      $filename = time() . '.' . $image->getClientOriginalExtension();

        //    Image::read($image)
        //     ->scale(width: 800)
        //     ->save(public_path('images/' . $filename));





        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image  = time() . '.' . $file->getClientOriginalExtension();

            Image::read($file)->scale(width: 800)
                ->save(storage_path('app/public/partners/' . $image));

            // save in database

            $data['image'] = 'partners/' . $image;
        }



        Partner::create([
            'image' =>  $data['image'],
            'name' => $data['name'],
            'status' => $data['status'],
        ]);

        return redirect()->route('admin.partner.index')->with('success', 'Partner Add Successfull');
    }




    public function update(Request $request, $id)
    {
        $partner  =  Partner::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required|string',
            'status' => 'required',
        ]);

        $image  =  $partner['image'];


        if ($request->hasFile('image')) {

            $image  = $request->file('image')->store('partners', 'public');

            $partner->image  = $image;
        }


        $partner->name = $data['name'];
        $partner->status = $data['status'];

        $partner->save();

        return redirect()->route('admin.partner.index')->with('success', 'Partner Update Successfull');
    }

    public function Delete($id)
    {
        $partner  = Partner::findOrFail($id);

        $partner->delete();
        return redirect()->route('admin.partner.index')->with('success', 'Data Delete Successfull');
    }

    // public function trash()
    // {
    //     $records  = Partner::onlyTrashed()->latest()->get();

    //     return view('admin.trusht', compact('records'));
    // }


    public function SoftDelete($id)
    {
        $record = Partner::withTrashed()->findOrFail($id);

        $record->delete();

        return redirect()->back()->with('success', 'Delete Successfull');
    }

    public function restore($id)
    {
        $record = Partner::withTrashed()->findOrFail($id);

        $record->restore();

        return redirect()->back()->with('success', 'Record Restored Successfull');
    }

    public function forceDelete($id)
    {
        $record  = Partner::withTrashed()->findOrFail($id);

        $record->forceDelete();

        return redirect()->back()->with('success', 'Data Parmanently Delete');
    }
}
