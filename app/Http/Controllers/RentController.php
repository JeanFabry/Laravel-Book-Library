<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rents = Rent::paginate(20);
        return view('rents.rentAll', ['rents' => $rents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $user = $request->user()->id;
        $faker = Faker::create();
        $rent = new Rent;

        $rent->user_id = $user;
        $rent->book_id = $id;
        $rent->invoice_number=$faker->ean8;
        $rent->save();

        // Rent::create('book_id'= $bookId, 'user_id'=$user);

        return redirect()->route('main.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $user = $request->user()->id;
        $faker = Faker::create();
        $rent = new Rent;

        $rent->user_id = $user;
        $rent->book_id = $request->book_id;
        $rent->invoice_number = $faker->ean8;
        $rent->save();

        // Rent::create('book_id'= $bookId, 'user_id'=$user);

        return redirect()->route('main.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $booksRented=Rent::where('user_id',$id)->get();
        return view('rents.show', [
            'booksRented' => $booksRented]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
