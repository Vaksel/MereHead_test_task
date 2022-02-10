<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Collections\BookCollection;
use App\Http\Controllers\Controller;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function index(): Response
    {
        $books = Book::query()
            ->active()
            ->with('author')
            ->whereHas('author', fn(Builder $query) => $query->active())
            ->latest()
            ->simplePaginate();

        return $this->successResponse(new BookCollection($books));
    }

    public function getSortedFilteredBooks(Request $req)
    {
        $sort_direction = $req->genre_sort;
        $genre_id_filter = $req->genre_id_filter;

        if(empty($sort_direction))
        {
            $sort_direction = 'asc';
        }
        
        $books = Book::query()
            ->where(function($query) use ($genre_id_filter){
                if(!empty($genre_id_filter))
                {
                    $query->where(['genre_id' => $genre_id_filter]);
                }
            })
            ->active()
            ->with('author')
            ->with('genre')
            ->whereHas('author', fn(Builder $query) => $query->active())
            ->get();

        if($sort_direction === 'asc')
        {
            $books = $books->sortBy('genre.name');
        }
        else
        {
            $books = $books->sortByDesc('genre.name');
        }


        return $this->successResponse($books);
    }
}
