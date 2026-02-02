<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title'     => 'required',
            'price'     => 'required|integer'
        ]);

        return Book::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'price' => 'required|integer'
        ]);

        $book->update($request->all());
        return $book;
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['message' => 'Book deleted']);
    }
}
