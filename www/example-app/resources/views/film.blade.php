<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $film->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <br><br>
                    Détails du film #{{ $film->id_film }} : <br><br>
                    En salle du {{ $film->date_debut_affiche }} au {{ $film->date_fin_affiche }} <br>
                    Genre : <a href="{!! route('filmsByGenre', ['id' => $film->id_genre]); !!}">{{ $film->genre->nom }}</a><br>
                    Distributeur :
                    @if ( $film->distributeur )
                    <a href="{!! route('filmsByDistributeur', ['id' => $film->id_distributeur]); !!}">{{ $film->distributeur->nom ?? 'Indéfini' }}</a>
                    @else
                    Non précisé
                    @endif
                    <br>
                    Résumé : {{ $film->resum }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>