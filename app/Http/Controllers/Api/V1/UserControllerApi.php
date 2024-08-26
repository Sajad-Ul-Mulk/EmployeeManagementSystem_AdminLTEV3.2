<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiUserStoreRequest;
use App\Http\Requests\ApiUserUpdateRequest;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\UserResourceCollection;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use mysql_xdevapi\Exception;


class UserControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResourceCollection::make(User::latest()->with('tasks')->paginate(10));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store( ApiUserStoreRequest $request)
    {
        $user= $request->validated();
        User::create($user);

        return Response::json(
            ['status'=> 200,
                'message'=>'User Created Successfully.',
                'user'=>($user),
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return Response::json([
            'status'=>true,
            'message'=>'Resource Updated Successfully',
        ],204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if($user->delete())
                return Response::json(['status'=> 200,'message'=>'User Deleted Successfully.'], 200);


        }catch (Exception $e){
            return Response::json($e);
        }

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            $user= Auth::user();
            return Response::json([
                'status'=>200,
                'message'=>'User logged successfully',
                'token'=>$user->createToken('API Token')->plainTextToken,
                'token_type'=> 'bearer'],
                200);
        }
        return Response::json(['message'=>'Enter Valid Credentials...'],403);
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();

        return Response::json(
            [
                'status'=>true,
                'message'=>'User Logged Out',
            ],200);
    }

}
