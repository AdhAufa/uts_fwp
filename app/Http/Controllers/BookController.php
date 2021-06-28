<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Storage;
use PDF;
class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index (){
        $books = Book::all();
        return view('pages.books.index', compact('books'));
    }
    public function create(){
        return view('pages.books.create');
    }
    public function store(Request $request){
        $book_cover = '';
        if($request->book_cover){
            $book_cover = $request->file('book_cover')->store('book_cover');
        }

        Book::create([
           'tittle' => $request->tittle,
           'author' => $request->author,
           'publisher' => $request->publisher,
           'book_cover' => $book_cover
        ]);


        return redirect()->route('book.index');
    }
    public function destroy($id){
        $book = Book::findOrFail($id);

        $book_cover = $book->book_cover;

        if(Storage::exists($book_cover)){
            Storage::delete($book_cover);
        }

        $book -> delete();

        return redirect()->route('book.index');
    }
    public function edit($id){
        $book = Book::findOrFail($id);

        return view('pages.books.edit', compact('book'));
    }
    public function update(Request $request, $id){
        $book = Book::findOrFail($id);

        $book_cover = $book->book_cover;

        if ($request->book_cover) {
            if(Storage::exists($book_cover)){
                Storage::delete($book_cover);
            }

            $book_cover = $request->file('book_cover')->store('book_cover');
        }

        $book->update([
        'tittle' => $request->tittle,
        'author' => $request->author,
        'publisher' => $request->publisher,
        'book_cover' => $book_cover
                 
        ]);
        return redirect()->route('book.index');
    }

    public function printBookPdf(){
        $books = Book::all();
        $pdf = PDF::loadview('pages.pdf.book_pdf', compact('books'));

        return $pdf->stream();
    }
}
