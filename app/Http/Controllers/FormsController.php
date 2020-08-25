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
    }

    public function sendEmail(Request $request){

        $form = DB::table('forms')->select('*')->where('id', $request->input('form_id'))->first();

        $messages = [
            'required' => 'O campo :attribute precisa ser preenchido.',
            'email' => 'O campo :attribute é inválido'
        ];
        
         $validator = Validator::make($request->all(), [
            'nome'=>'required',
            'email'=>'required|email',
            'telefone' => 'required',
            'mensagem' => 'required'
         ],$messages);

        if ($validator->fails()) {
            return redirect('/#'.$form->anchor)
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $to_name = '';

        $to_email = $form->email;
        $from_name = $request->input('nome');
        $from_mail = $request->input('email');

        $body = [
            'nome' => $request->input('nome'), 
            'telefone' => $request->input('telefone'), 
            'mensagem' => $request->input('mensagem')
        ];

        $data = array('body' => $body);

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email, $from_name,$from_mail) {
            $message->to($to_email)
            ->subject('Contato via site');
            $message->from($from_mail,$from_name);
        });

        return redirect('/#'.$form->anchor)->with('success', 'Sua mensagem foi enviada e em breve entraremos em contato. Obrigado.');
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
