<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefs;

class PrefsController extends Controller
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
        $prefs = Prefs::find(1);

        $data = [
            'prefs' => $prefs
        ];

        //return var_dump($prefs->sitename);
        return view('admin.prefs.create', $data);
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
        $prefs = Prefs::find(1);
        if(is_null($prefs)){
            $prefs = new Prefs;
        }

        if($request->has('sitename')){
            $prefs->sitename = $request->input('sitename');
        }
        
        if ($request->hasFile('logo')){
            $prefs->logo = $request->file('logo')->store('prefs');

        }

        if($request->has('whatsapp')){
            $prefs->whatsapp = $request->input('whatsapp');
        }

        $prefs->save();
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
