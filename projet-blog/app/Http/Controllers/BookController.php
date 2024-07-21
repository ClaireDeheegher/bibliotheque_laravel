<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book as Book;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


class BookController extends Controller
{
    public function index(){
        /*$livres = Book::all();*/
        return
        csrf_token();
    }
    public function create(Request $request){
        $livre = new Book;
        $livre->name= $request->name;
        $livre->author = $request->author;
        $livre->publisher = $request->publisher;
        $livre->isbn = $request->isbn;
        $livre->pages = $request->pages;
        $livre->language = $request->language;
        $livre->resume =$request->resume;
        $livre->save();
        return $livre;
    }
    public function update(Request $request){
        if ($request->id == null) {
            return 'error value is null';
        }
        $livre = Book::find($request->id);
        $livre->name= $request->name;
        $livre->author = $request->author;
        $livre->publisher = $request->publisher;
        $livre->isbn = $request->isbn;
        $livre->pages = $request->pages;
        $livre->language = $request->language;
        $livre->resume =$request->resume;
        $livre->save();
        return $livre;
    }

    public function delete(Request $request){
        if ($request->id == null) {
            return 'error value is null';
        }
        $livre = Book::find($request->id);
        $livre->delete();
        return true;
    }
    public function show($id){
        $livre = Book::where('id', $id)->get();
        return [
            $livre
        ];

    }
}
