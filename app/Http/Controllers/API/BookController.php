<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records    = Book::query();
        $sortBy     = $request->input('sortBy', 'created_at');
        $orderBy    = $request->input('orderBy', 'desc');
        $perPage    = $request->input('perPage', '10');

        $perpage    = $this->getPaginationSize($perPage);
        $records    = $this->searchRow($request, $records);
        $records    = $this->sortRow($sortBy, $orderBy, $records);

        return BookResource::collection($records->paginate($perpage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }


    /**
     * getPaginationSize
     *
     * @param  mixed $perPage
     * @return integer
     */
    protected function getPaginationSize($perPage)
    {
        $perPageAllowed = [20, 50, 100, 500];

        if (in_array($perPage, $perPageAllowed)) {
            return $perPage;
        }

        return 10;
    }


    /**
     * searchRow
     *
     * @param  mixed $request
     * @param  mixed $records
     * @return collection
     */
    protected function searchRow($request, $records)
    {
        if ($request->has('name')) {
            $records = $records->where('name', 'LIKE', '%' . $request->name .'%');
        }

        if ($request->has('release_year')) {
            $records = $records->where('release_year', $request->release_year);
        }

        return $records;
    }

    /**
     * sortRow
     *
     * @param  mixed $sortBy
     * @param  mixed $orderBy
     * @param  mixed $records
     * @return collection
     */
    protected function sortRow($sortBy, $orderBy, $records)
    {
        $records = $records->orderBy($sortBy, $orderBy);

        return $records;
    }
}
