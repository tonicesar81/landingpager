<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Top;

class TopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tops.create');
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
        $top = new Top;
        
        if($request->has('logo')){
            $top->logo = 1;
        }
        if($request->has('whats')){
            $top->whats = 1;
        }
        if($request->has('sticked')){
            $top->sticked = 1;
        }
        if($request->hasFile('bg_image')){
            $top->bg_image = $request->file('bg_image')->store('tops');
        }
        if($request->has('bt_whats')){
            $top->bt_whats = $request->input('bt_whats');
        }
        if($request->has('bg_color')){
            $top->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $top->content = $request->input('content');
        }

        $top->save();

        return redirect('/home')->with('message', 'Módulo criado com sucesso');
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
        $top = Top::find($id);

        if($request->has('delete')){
            $bg_image = $top->bg_image;

            $top->delete();
            Storage::delete($bg_image);

            return redirect('/home')->with('message', 'Módulo excluido com sucesso');
            return;
        }

        if($request->has('logo')){
            $top->logo = 1;
        }else{
            $top->logo = 0;
        }
        if($request->has('whats')){
            $top->whats = 1;
        }else{
            $top->whats = 0;
        }
        if($request->has('sticked')){
            $top->sticked = 1;
        }else{
            $top->sticked = 0;
        }
        if($request->hasFile('bg_image')){
            $top->bg_image = $request->file('bg_image')->store('tops');
        }
        if($request->has('bt_whats')){
            $top->bt_whats = $request->input('bt_whats');
        }
        if($request->has('bg_color')){
            $top->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $top->content = $request->input('content');
        }
        if($request->has('enabled')){
            $top->enabled = 1;
        }else{
            $top->enabled = 0;
        }
        if($request->has('order')){
            $top->order = $request->input('order');
        }

        $top->save();
        return redirect('/home')->with('message', 'Módulo alterado com sucesso');
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
