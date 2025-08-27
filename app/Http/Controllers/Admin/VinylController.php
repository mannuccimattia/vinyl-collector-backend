<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vinyl;
use Illuminate\Http\Request;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinyls = Vinyl::all();

        return view("vinyls.index", compact("vinyls"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("vinyls.create");
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
        $newVinyl->release_year = $data['release_year'];
        $newVinyl->catalog_number = $data['catalog_number'];

        $newVinyl->save();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
