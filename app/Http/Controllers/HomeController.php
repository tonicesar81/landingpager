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

        $modules = $ctas->concat($features);
        $modules = $modules->concat($forms);
        $modules = $modules->concat($infos);
        $modules = $modules->sortBy('order');
        return view('home', ['modules' => $modules]);
    }
}
