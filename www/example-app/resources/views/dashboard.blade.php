<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                    You're logged in! <br><br>
                    {!! Form::open(['url' => 'postMessage']) !!}
                    {!! Form::text('content') !!}
                    {!! Form::submit('Click Me!')!!}
                    {!! Form::close() !!}
                    <br><br>
                    Messages : <br>
                    @foreach($messages as $message)
                    <li>{{ $message->content }} - Author : {{ $message->user_id }}

                        [<a href="{!! route('deleteMessage', ['id' => $message->id]); !!}">Delete</a>]
                        [ <a href="{!! route('updateMessageForm', ['id' => $message->id]); !!}">Edit</a> ]

                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>