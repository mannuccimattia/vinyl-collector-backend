<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::orderBy("name")->get();

        return view("labels.index", compact("labels"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        return view("labels.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        $data = $request->all();

        $newLabel = new Label();

        $newLabel->name = $data['name'];

        $newLabel->save();

        return redirect()->route("labels.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        // Route not needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        return view("labels.edit", compact("label"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        $data = $request->all();

        $label->name = $data['name'];

        $label->update();

        return redirect()->route("labels.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        // If label has associated vinyls,redirect to index and throw error modal
        if ($label->vinyls()->count() > 0) {
            return redirect()->route('labels.index')
                ->with('error', "Cannot delete label $label->name.<br> It is currently assigned to one or more vinyls.");
        }

        // Else delete label
        $label->delete();

        return redirect()->route("labels.index")
            ->with('success', "Label $label->name deleted successfully");
    }
}
