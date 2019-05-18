<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
use App\Http\Resources\Users as UserResource;
use App\Http\Resources\UsersCollection as UsersCollectionResource;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get a all users
        $users  = Users::all();

        //return users as a collection Resource
        return new UsersCollectionResource($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a single user
        $user  = Users::findOrFail($id);

        //return a single user as a resource
        return new UserResource($user);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? Users::findOrFail($request->user_id) : new Users;

        $user->name = $request->input('name');
        $user->avatar = $request->input('avatar');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if ($user->save()) {
            return new UserResource($user);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get a single user
        $user  = Users::findOrFail($id);

        //delete
        if ($user->delete()) {
            return new UserResource($user);
        }
    }
}
