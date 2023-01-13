<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeaponController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $character = Characters::where('user_id', Auth::user()->id);
//        if ( Weapon::where('id', $character->value('weapon'))->value('playable') == 0 ){
//            $this->setPlayableWeapon();
//        }

        if(Auth::user()->name == "admin"){
            $weps = Weapon::all();
        }else{
            $weps = Weapon::where('playable', '1')->get();
        }

        return view('weapon.index', ['weps' => $weps, 'character'=> $character,]);
    }

    public function changePlayability(Request $request){
        if(Weapon::where('id', $request->id)->value('playable') == '1'){
            Weapon::where('id', $request->id)->update(['playable' => '0']);
            $this->setPlayableWeapon($request->id);

        }else{
            Weapon::where('id', $request->id)->update(['playable' => '1']);
        }

    }

//  Function is made for set playable weapon
    public function setPlayableWeapon(int $id){
        $wepid = Weapon::where('playable', 1)->first()->id;
        Characters::where('weapon', $id)->update(['weapon' => $wepid]);

    }

    public function setWeapon(Request $request){
        Characters::where('user_id', Auth::user()->id)->update(['weapon' => $request->id]);
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
