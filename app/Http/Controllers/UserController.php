<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class UserController extends Controller
{
    public function User()
    {
        $author = ['name' => 'Dark', 'password' => 'password'];
        // return view('Action.Signup');
        return view('Login');
    }

    public function param($id, $arg)
    {
        return ['id' => $id, 'arg' => $arg];
    }
}
