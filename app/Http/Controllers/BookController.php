<?php

namespace App\Http\Controllers;

use App\Book;
use Laracombee;
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
        $books = \App\Book::paginate(6);
        
        // Get recommended books for the current signed-in user.
        $recommendedBooks = $this->getRecommendedBooks(5);

        return view('book.index', compact('books', 'recommendedBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = \App\Book::create(array_merge(['user_id' => \Auth::user()->id], $request->all()));

        $request = Laracombee::addItem($book);
        Laracombee::send($request);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = \App\Book::findOrFail($id);

        // Send the detailed view to recombee.
        $detailedView = Laracombee::addDetailedView(auth()->user()->id, $id, []);
        Laracombee::send($detailedView)->wait();

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Recommended Books.
     * 
     * @param  int $limit
     * @return Illuminate\Support\Collection
     */
    public function getRecommendedBooks(int $limit)
    {
        $response = Laracombee::recommendTo(auth()->user(), $limit)
        ->wait();
        return Book::find($response['recomms']);
    }
}
