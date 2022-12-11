<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat()
    {
        $name = Auth::user()->name;
        return view('admin.chat.chat', compact('name'));
    }
}