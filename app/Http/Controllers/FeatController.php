<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Feat_mod;
use App\Features;

class FeatController extends Controller
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
        return view('admin.features.create');
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
        $feat = new Feat_mod;
        
        if ($request->has('anchor')) {
            //
            $feat->anchor = $request->input('anchor');
        }
        if ($request->hasFile('bg_image')){
            $feat->bg_image = $request->file('bg_image')->store('feat_mods');

        }
        if ($request->has('fixed')) {
            //
            $feat->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $feat->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $feat->content = $request->input('content');
        }

        $feat->save();
        $images = $request->image;
        $contents = $request->f_content;
        $bg_color = $request->f_color;
        foreach($request->f_id as $k => $v){
            $feature = new Features;
            $feature->feat_mods_id = $feat->id;
            $feature->image = $images[$k]->store('features');
            $feature->content = $contents[$k];
            $feature->bg_color = $bg_color[$k];
            
            $feature->save();
        }

        //return $feat->id;
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
        $feat = Feat_mod::find($id);

        if($request->has('delete')){

            $feat->delete();
            
            return redirect('/home')->with('message', 'Módulo excluido com sucesso');
            return;
        }
        
        if ($request->has('anchor')) {
            //
            $feat->anchor = $request->input('anchor');
        }
        if ($request->hasFile('bg_image')){
            $feat->bg_image = $request->file('bg_image')->store('feat_mods');

        }
        if ($request->has('fixed')) {
            //
            $feat->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $feat->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $feat->content = $request->input('content');
        }
        if($request->has('enabled')){
            $feat->enabled = 1;
        }else{
            $feat->enabled = 0;
        }
        if($request->has('order')){
            $feat->order = $request->input('order');
        }

        $feat->save();
        $images = $request->image;
        $contents = $request->f_content;
        $bg_color = $request->f_color;
        foreach($request->f_id as $k => $v){
            if($v == 'n'){
                $feature = new Features;
                $feature->feat_mods_id = $feat->id;
                $feature->image = $images[$k]->store('features');
                $feature->content = $contents[$k];
                $feature->bg_color = $bg_color[$k];
                $feature->save();
            }else{
                $feature = Features::find($v);
                $feature->feat_mods_id = $feat->id;
                if(!is_null($images)){
                    if (array_key_exists($k, $images)) {
                        $feature->image = $images[$k]->store('features');
                    }
                }
                if(!is_null($contents)){
                    if(array_key_exists($k, $contents)){
                        $feature->content = $contents[$k];
                    }
                }
                if(!is_null($bg_color)){
                    if(array_key_exists($k, $bg_color)){
                        $feature->bg_color = $bg_color[$k];
                    }
                }
                
                $feature->save();
            }
            
            
            
            
            
            
            
        }
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
