<?php

namespace App\Http\Controllers;

use App\Paslon;
use App\voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class pemilihController extends Controller
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

        $data = Paslon::all();
        return view('pemilih.home', ['data' => $data]);

    }

    
    public function detail( $id ) {

        $data = Paslon::find($id);
        return view('pemilih.detail', ['data' => $data]);

    }

    public function pilihPaslon( $id ) {

        $paslon = Paslon::find($id);
        $noUrutPaslon = $paslon->no_urut_paslon;

        $idUser = Auth::user()->id;

        voting::create([

            'id_user' => $idUser,
            'no_urut_paslon' => $noUrutPaslon,

        ]);
        DB::table('users')->where('id',$idUser)->update([
            'status' => 1
        ]);
        Alert::success('Success', 'Kamu Berhasil Memilih');
        return redirect('/home');

    }

}
