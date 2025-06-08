<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-register-basic');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ], [
            'terms.required' => 'Vous devez accepter les conditions d\'utilisation',
            'terms.accepted' => 'Vous devez accepter les conditions d\'utilisation',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_USER,
        ]);

        auth()->login($user);

        return redirect()->route('login')->with('success', 'Inscription réussie! Bienvenue.');
    }
}
