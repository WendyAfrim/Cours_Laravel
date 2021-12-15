<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($genre->nom) }}
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
                    Film appartenant au genre : {{ ucfirst($genre->nom) }} <br><br>
                    @foreach ($genre->films as $film)
                    <li>{{ $film->titre }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>