<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book as Book;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


class BookController extends Controller
{
    /**
     * Fonction pour montrer tous les livres présents dans la table
     *
     *
     */
    public function index(){
        $livres = Book::all();
        return $livres;
    }
    /**
     * Fonction REST pour créer les données d'une ligne dans la table books
     *
     * @param Request $request paramètre de l'appel
     *
     */
    public function create(Request $request){
        /* Ajout d'un validateur sur les données à insérer par champ. Utilisation
        du required sur les champs name, author et isbn pour l'exemple */
        $request->validate([
            'name'=>'required',
            'author_id'=>'required',
            'publisher'=>'max:30',
            'isbn'=>'required|unique:books,isbn|max:13',
            'pages'=>'max:4',
            'language'=>'max:15',
            'resume'=>'max:10000',

        ]);
        //Instanciation de la classe Book du modèle Book pour relier l'instance à la table
        //pour réaliser la création
        $livre = new Book;
        $livre->name= $request->name;
        $livre->author_id = $request->author_id;
        $livre->publisher = $request->publisher;
        $livre->isbn = $request->isbn;
        $livre->pages = $request->pages;
        $livre->language = $request->language;
        $livre->resume =$request->resume;
        $livre->save();
        return $livre;
    }
    /**
     * Fonction REST pour modifier les données d'une ligne dans la table books
     *
     * @param Request $request paramètre de l'appel
     *
     */
    public function update(Request $request){

        // Condition pour vérifier si l'id est présent dans la table.
        if ($request->id == null) {
            return 'error value is null';
        }
        /* Ajout d'un validateur sur les données à modifier par champ. Utilisation du bail
     sur les champs 'name' et 'isbn' qui doivent être parfaitement remplis. */
        $request->validate([
            'name'=>'bail|required',
            'author_id'=>'required',
            'publisher'=>'max:30',
            'isbn'=>'bail|required|unique:books,isbn|max:13',
            'pages'=>'max:4',
            'language'=>'max:15',
            'resume'=>'max:10000',

        ]);
        //Instanciation de la classe Book du modèle Book pour relier l'instance à la table
        //pour réaliser les modifications
        $livre = Book::find($request->id);
        $livre->name= $request->name;
        $livre->author_id = $request->author_id;
        $livre->publisher = $request->publisher;
        $livre->isbn = $request->isbn;
        $livre->pages = $request->pages;
        $livre->language = $request->language;
        $livre->resume =$request->resume;
        $livre->save();
        return $livre;
    }
    /**
     * Fonction REST pour supprimer les données d'une ligne dans la table books
     *
     * @param Request $request paramètre de l'appel
     *
     */
    public function delete(Request $request){
        /* validateur sur l'id pour vérifier qu'il existe */
        $request->validate([
            'id'=>'required'
        ]);
        /* paramètre $request centré sur l'id pour réaliser la suppression sur une ligne en particulier*/
        $livre = Book::find($request->id);
        $livre->delete();
        return true;
    }
    /**
     * Fonction pour montrer les données d'une ligne dans la table books avec un get
     *
     * @param $id paramètre de sélection de la ligne de la table
     *
     */
    public function show($id){
        $livre = Book::where('id', $id)->get();
        return [
            $livre
        ];

    }
}
