<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ChatController extends Controller
{
    public function chat()
    {
        return View::make('chat.chat');
    }
}
