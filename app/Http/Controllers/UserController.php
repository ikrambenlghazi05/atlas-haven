<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
  // List all users
  public function index(Request $request)
  {
      $perPage = $request->input('per_page', 10);
      $users = User::paginate($perPage);
      return view('content.users.list', compact('users'));
  }

  // Show add user form
  public function create()
  {
    return view('content.users.add');
  }

  // Store new user
  public function store(Request $request)
  {
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone_number' => 'required|string|max:20',
      'role' => 'required|in:USER,ADMIN',
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'phone_number' => $request->phone_number,
      'role' => $request->role,
      'password' => Hash::make($request->password),
    ]);

    return redirect()->route('users.list')->with('success', 'User created successfully!');
  }

  // Show edit user form
  // Show edit form
  public function edit(User $user)
  {
    return view(view: 'content.users.edit', data: compact('user'));
  }

  // Update user
  public function update(Request $request, User $user)
  {
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
      'phone_number' => 'required|string|max:20',
      'role' => 'required|in:USER,ADMIN',
      'profile_picture' => 'nullable|image|max:2048', // 2MB max
    ]);

    $data = $request->except('profile_picture');

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
      // Delete old picture if exists
      if ($user->profile_picture) {
        Storage::delete('public/' . $user->profile_picture);
      }

      // Store new picture
       // Store new picture with relative path
       $path = $request->file('profile_picture')->store('profile-pictures', 'public');

       // Store just the relative path in database
       $relativePath = '/storage/' . $path;


       $data['profile_picture'] =  $relativePath;
    }

    $user->update($data);

    return redirect()->route('users.list')->with('success', 'User updated successfully!');
  }

  // Delete user
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.list')->with('success', 'User deleted successfully!');
  }
}
