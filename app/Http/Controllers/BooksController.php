<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = book::orderBy('id', 'asc')->paginate(2);
        return view('books.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('author', $request->author);
        Session::flash('release', $request->release);
        $request->validate([
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
            'release' => ['required'],
        ], [
            'title.required' => 'title cannot be empty',
            'author.required' => 'author cannot be empty',
            'release.required' => 'release date cannot be empty',
            'title.max:255' => 'title is too long',
            'author.max:255' => 'author name is too long',
        ]);
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'release' => $request->release,
        ];
        book::create($data);
        return redirect()->to('books')->with('success', 'book has been added to the database');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = book::where('id', $id)->first();
        return view('books.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
            'release' => ['required'],
        ], [
            'title.required' => 'title cannot be empty',
            'author.required' => 'author cannot be empty',
            'release.required' => 'release date cannot be empty',
            'title.max:255' => 'title is too long',
            'author.max:255' => 'author name is too long',
        ]);
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'release' => $request->release,
        ];
        book::where('id', $id)->update($data);
        return redirect()->to('books')->with('success', 'book has been edited to the database');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
