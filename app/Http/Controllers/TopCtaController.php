<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Top_cta;

class TopCtaController extends Controller
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
        return view('admin.topcta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cta = new Top_cta;
        //
        if ($request->has('anchor')) {
            //
            $cta->anchor = $request->input('anchor');
        }
        if ($request->has('logo')) {
            //
            $cta->logo = 1;
        }
        if ($request->has('whats')) {
            //
            $cta->whats = 1;
        }
        if ($request->hasFile('bg_image')){
            $cta->bg_image = $request->file('bg_image')->store('bgs');

        }
        if ($request->has('fixed')) {
            //
            $cta->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $cta->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $cta->content = $request->input('content');
        }
        if($request->has('cta_text')){
            $cta->cta_text = $request->input('cta_text');
        }
        if($request->has('cta_class')){
            $cta->cta_class = $request->input('cta_class');
        }
        if($request->has('cta_link')){
            $cta->cta_link = $request->input('cta_link');
        }

        $cta->save();
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
        $cta = Top_cta::find($id);
        //
        if($request->has('delete')){
            $bg_image = $cta->bg_image;

            $cta->delete();
            Storage::delete($bg_image);
            return;
        }
        if ($request->has('anchor')) {
            //
            $cta->anchor = $request->input('anchor');
        }
        if ($request->has('logo')) {
            //
            $cta->logo = 1;
        }
        if ($request->has('whats')) {
            //
            $cta->whats = 1;
        }
        if ($request->hasFile('bg_image')){
            $cta->bg_image = $request->file('bg_image')->store('bgs');

        }
        if ($request->has('fixed')) {
            //
            $cta->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $cta->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $cta->content = $request->input('content');
        }
        if($request->has('cta_text')){
            $cta->cta_text = $request->input('cta_text');
        }
        if($request->has('cta_class')){
            $cta->cta_class = $request->input('cta_class');
        }
        if($request->has('cta_link')){
            $cta->cta_link = $request->input('cta_link');
        }
        if($request->has('enabled')){
            $cta->enabled = 1;
        }else{
            $cta->enabled = 0;
        }
        if($request->has('order')){
            $cta->order = $request->input('order');
        }

        $cta->save();
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
