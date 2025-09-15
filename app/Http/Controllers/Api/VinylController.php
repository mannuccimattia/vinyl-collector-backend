<?php

namespace App\Http\Controllers\Api;

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
        $vinyls = Vinyl::orderBy("artist")
            ->orderBy("title")
            ->get();

        return response()->json(
            [
                "success" => true,
                "data" => $vinyls
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl)
    {
        return response()->json(
            [
                "success" => true,
                "data" => $vinyl
            ]
        );
    }
}
