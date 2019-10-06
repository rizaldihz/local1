<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Exports\ProductsExportView;
use App\Production;
use App\WilayahKerja;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class ProductionController extends Controller
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
        return view('/Production/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $wilayah = WilayahKerja::find($request->input('idwilayah'));

        $request->validate([
            'tanggal' => 'required',
            'produksi_minyak' => 'required',
            'produksi_gas' => 'required',
            'fuel_gas' => 'required',
            'flare' => 'required',
            'injeksi_gas' => 'required',
            'produksi_air' => 'required',
            'injeksi_air' => 'required'
        ]);

        $productions = Production::create([
            'tanggal' => Carbon::createFromFormat('m/d/Y', $request->input('tanggal'))->format('Y-m-d'),
            'wilayah_kerja_id' => $wilayah->id,
            'produksi_minyak' => $request->input('produksi_minyak'),
            'produksi_gas' => $request->input('produksi_gas'),
            'fuel_gas' => $request->input('fuel_gas'),
            'flare' => $request->input('flare'),
            'injeksi_gas' => $request->input('injeksi_gas'),
            'produksi_air' => $request->input('produksi_air'),
            'injeksi_air' => $request->input('injeksi_air'),
        ]);

        if ($productions) {
            return redirect()->route('production.create')->with('success', 'Production Record Successfully..!');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production = DB::table('productions')
            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
            ->where('productions.wilayah_kerja_id', '=', $id)
            ->get();
            return view('Production.readWilayah', ['production'=>$production]);
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

    public function export_view($id)
    {
        return Excel::download(new ProductsExportView($id), 'products.xlsx');
    }

    public function export(){
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    /**
     * Fetch the particular company details
     * @return json response
     */
    public function chart($id)
    {
        $result = \DB::table('productions')
            ->where('wilayah_kerja_id','=',$id)
            ->orderBy('tanggal', 'ASC')
            ->get();
        return response()->json($result);
    }

    public function resetPass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:8',
            'confirm' => 'required|min:8',
            'password' => 'required|min:8',
            'token' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages());
        }
        $user = User::find(Crypt::decryptString($request->input('token')));
        // dd($user);
        // die();
        if(!(Hash::check($request->input('old_password'),$user->password))){
            return Redirect::back()->withErrors(['wrong','Password Salah!']);
        }
        if($request->input('password')!=$request->input('confirm')){
            return Redirect::back()->withErrors(['wrong','Password yang anda masukkan tidak cocok!']);
        }
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return Redirect::back()->with('message','Password berhasil dirubah.');
    }

    public function showresetPass()
    {
        $users = User::all();
        return view('auth.reset',compact('users'));
    }
}
