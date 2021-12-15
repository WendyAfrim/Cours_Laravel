<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    public function dashboard()
    {
        $messages = Message::all();
        return view('dashboard', [
            'messages' => $messages
        ]);
    }


    public function postMessage(Request $request)
    {
        $message = new Message();
        $message->content = $request->content;
        $message->user_id = Auth::id();

        $message->save();

        return redirect('dashboard');
    }

    public function deleteMessage(Request $request)
    {
        $message = Message::find($request->id);

        if (Auth::id() != $message->user_id) {
            return redirect('dashboard')->with('status', 'Vous n\'êtes pas l\'auteur de ce message !');
        }
        $message->delete();
        return redirect('dashboard')->with('status', 'Votre message a bien été supprimé.');
    }

    public function updateMessageForm(Request $request)
    {
        $message = Message::find($request->id);

        if (Auth::id() != $message->user_id) {
            return redirect('dashboard')->with('status', 'Vous n\'êtes pas l\'auteur de ce message !');
        }

        return view('updateMessageForm', ['message' => $message]);
    }

    public function updateMessage(Request $request)
    {
        $message = Message::find($request->id);
        $message->content = $request->content;
        $message->save();

        return redirect('dashboard');
    }
}
