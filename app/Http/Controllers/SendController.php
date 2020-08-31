<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Forms;
use App\Prefs;

use App\Mail_logs;

class SendController extends Controller
{
    //
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

        $mail_log = new Mail_logs;
        $mail_log->nome = $request->input('nome');
        $mail_log->telefone = $request->input('telefone');
        $mail_log->email = $request->input('email');
        $mail_log->mensagem = $request->input('mensagem');
        $mail_log->save();
        
        return redirect('/#'.$form->anchor)->with('success', 'Sua mensagem foi enviada e em breve entraremos em contato. Obrigado.');
    }

    public function regClick(){
        $prefs = Prefs::find(1);
        //$cta = Top_cta::find($request->id);
        //$cta->whats_click = $cta->whats_click + 1;
        $prefs->wpp_clicks = $prefs->wpp_clicks + 1;
        $prefs->save();
        //https://api.whatsapp.com/send?phone={!! $prefs->whatsapp !!}
        return redirect('https://api.whatsapp.com/send?phone='.$prefs->whatsapp);
    }
}
