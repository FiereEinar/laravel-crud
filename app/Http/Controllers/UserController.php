<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $body = $request->validate([
            'name' => ['required', 'min:1', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:50'],
            'confirmPassword' => ['required', 'min:5', 'max:50'],
        ]);

        if ($body['password'] !== $body['confirmPassword']) {
            return back()->withErrors(['all' => 'Passwords must match.'])->withInput();
        }

        $body['password'] = bcrypt($body['password']);
        $user = User::create($body);
        auth()->guard('web')->login($user);

        return redirect('/');
    }

    public function logout() {
        auth()->guard('web')->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $body = $request->validate([
            'loginEmail' => ['required'],
            'loginPassword' => ['required'],
        ]);

        if (auth()->guard('web')->attempt(['email' => $body['loginEmail'], 'password' => $body['loginPassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return back()->withErrors(['all' => 'Incorrect credentials.'])->withInput();
        }
    }
}
