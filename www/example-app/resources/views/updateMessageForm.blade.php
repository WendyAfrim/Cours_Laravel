<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Message #{{ $message->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! <br><br>
                    {!! Form::open(['route' => ['updateMessage' ]]) !!}
                    {!! Form::hidden('id', $message->id ) !!}
                    {!! Form::text('content', $message->content ) !!}
                    {!! Form::submit('Update')!!}
                    {!! Form::close() !!}
                    <br><br>

                    <!--  <form method="POST" action="{{ route('updateMessage', [ 'id' => $message->id]) }}" accept-charset="UTF-8">
                        @csrf
                        <input name="content" type="text" value="{{ $message->content }}">
                        <input type="submit" value="Update">
                    </form> !-->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>