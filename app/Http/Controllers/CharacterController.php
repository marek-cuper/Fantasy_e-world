<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Characters;
use App\Models\Character_picture;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $chars = Character_picture::all();

        if (Auth::user()->character == false){
            return view('character.newCharacter', ['chars' => $chars, ]);
        } else{
            $character = Characters::where('user_id', Auth::user()->id);
            return view('character.index', ['chars' => $chars,'character'=> $character, ]);
        }

    }

    public function createCharacter(Request $request)
    {
        $chars = Characters::all();
        $user = Auth::user();
        if($user->character == false){
            if (!$chars->contains('name' ,$request->name)){
                $character = new Characters;
                $character->user_id = $user->id;
                $character->name = $request->name;
                $character->level = 1;
                $character->picture = $request->id;
                $character->weapon = 0;
                $character->scroll1 = 0;
                $character->scroll2 = 0;
                $character->scroll3 = 0;
                $character->save();
                $user->character = true;
                $user->save();
            }
        }
        return $this->index();

    }


    public function setCharacterPicture(Request $request){
        Auth::user()->character = $request->id;
        Auth::user()->save();
        $this->index();
    }

    public function statistic(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application
    {
        $characters = \App\Models\Characters::paginate(10);

        $grid = new Datagrid($characters, $request->get('f', []));

        $grid->setColumn('name', 'Character name')->setColumn('level', 'Level');

        return view('character.statistic', ['grid' => $grid]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deleteCharacter()
    {
        $user = Auth::user();
        if ($user->character == 1){
            Characters::where('user_id', Auth::user()->id)->delete();

            $user->character = false;
            $user->save();
        }
        return $this->index();
    }
}
