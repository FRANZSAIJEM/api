<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::orderBy('firstName')
            ->orderBy('firstName')->get();

        return response()->json([
            'author' => $authors
        ]);
    }

    public function show(Author $authors) {
        $authors->load('authors');
        return response()->json($authors);
    }

    public function store(Request $request) {
        $request->validate([
            'firstName' => 'string|required',
            'lastName' => 'string|required',
            'dob' => 'date|required',


        ]);

        $author = Author::create($request->all());

        return response()->json($author);
    }

    public function update(Author $author, Request $request) {
        $author->update($request->all());

        return response()->json($author);
    }

    public function destroy(Author $author) {
        $author->delete();
        return response()->json(['message'=>'Author has been deleted.']);
    }
}
