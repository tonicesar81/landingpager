<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopForms;

class TopFormsController extends Controller
{
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
        return view('admin.topform.create');
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
        $topform = new TopForms;

        if($request->has('anchor')){
            $topform->anchor = $request->input('anchor');
        }
        if($request->has('logo')){
            $topform->logo = 1;
        }
        if($request->has('whats')){
            $topform->whats = 1;
        }
        if ($request->hasFile('bg_image')){
            $topform->bg_image = $request->file('bg_image')->store('topforms');

        }
        if ($request->has('fixed')) {
            //
            $topform->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $topform->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $topform->content = $request->input('content');
        }
        if($request->has('email')){
            $topform->email = $request->input('email');
        }
        if($request->has('btn_class')){
            $topform->btn_class = $request->input('btn_class');
        }
        if($request->has('form_title')){
            $topform->form_title = $request->input('form_title');
        }
        if($request->has('form_color')){
            $topform->form_color = $request->input('form_color');
        }

        $topform->save();
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
        $topform = TopForms::find($id);

        if($request->has('delete')){
            $bg_image = $topform->bg_image;

            $topform->delete();
            Storage::delete($bg_image);
            return;
        }

        if($request->has('anchor')){
            $topform->anchor = $request->input('anchor');
        }
        if($request->has('logo')){
            $topform->logo = 1;
        }
        if($request->has('whats')){
            $topform->whats = 1;
        }
        if ($request->hasFile('bg_image')){
            $topform->bg_image = $request->file('bg_image')->store('topforms');

        }
        if ($request->has('fixed')) {
            //
            $topform->fixed = 1;
        }
        if ($request->has('bg_color')) {
            //
            $topform->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $topform->content = $request->input('content');
        }
        if($request->has('email')){
            $topform->email = $request->input('email');
        }
        if($request->has('btn_class')){
            $topform->btn_class = $request->input('btn_class');
        }
        if($request->has('form_title')){
            $topform->form_title = $request->input('form_title');
        }
        if($request->has('form_color')){
            $topform->form_color = $request->input('form_color');
        }
        if ($request->has('enabled')) {
            //
            $topform->enabled = 1;
        }else{
            $topform->enabled = 0;
        }
        if($request->has('order')){
            $topform->order = $request->input('order');
        }

        $topform->save();
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
