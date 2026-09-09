<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $terms = TermsAndCondition::orderBy('order')->orderBy('id')->get();
        return view('admin.terms.index', compact('terms'));
    }

    public function create()
    {
        return view('admin.terms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        TermsAndCondition::create([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order ?? 0,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.terms.index')
            ->with('success', 'Term added successfully.');
    }

    public function edit($id)
    {
        $term = TermsAndCondition::findOrFail($id);
        return view('admin.terms.edit', compact('term'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        $term = TermsAndCondition::findOrFail($id);
        $term->update([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order ?? 0,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.terms.index')
            ->with('success', 'Term updated successfully.');
    }

    public function destroy($id)
    {
        TermsAndCondition::findOrFail($id)->delete();
        return redirect()
            ->route('admin.terms.index')
            ->with('success', 'Term deleted successfully.');
    }
}
