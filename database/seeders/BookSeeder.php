<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeroenZwart\CsvSeeder\CsvSeeder;
use App\Models\Book;


class BookSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeds/csvs/books.csv';
        $this->delimiter = ',';
        $this->tablename = 'books';
        $this->truncate=false;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();

        $books = Book::all();
        foreach ($books as $book) {
            $book->update([
                'quantity' => mt_rand(1, 20),
            ]);
        }
    }
}