<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Forms;

class FormsController extends Controller
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
        return view('admin.forms.create');
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
        $form = new Forms;

        if($request->has('anchor')){
            $form->anchor = $request->input('anchor');
        }
        if($request->has('email')){
            $form->email = $request->input('email');
        }
        if($request->has('bt_class')){
            $form->bt_class = $request->input('bt_class');
        }
        if($request->has('bg_color')){
            $form->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $form->content = $request->input('content');
        }

        $form->save();
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
        $form = Forms::find($id);

        if($request->has('delete')){
            
            $form->delete();
            
            return redirect('/home')->with('message', 'Módulo excluido com sucesso');
            return;
        }

        if($request->has('anchor')){
            $form->anchor = $request->input('anchor');
        }
        if($request->has('email')){
            $form->email = $request->input('email');
        }
        if($request->has('bt_class')){
            $form->bt_class = $request->input('bt_class');
        }
        if($request->has('bg_color')){
            $form->bg_color = $request->input('bg_color');
        }
        if($request->has('content')){
            $form->content = $request->input('content');
        }
        if($request->has('enabled')){
            $form->enabled = 1;
        }else{
            $form->enabled = 0;
        }
        if($request->has('order')){
            $form->order = $request->input('order');
        }
        
        $form->save();
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
