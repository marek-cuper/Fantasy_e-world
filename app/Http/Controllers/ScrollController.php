<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Scroll;
use App\Models\User;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $scro = Scroll::all();
        $character = Characters::where('user_id', Auth::user()->id);

        return view('scroll.index', ['scro' => $scro,'character'=> $character, ]);
    }

    public function setScroll(Request $request){
        //Check if scrolls are different
        $one = Characters::where('user_id', Auth::user()->id)->value('scroll1');
        $two = Characters::where('user_id', Auth::user()->id)->value('scroll2');
        $three = Characters::where('user_id', Auth::user()->id)->value('scroll3');

        if($request->id != $one && $request->id != $two && $request->id != $three){
            if ($request->scroll == 1){
                Characters::where('user_id', Auth::user()->id)->update(['scroll1' => $request->id]);
            }else if ($request->scroll == 2){
                Characters::where('user_id', Auth::user()->id)->update(['scroll2' => $request->id]);
            } else if ($request->scroll == 3){
                Characters::where('user_id', Auth::user()->id)->update(['scroll3' => $request->id]);
            }
        }


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
