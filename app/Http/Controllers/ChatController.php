<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth');
    }

    public function chat() {
        return view('chat');
    }

    //request $request
    public function send() {
        $message = 'hello';
        $user = User::find(Auth::id());
        event(new ChatEvent($message, $user));
    }
}
