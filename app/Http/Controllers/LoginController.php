<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\User;

class LoginController extends Controller
{
    private User $user;

    public function __construct(User $user)  
    {
        $this->user = $user;
    }

    public function index(Request $request) 
    {
        return view('app.login', [ 'message' => $request->input('message') ]);
    }

    public function login(LoginRequest $loginRequest) 
    {
        $userCredentials = $loginRequest->validated();

        $register = $this->user->selectWithEmailAndPassword(
            $userCredentials['email'], 
            $userCredentials['password']
        );

        if ($register) {
            session_start();

            $_SESSION['email'] = $register->email;
            $_SESSION['user'] = $register->name;

            return redirect()->route('app.home');
        }

        return redirect()->route('site.login', ['message' => 'Error ao fazer login.']);
    }

    public function register() 
    {
        return view('app.register');
    }

    public function store(RegisterRequest $registerRequest)
    {
        $this->user->store($registerRequest->validated());
        return redirect()->route('site.login');
    }
}
