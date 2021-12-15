<?php

namespace App\Http\Controllers;

use App\Models\Distributeur;
use App\Models\Employe;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Personne;
use App\Models\Salle;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function all_films()
    {
        // Lazy loading
        // $films = Film::all();

        // Eager loading - All films with distributeur
        $films = Film::with('distributeur')->get();

        return view('films', [
            'films' => $films
        ]);
    }

    public function film(Request $request)
    {
        $film = Film::find($request->id);

        return view('film', ['film' => $film]);
    }

    public function filmsByGenre(Request $request)
    {
        $genre = Genre::find($request->id);

        return view('genre', ['genre' => $genre]);
    }

    public function filmsByDistributeur(Request $request)
    {

        $distributeur = Distributeur::find($request->id);

        return view('distributeur', ['distributeur' => $distributeur]);
    }

    public function add_seance(Request $request)
    {
        $films = Film::all();
        $salles = Salle::all();

        $personne = new Personne();
        $ouvreurs = $personne->getOuvreurs();
        $techiciens = $personne->getTechniciens();
        $menages = $personne->getMenages();

        if ($request->isMethod('POST')) {
            # code...
            dd($request);
        }


        return view('addSeanceForm', ['films' => $films, 'salles' => $salles, 'ouvreurs' => $ouvreurs, 'techiciens' => $techiciens, 'menages' => $menages]);
    }
}
