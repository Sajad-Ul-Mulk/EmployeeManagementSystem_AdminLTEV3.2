<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationFormRequest $request)
    {

        $validated = $request->validated();
        $avatar='';
        $user= User::create($validated);
        if($request->hasFile('avatar')) {
            $avatar = Storage::disk('local')->put('/profile_pics/'.$request->file('avatar'),'Contents');
//            $avatar = $request->file('avatar')->store('public/profile_avatars');
        }
        $user['avatar']=$avatar;
        if(!$user) {
            throw ValidationException::withMessages('Something Went Wrong... RETRY');
            return redirect()->back(408);
        }
        auth()->login($user);
        session()->regenerate();
        return redirect()->to('/dashboard');
    }
}
