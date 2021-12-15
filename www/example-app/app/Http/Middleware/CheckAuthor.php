<?php

namespace App\Http\Middleware;

use App\Models\Message;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $message = Message::find($request->id);

        if (Auth::id() != $message->user_id) {
            return redirect()->back()->with('status', 'Vous n\'êtes pas l\'auteur du message');
        }
        return $next($request);
    }
}
