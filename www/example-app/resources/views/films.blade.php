<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Films') }}
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
                    Films présentés dans notre cinéma : <br>
                    @foreach($films as $film)
                    <a href="{!! route('film', ['id' => $film->id_film]); !!}">
                        <li>{{ $film->titre }} - {{ $film->annee_production }}</li>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>