<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::orderBy("name")->get();
        return view("genres.index", compact("genres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }
        return view("genres.create");
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

        $newGenre = new Genre();

        $newGenre->name = $data['name'];

        $newGenre->save();

        return redirect()->route("genres.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Route not needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        return view("genres.edit", compact("genre"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        $data = $request->all();

        $genre->name = $data['name'];

        $genre->update();

        return redirect()->route("genres.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        if (!Gate::allows("admin")) {
            abort(403);
        }

        // If genre has associated vinyls,redirect to index and throw error modal
        if ($genre->vinyls()->count() > 0) {
            return redirect()->route('genres.index')
                ->with('error', "Cannot delete genre $genre->name.<br> It is currently assigned to one or more vinyls.");
        }

        // Else delete genre
        $genre->delete();

        return redirect()->route("genres.index")
            ->with('success', "Genre $genre->name deleted successfully");
    }
}
