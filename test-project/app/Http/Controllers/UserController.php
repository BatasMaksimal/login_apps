<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            return redirect('/welcome');
        }
         
         return view('login',[
             "title"=>"Shone pager",
            
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');
        
        $attemp_login = Auth::attempt(['email' => $email, 'password' => $password]);
        
        if ($attemp_login) {
            $user = Auth::user();
            
            return response()->json([
              "status" => "success",
              "userDetails" => $user,
           ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "The provided credentials do not match our records."
            ]);
        }
    }
    
    /**
     * 
     */
    public function logout(Request $request)
    {
        try{
            Auth::logout();
            return response()->json([
                "status" => "success",
                "message" => "Successfully logged out"
            ]);
        } catch (Exception $ex){
            return response()->json([
                "status" => "error",
                "message" => $ex
            ]);
        }
}

public function userDetails()
    {
        return response()->json(auth()->user());
    }

    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
