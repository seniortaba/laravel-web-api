<?php

namespace App\Http\Controllers;

use App\Http\Resources\BooksResources;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BooksResources::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return BooksResources
     */
    public function store(Request $request)
    {
        $faker = \Faker\Factory::create(1);

        $book = Book::create([
           'name'=>$faker->name,
           'description'=>$faker->sentence,
           'publication_year'=>$faker->year,
        ]);
        return new BooksResources($book);
    }

    /**
     * @param Book $book
     * @return BooksResources
     */
    public function show(Book $book)
    {
        return new BooksResources($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return BooksResources
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publication_year' => $request->input('publication_year'),
        ]);
        return new BooksResources($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}
