<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(20);
        $user = auth()->user()->user_rights;
        $userId = auth()->user()->id;
        return view("/dashboard", [
            'books' => $books,
            'user' => $user,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user()->user_rights;
        if ($user =="admin") {
            return view('books.create', compact('user'));
        } else {
            return redirect()->route('main.index');
       
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(['title' => 'required', 'author' => 'required',  'genre' => 'required', 'quantity' => 'required', 'publisher' => 'required']);
        Book::create($request->all());

        return redirect()->route('main.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $genre= Book::where("genre",$book->title)->get();
        $book=Book::find($id);
        
        $genre = Book::where('genre', $book->genre)->inRandomOrder()->take(3)->get();
        $author = Book::where('author', $book->author)->inRandomOrder()->take(3)->get();
        $role = $request->user()->user_rights;
        return view('books.show', [
            'book' => $book,
            'author' => $author,
            'genre' => $genre,
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::find($id);
        return view("books.edit", compact("books"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book=Book::find($id);
        
        $request->validate(['title' => 'required', 'author' => 'required',  'genre' => 'required', 'quantity' => 'required', 'publisher' => 'required']);

        $book->update($request->all());

        return redirect()->route('main.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

         return redirect()->route('main.index');//
    }
}
