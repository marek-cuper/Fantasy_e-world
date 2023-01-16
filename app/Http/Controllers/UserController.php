<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;

use App\Models\Characters;
use App\Models\User;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application
    {
        $name = Auth::user()->name;
        return view('user.profile', ['name' => $name]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeName(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'newName' => ['required', 'string', 'max:255'],
        ]);
        $try = User::where('name', $request->newName)->first();
        if($try === null){
            $user->name = $request->newName;
            $user->save();
            $name = $user->name;
            return Redirect()->route('profile', ['name' => $name]);
        }else{
            return Redirect()->route('profile', ['name' => $user->name]);
        }
    }

    public function changeEmail(Request $request)
    {
        $user = Auth::user();
        $hasher = app('hash');
        $try = User::where('email' ,$request->newEmail)->first();
        if($try === null){
            if($user->email === $request->oldEmail){

                if ($hasher->check($request->confirmPassword, $user->password)) {

                    $request->validate([
                        'newEmail' =>['required', 'email:rfc,dns', 'max:255'],
                    ]);

                    $user->email = $request->newEmail;
                    $user->save();
                    Auth::logout();
                    return Redirect()->route('login');

                } else {
                    $text = 'Wrong password';
                    return Redirect()->route('profile');
                }

            }else {
                $text = 'Wrong old email';
                return Redirect()->route('profile');
            }
        }else {
            $text = 'Someone already use this email address';
            return Redirect()->route('profile');
        }



    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $hasher = app('hash');
        if ($hasher->check($request->oldPassword, $user->password)) {

            $request->validate([
                'newPassword' => 'string|min:6|confirmed',

            ]);

            if($request->newPassword == $request->confirmPassword){
                $user->password = $hasher->make($request->newPassword);
                $user->save();
                Auth::logout();
                return Redirect()->route('login');
            }

        } else {
            $text = 'Wrong password';
            return Redirect()->route('user.profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $user = Auth::user();
        $hasher = app('hash');
        if ($hasher->check($request->password, $user->password)) {
            $char = Characters::where('user_id', $user->id)->first();
            if($char != null){
                app('App\Http\Controllers\CharacterController')->deleteCharacter();
            }
            Auth::logout();

            if ($user->delete()) {

                return Redirect()->route('login');
            }
        } else {
            $text = 'Wrong password';
            return Redirect()->route('user.profile',['deleteaccount' => $text]);
        }

    }
}
