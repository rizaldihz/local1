<?php

namespace App\Http\Controllers;

use App\Production;
use App\WilayahKerja;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $param)
    {
        // pindah query ke controller
        $wilayah = WilayahKerja::all();
        if($param->isMethod('get') || ($param->isMethod('post') && $param->input('all')!=null)) {
            foreach($wilayah as $wil){
                $data[$wil->nama] = Production::where('wilayah_kerja_id','=',$wil->id)->get();
            }
            $productions = Production::all();
            return view('home',['productions'=>$productions,
                                'data' => $data]);
        }else{
            $start = $param->input('startDate');
            $end= $param->input('endDate');
            foreach($wilayah as $wil){
                $data[$wil->nama] = Production::where([['wilayah_kerja_id','=',$wil->id],
                                                    ['tanggal','>=',$start],['tanggal','<=',$end]])->get();
            }
            $productions = Production::all();
            return view('home',['productions'=>$productions,
                                'data' => $data,
                                'start' => $start,
                                'end' => $end]);
        }
    }
    public function show($id)
    {
        return view('Production.eyesOnWilayah', ['id'=>$id]);
    }
}
