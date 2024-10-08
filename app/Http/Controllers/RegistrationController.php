<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationFormRequest $request)
    {
//dd($request->all());
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
        if(!Auth::user()) {
            auth()->login($user);
            session()->regenerate();
            return redirect()->to('/all_users')->with('success', 'Registration Successful...');
        }
        return redirect()->to('all_users')->with('success', 'Registration Successful...');
    }
}
