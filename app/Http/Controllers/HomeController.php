<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Top;
use App\Top_cta;
use App\Feat_mod;
use App\Features;
use App\Forms;
use App\Infos;
use App\Mail_logs;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ctas = DB::table('top_ctas')
        ->select('*',DB::raw("'cta' AS module"))
        ->get();

        $features = DB::table('feat_mods')
        ->select('*',DB::raw("'feature' AS module"))
        ->get();

        $top = DB::table('tops')
        ->select('*',DB::raw("'top' AS module"))
        ->get();

        $prefs = DB::table('prefs')
        ->select('*')
        ->first();

        $mails = DB::table('mail_logs')
        ->select('*')
        ->get();

        foreach($features as $feature){
            $features->map(function ($feature){
                $feats = DB::table('features')->where('feat_mods_id', $feature->id)->get();
                $feature->item = $feats;
                return $feature;
            });
        }
        $forms = DB::table('forms')
        ->select('*', DB::raw("'form' AS module"))
        ->get();

        $infos = DB::table('infos')
        ->select('*', DB::raw("'info' AS module"))
        ->get();

        $topform = DB::table('top_forms')
        ->select('*', DB::raw("'topform' AS module"))
        ->get();

        $modules = $ctas->concat($features);
        $modules = $modules->concat($forms);
        $modules = $modules->concat($infos);
        $modules = $modules->concat($top);
        $modules = $modules->concat($topform);
        $modules = $modules->sortBy('order');
        return view('home', ['modules' => $modules, 'prefs' => $prefs, 'mails' => $mails]);
    }

    public function mails(){
        $mail_logs = Mail_logs::all();
        $data = [
            'mails' => $mail_logs
        ];

        return view('admin.mails.index', $data);
    }
}
