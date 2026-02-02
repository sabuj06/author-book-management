<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
     public function index()
    {
        return Author::with('books')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:authors'
        ]);

        return Author::create($request->all());
    }

    public function show($id)
    {
        return Author::with('books')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $author->update($request->all());
        return $author;
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return response()->json(['message' => 'Author deleted']);
    }
}
