<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Pipes\WindowsPipes;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datosValidados =  $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required',
                'rol'=> 'required'
            ]
            );

         $newUser = new User();
         $newUser->name = $datosValidados['name'];
         $newUser->email = $datosValidados['email'];
         $newUser -> passwosrd = $datosValidados['password'];
         $newUser -> rol = $datosValidados['rol'];
         $newUser-> save();


        return view('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('user.edit', compact('user'));
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

        $datosModificados = $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required',
                'rol'=> 'required'
            ]
            );
            $user -> name = $datosModificados['name'];
            $user->email = $datosModificados['email'];
            $user-> password = $datosModificados['password'];
            $user->rol = $datosModificados['rol'];

            return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
