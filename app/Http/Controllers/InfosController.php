<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Infos;

class InfosController extends Controller
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
        return view('admin.infos.create');
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
        $info = new Infos;
        
        if($request->has('anchor')){
            $info->anchor = $request->input('anchor');
        }
        if($request->hasFile('image')){
            $info->image = $request->file('image')->store('infos');
        }
        if($request->has('bg_color')){
            $info->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $info->content = $request->input('content');
        }
        if($request->has('side')){
            $info->side = $request->input('side');
        }

        $info->save();
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
        $info = Infos::find($id);

        if($request->has('delete')){
            $image = $info->image;

            $info->delete();
            Storage::delete($image);
            return;
        }
        
        if($request->has('anchor')){
            $info->anchor = $request->input('anchor');
        }
        if($request->hasFile('image')){
            $info->image = $request->file('image')->store('infos');
        }
        if($request->has('bg_color')){
            $info->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $info->content = $request->input('content');
        }
        if($request->has('side')){
            $info->side = $request->input('side');
        }
        if($request->has('enabled')){
            $info->enabled = 1;
        }else{
            $info->enabled = 0;
        }
        if($request->has('order')){
            $info->order = $request->input('order');
        }

        $info->save();
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
        $info = Infos::find($id);
        
    }
}
