<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Label;
use App\Models\Vinyl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinyls = Vinyl::orderBy('artist')
            ->orderBy('title')
            ->get();

        return view("vinyls.index", compact("vinyls"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $labels = Label::all();
        $genres = Genre::all();

        return view("vinyls.create", compact("labels", "genres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newVinyl = new Vinyl();

        $newVinyl->title = $data['title'];
        $newVinyl->artist = $data['artist'];
        $newVinyl->country = $data['country'];
        $newVinyl->label_id  = $data['label_id'];
        $newVinyl->release_year = $data['release_year'];
        $newVinyl->catalog_number = $data['catalog_number'];
        $newVinyl->release_num = $data['release_num'];
        $newVinyl->release_url = $data['release_url'];

        if (array_key_exists("cover", $data)) {
            $img_url = Storage::putFile("vinyls", $data['cover']);

            $newVinyl->cover = $img_url;
        }

        $newVinyl->save();

        if ($request->has("genres")) {
            $newVinyl->genres()->attach($data['genres']);
        }

        return redirect()->route("vinyls.show", $newVinyl);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl)
    {
        return view("vinyls.show", compact("vinyl"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vinyl $vinyl)
    {
        $labels = Label::all();
        $genres = Genre::all();

        return view("vinyls.edit", compact("vinyl", "labels", "genres"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vinyl $vinyl)
    {
        $data = $request->all();

        $vinyl->title = $data['title'];
        $vinyl->artist = $data['artist'];
        $vinyl->country = $data['country'];
        $vinyl->label_id = $data['label_id'];
        $vinyl->release_year = $data['release_year'];
        $vinyl->catalog_number = $data['catalog_number'];
        $vinyl->release_num = $data['release_num'];
        $vinyl->release_url = $data['release_url'];

        if (array_key_exists("cover", $data)) {
            Storage::delete($vinyl->cover);

            $img_url = Storage::putFile("vinyls", $data['cover']);

            $vinyl->cover = $img_url;
        }

        $vinyl->update();

        if ($request->has("genres")) {
            $vinyl->genres()->sync($data['genres']);
        } else {
            $vinyl->genres()->detach();
        }

        return redirect()->route("vinyls.show", $vinyl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vinyl $vinyl)
    {
        if ($vinyl->cover) {
            Storage::delete($vinyl->cover);
        }

        $vinyl->genres()->detach();

        $vinyl->delete();

        return redirect()->route("vinyls.index");
    }
}
