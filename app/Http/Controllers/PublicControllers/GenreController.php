<?php


namespace App\Http\Controllers\PublicControllers;


use App\Http\Collections\GenreCollection;
use App\Http\Controllers\Controller;

use App\Models\Genre;


class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::query()
            ->active()
            ->get();

        return $this->successResponse(new GenreCollection($genres));
    }
}