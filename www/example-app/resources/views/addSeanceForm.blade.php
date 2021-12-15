<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter une nouvelle séance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('add_seance') }}" method="POST">
                        @csrf
                        <label for="films">Film</label>
                        <select name="films" id="films">
                            @foreach($films as $film)
                            <option value="{{ $film->titre }}">{{ $film->titre }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="salle">Salle</label>
                        <select name="salle" id="salle">
                            @foreach($salles as $salle)
                            <option value="{{ $salle->id_salle }}">{{ $salle->numero_salle }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="ouvreurs">Ouvreurs</label>
                        <select name="ouvreurs" id="ouvreurs">
                            @foreach($ouvreurs as $ouvreur)
                            <option value="{{ $ouvreur->id_personne }}">{{ ucfirst($ouvreur->prenom).' '.$ouvreur->nom }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="techiciens">Techniciens</label>
                        <select name="techiciens" id="techiciens">
                            @foreach($techiciens as $techicien)
                            <option value="{{ $techicien->id_personne }}">{{ ucfirst($techicien->prenom).' '.$techicien->nom }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="menages">Techniciens</label>
                        <select name="menages" id="menages">
                            @foreach($menages as $menage)
                            <option value="{{ $menage->id_personne }}">{{ ucfirst($menage->prenom).' '.$menage->nom }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="debut_seance">Debut de séance</label>
                        <input name="debut_seance" type="date">
                        <br><br>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>