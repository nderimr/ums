<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UsersResource;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::paginate(15);
        
        return UsersResource::Collection($users);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=$request->isMethod('put')? User::findOrFail($request->id): new User;
        $user->id=$request->input('id');
        $user->first_name=$request->input('first_name');        
        $user->last_name=$request->input('last_name');
        $user->email=$request->input('email');
        $user->verified=0;
        $user->password=bcrypt($request->input('password'));
        
        if($user->save()){
            return new UsersResource($user);
        } 

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);

        return new UsersResource($user);
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user=User::findOrFail($id);
         if($user->delete()){
          return new UsersResource($user);
        }
    }
}
