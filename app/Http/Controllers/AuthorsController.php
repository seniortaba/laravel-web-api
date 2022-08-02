<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;
class AuthorsController extends Controller
{
    /**
     * @param Author $author
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AuthorsResource::collection(Author::all());
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
     * @param AuthorsRequest $request
     * @return AuthorsResource
     */
    public function store(AuthorsRequest $request)
    {
        $faker = \Faker\Factory::Create(1);
        $author = Author::create([
            'name' => $faker->name
        ]);
        return new AuthorsResource($author);
    }

    /**
     * @param Author $author
     * @return AuthorsResource
     */
    public function show(Author $author)
    {
        return new AuthorsResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * @param AuthorsRequest $request
     * @param Author $author
     * @return AuthorsResource
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name')
        ]);

        return new AuthorsResource($author);
    }

    /**
     * @param Author $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response(null, 204);
    }
}
