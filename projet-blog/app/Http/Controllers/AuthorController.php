<?php

namespace App\Http\Controllers;

use App\Models\Book as Book;
use App\Models\Author as Author;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class AuthorController extends Controller
{
    /**
     * Fonction pour montrer tous les auteurs présents dans la table
     *
     *
     */
    public function index(){
        $auteurs = Author::all();
        return $auteurs;
    }
    /**
     * Fonction REST pour créer les données d'une ligne dans la table authors
     *
     * @param Request $request paramètre de l'appel
     *
     */
    public function create(Request $request){
        /* Ajout d'un validateur sur les données à insérer par champ. Utilisation
        du required sur les champs name, author et isbn pour l'exemple */
        $request->validate([
            'lastname'=>'required',
            'name'=>'required',


        ]);
        //Instanciation de la classe Author du modèle Author pour relier l'instance à la table
        //pour réaliser la création
        $auteur = new Author;
        $auteur->lastname= $request->lastname;
        $auteur->name = $request->name;

        $auteur->save();
        return $auteur;
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
            'lastname'=>'required',
            'name'=>'required',


        ]);
        //Instanciation de la classe Book du modèle Book pour relier l'instance à la table
        //pour réaliser les modifications
        $auteur = Author::find($request->id);
        $auteur = new Author;
        $auteur->lastname= $request->lastname;
        $auteur->name = $request->name;

        $auteur->save();
        return $auteur;
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
        $auteur = Author::find($request->id);
        $auteur->delete();
        return true;
    }
    /**
     * Fonction pour montrer les données d'une ligne dans la table author avec un get
     *
     * @param $id paramètre de sélection de la ligne de la table
     *
     * @return $auteur infos auteur
     * Création d'un lien avec la table books pour montrer les livres écrits par l'auteur
     */
    public function show($id){
        $author = Author::where('id', $id)->get();
        return [
            $author
        ];

    }
}
