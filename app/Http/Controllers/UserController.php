<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;

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
    public function index(Request $request)
    {
        $users = \App\Models\User::paginate(10);

        $grid = new Datagrid($users, $request->get('f', []));

        $grid->setColumn('name', 'Full name')->setColumn('level', 'Level');

//        $weps = \App\Models\Weapon::all();
//        return view('user.index', ['grid' => $grid, 'weps' => $weps]);
        return view('user.index', ['grid' => $grid]);
    }

    public function settings()
    {
        return view('settings');
    }

//    public function getPlayerName()
//    {
//
//        $name = Auth::user()->name;
//        return $name;
//
//    }

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
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $hasher = app('hash');
        if ($hasher->check($request->oldPassword, $user->password)) {

            if($request->newPassword == $request->confirmPassword){
                $user->password = $hasher->make($request->newPassword);
                $user->save();
                Auth::logout();
                return Redirect()->route('login');
            }

        } else {
            $text = 'Wrong password';
            return Redirect()->route('settings');
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
            Auth::logout();

            if ($user->delete()) {

                return Redirect()->route('login');
            }
        } else {
            $text = 'Wrong password';
            return Redirect()->route('settings',['deleteaccount' => $text]);
        }

    }
}
