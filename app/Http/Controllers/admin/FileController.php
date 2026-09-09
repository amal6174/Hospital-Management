<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;



class FileController extends Controller
{
    public function index()
    {
        $files = File::latest()->get();

        return view('admin.files', compact('files'));
    }

    public function create()
    {
        return view('admin.files_create');
    }

    public function insert(Request $request)
    {

        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg|max:2048',
            'document' => 'required|file|mimes:pdf,doc,docx,xlsx,xls,csv|max:10240',
        ]);

        $image_path = $request->file('image')->store('images', 'public');

        $documet_path  =  $request->file('document')->store('documents', 'public');

        File::create([
            'image' => $image_path,
            'document' => $documet_path,
        ]);

        return redirect()->route('admin.file.view')->with('success', 'File Uploads Successfull');
    }



    public function dwonload($id)
    {

        $record  =  File::findOrFail($id);

        return Storage::disk('public')->download($record->document);
    }


    public function read($id)
    {
        $record =  File::findOrfail($id);

        if (!Storage::disk('public')->exists($record->document)) {
            abort(4040, 'File Bot found');
        }

        $content  = Storage::disk('public')->get($record->document);

        return response($content)->header(
            'Content-Type',
            Storage::disk('public')->mimeType($record->document)
        );
    }


    public function copy($id)
    {
        $record = File::findOrFail($id);

        if (!Storage::disk('public')->exists($record->document)) {
            abort(404, 'File not found');
        }

        $newPath = 'backup/' . basename($record->document);

        Storage::disk('public')->copy($record->document,$newPath);

        return back()->with('success', 'File copied successfully.');
    }
}
