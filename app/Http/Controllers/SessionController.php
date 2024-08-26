<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;

class SessionController extends Controller
{
    #[NoReturn] public function create_session(LoginFormRequest $request)
    {
        $validated= $request->validated();

        $user= auth()->attempt($validated);

        if(!$user){
            throw ValidationException::withMessages(['email'=>'Enter Valid Credentials... RETRY Again']);
            return redirect()->to('/login');
        }

        return redirect()->to('/dashboard');

    }

    public function destroy_session()
    {
        auth()->logout();
        session()->regenerateToken();
        return redirect()->to('/login');
    }
}
