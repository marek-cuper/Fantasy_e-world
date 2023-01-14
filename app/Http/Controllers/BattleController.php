<?php

namespace App\Http\Controllers;

use App\Models\Bosses;
use App\Models\Character_picture;
use App\Models\Characters;
use App\Models\Scroll;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $bosses = Bosses::all();
        $character = Characters::where('user_id', Auth::user()->id);
        $player_img = Character_picture::where('id', $character->value('picture'));
        $player_wep = Weapon::where('id', $character->value('weapon'));
        $player_scroll1 = Scroll::where('id', $character->value('scroll1'));
        $player_scroll2 = Scroll::where('id', $character->value('scroll2'));
        $player_scroll3 = Scroll::where('id', $character->value('scroll3'));




        return view('game.lobby', ['bosses'=> $bosses, 'character'=> $character]);
    }

    public function battle()
    {
        $character = Characters::where('user_id', Auth::user()->id);
        $boss = Bosses::where('id',$character->value('level'));

        $player_img_src = Character_picture::where('id', $character->value('picture'))->value('image_path');
        $player_wep = Weapon::where('id', $character->value('weapon'));
        $player_scroll1 = Scroll::where('id', $character->value('scroll1'));
        $player_scroll2 = Scroll::where('id', $character->value('scroll2'));
        $player_scroll3 = Scroll::where('id', $character->value('scroll3'));
        return view('game.battle', ['boss'=> $boss, 'character'=> $character, 'player_img_src' => $player_img_src, 'player_wep' => $player_wep, 'player_scroll1' => $player_scroll1, 'player_scroll2' => $player_scroll2, 'player_scroll3' => $player_scroll3]);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
