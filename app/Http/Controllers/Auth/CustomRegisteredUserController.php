<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Events\Registered;

class CustomRegisteredUserController extends Controller
{
    /**
     * Display the custom registration view.
     */
    public function createCustom()
    {
        return view('auth.custom-register');
    }

    /**
     * Handle an incoming custom registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeCustom(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'session' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'session' => $request->session,
            'department' => $request->department,
            'usertype' => 'user', // default value for usertype
        ]);

        // Create a default post for the user
        Post::create([
            'title' => $user->name,
            'description' => $user->email,
            'post_status' => 'pending',
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/home');  // Modify this to your desired redirect location
    }
}
