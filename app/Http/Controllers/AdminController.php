<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.admin');
    }

    /**
     * Show the admin dashboard
     */
    public function index()
    {
        return view('content.admin.dashboard', [
            'users' => \App\Models\User::all() // Example data
        ]);
    }

    /**
     * Add more admin methods here...
     */
}
