<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContacController extends Controller
{
    public function index()
    {

        $contacts  = Contact::latest()->paginate(config('app.pagination_limit'));

        return view('admin.contacts', compact('contacts'));
    }

    public function insert(Request $request)
    {


        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|digits:10',
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        try {



            Contact::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'topic' => $data['subject'],
                'message' => $data['message'],
            ]);

            return redirect()->route('contact');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function delete($id)
    {

        try {

            $data = Contact::findOrFail($id);

            $data->delete();

            return view('admin.contacts')->with('success', 'Delete Successfull');
        } catch (\Exception $e) {

            return redirect()->back()->with($e->getMessage());
        }
    }
}
