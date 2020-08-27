<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Prefs;
use App\Top;
use App\Top_cta;
use App\Feat_mod;
use App\Features;
use App\Forms;
use App\Infos;

class PageController extends Controller
{
    //
    public function index()
    {
        //$top = DB::table('tops')->find(1);

        $prefs = Prefs::find(1);

        $tops= DB::table('tops')
        ->select('*',DB::raw("'top' AS module"))
        ->where('enabled', 1)->get();
         
        $ctas = DB::table('top_ctas')
        ->select('*',DB::raw("'cta' AS module"))
        ->where('enabled', 1)->get();

        $topform = DB::table('top_forms')
        ->select('*',DB::raw("'topform' AS module"))
        ->where('enabled', 1)->get();

        $features = DB::table('feat_mods')
        ->select('*',DB::raw("'feature' AS module"))
        ->where('enabled',1)->get();

        foreach($features as $feature){
            $features->map(function ($feature){
                $feats = DB::table('features')->where('feat_mods_id', $feature->id)->get();
                $feature->item = $feats;
                return $feature;
            });
        }

        $forms = DB::table('forms')
        ->select('*', DB::raw("'form' AS module"))
        ->where('enabled', 1)->get();

        $infos = DB::table('infos')
        ->select('*', DB::raw("'info' AS module"))
        ->where('enabled', 1)->get();

        $modules = $ctas->concat($features);
        $modules = $modules->concat($topform);
        $modules = $modules->concat($forms);
        $modules = $modules->concat($infos);
        $modules = $modules->concat($tops);
        $modules = $modules->sortBy('order');

        //return var_dump($modules);
        return view('page',['prefs'=> $prefs, 'modules' => $modules]);
    }
}
