<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Show the user account dashboard
     */
    public function index()
    {
        return view('account.content.profile.profile', [
            'user' => auth()->user()
        ]);
    }
}
