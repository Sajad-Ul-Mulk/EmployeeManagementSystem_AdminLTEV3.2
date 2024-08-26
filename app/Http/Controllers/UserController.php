<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index',[
            'users' => User::latest()->paginate(5),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showUserTask(string $id)
    {
        $specific_user=User::find($id);
        return view('task.index',[
            'tasks'=> $specific_user->tasks()->paginate(6),
            'specific_user' => $specific_user
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user_id)
    {
//        dd($id);
        return view('user.edit',[
            'edit_user'=> $user_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated_user= User::findOrFail($id)->update($request->all());

        if($updated_user){
            return redirect()->to('/all_users')->with('success','User updated successfully');
        }
        return redirect()->to('/all_users')->with('error','Something went wrong');
;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/all_users')->with('success','User deleted successfully');
    }


}
