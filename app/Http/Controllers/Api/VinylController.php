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

    // Unordered and unpaginated
    public function indexRaw()
    {
        $vinyls = Vinyl::with("label", "genres")
            ->get();

        return response()->json(
            [
                "success" => true,
                "data" => $vinyls
            ]
        );
    }

    // Ordered by artist->title and paginated
    public function index()
    {
        $vinyls = Vinyl::with("label", "genres")
            ->orderBy("artist")
            ->orderBy("title")
            ->paginate(12);

        foreach ($vinyls as $vinyl) {
            $vinyl->cover = "http://localhost:8000/storage/$vinyl->cover";
        }

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
        $vinyl->load("label", "genres");

        // full cover path for frontend app
        $vinyl->cover = "http://localhost:8000/storage/$vinyl->cover";

        return response()->json(
            [
                "success" => true,
                "data" => $vinyl
            ]
        );
    }
}
