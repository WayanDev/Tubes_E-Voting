<?php

namespace App\Http\Controllers;

use App\User;
use App\Paslon;
use App\voting;
use pagination;
use App\HasilVoting;
use Illuminate\Support\Collection;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;


class AdminController extends Controller
{
    //Method untuk menampilkan data Paslon
    public function tabelPaslon() {
        $data = Paslon::all();
        return view('admin.tabelPaslon', ['data' => $data]);
    }

    //Method untuk menampilkan data Akun Pemilih
    public function tabelAkun() {
        //join tabel
        $data = DB::table('users')
                    ->join('tbl_status','users.status', '=' , 'tbl_status.id')
                    ->select('users.*','tbl_status.nama')
                    ->get();
        return view('admin.tabelAkun', ['data' => $data]);
    }

    //Method untuk menampilkan halaman dashboard
    public function dashboard() {
        //$jumlahsuara   = DB::select('select * FROM tbl_hasil_voting');
        $belumvoting   = DB::select('SELECT COUNT(status) as jumlahbelumvoting from users where status = 2 GROUP by status');
    	$kandidat       = DB::select('SELECT COUNT(id) as jumlah FROM tbl_paslon');	
        $jumlahhaksuara = DB::select('SELECT COUNT(username) as jumlah FROM users WHERE role = "Pemilih"');
        $suaramasuk     = DB::select('SELECT COUNT(username) as suaramasuk FROM users WHERE status = 1');
    	return view('admin.dashboard',[
    		//'jumlahsuara'    => $jumlahsuara,
            'jumlahkandidat' => $kandidat,
            'jumlahhaksuara'    => $jumlahhaksuara,
            'belumvoting'    => $belumvoting,
            'suaramasuk'     => $suaramasuk
    	]);

    }

    //Method untuk proses menghapus data Paslon
    public function hapus( $id ) {
        $data = Paslon::find($id);

        $imgKetua = $data->img_ketua;
        $imgWakil = $data->img_wakil;

        File::delete('img_ketua/' . $imgKetua);
        File::delete('img_wakil/' . $imgWakil);

        $data->delete();

        Alert::success('Success', 'Data Berhasil Di Hapus');

        return redirect('/tabelPaslon');
    }

    //Method untuk menampilkan halaman tambah data Paslon
    public function viewTambah() {
        return view('admin.tambah');
    }

    //Method untuk proses tambah data Paslon
    public function prosesTambah( Request $request ) {
        //validasi form input
        $this->validate($request, [
            'no_urut_paslon' => 'required|integer|unique:tbl_paslon,no_urut_paslon',
            'ketua_paslon' => 'required',
            'wakil_paslon' => 'required',
            'visi_paslon' => 'required',
            'misi_paslon' => 'required',
            'img_ketua' => 'required|max:2000|file|mimes:jpg,png,jpeg|image',
            'img_wakil' => 'required|max:2000|file|mimes:jpg,png,jpeg|image'

        ]);
        $imgKetua = $request->file('img_ketua');
        $imgWakil = $request->file('img_wakil');

        $namaFileKetua = time() . '_' . $imgKetua->getClientOriginalName();
        $namaFileWakil = time() . '_' . $imgWakil->getClientOriginalName();

        $folderKetua = 'img_ketua';
        $folderWakil = 'img_wakil';

        Paslon::create([
            'no_urut_paslon' => $request->no_urut_paslon,
            'ketua_paslon' => $request->ketua_paslon,
            'wakil_paslon' => $request->wakil_paslon,
            'visi_paslon' => $request->visi_paslon,
            'misi_paslon' => $request->misi_paslon,
            'img_ketua' => $namaFileKetua,
            'img_wakil' => $namaFileWakil

        ]);

        $imgKetua->move($folderKetua, $namaFileKetua);
        $imgWakil->move($folderWakil, $namaFileWakil);

        Alert::success('Success', 'Upload Paslon Berhasil');

        return redirect()->route('tabelPaslon');
    }

    //Method untuk menampilkan halaman edit data Paslon
    public function edit( $id ) {
        $data = Paslon::find($id);
        return view('admin.edit', ['data' => $data]);

    }

    //Method untuk proses mengedit data Paslon
    public function prosesEdit( $id, Request $request ) {
        //validasi form edit
        $this->validate($request, [
            'no_urut_paslon' => 'required|integer',
            'ketua_paslon' => 'required',
            'wakil_paslon' => 'required',
            'visi_paslon' => 'required',
            'misi_paslon' => 'required',
            'img_ketua' => 'max:2000|file|mimes:jpg,png,jpeg|image',
            'img_wakil' => 'max:2000|file|mimes:jpg,png,jpeg|image'

        ]);

        //Memanggil Model Paslon.php
        $data = Paslon::find($id);
        $data->no_urut_paslon = $request->no_urut_paslon;
        $data->ketua_paslon = $request->ketua_paslon;
        $data->wakil_paslon = $request->wakil_paslon;
        $data->visi_paslon = $request->visi_paslon;
        $data->misi_paslon = $request->misi_paslon;
        if ( $request->file('img_ketua') !== null && $request->file('img_wakil') !== null ) {
            $imgKetua = $request->file('img_ketua');
            $imgWakil = $request->file('img_wakil');

            // Nama File
            $namaFileKetua = time() . '_' . $imgKetua->getClientOriginalName();
            $namaFileWakil = time() . '_' . $imgWakil->getClientOriginalName();

            // Nama Folder
            $folderKetua = 'img_ketua';
            $folderWakil = 'img_wakil';

            // Masukkan Gambar Ke Dalam Folder
            $imgKetua->move($folderKetua, $namaFileKetua);
            $imgWakil->move($folderWakil, $namaFileWakil);

            // Ambil img lama
            $imgWakilLama = $data->img_wakil;
            $imgKetuaLama = $data->img_ketua;

            // Hapus File Yg Lama
            File::delete('img_ketua/' . $imgKetuaLama);
            File::delete('img_wakil/' . $imgWakilLama);

             // Ubah Gambar Lama Dengan Yg Baru
            $data->img_ketua = $namaFileKetua;
            $data->img_wakil = $namaFileWakil;

            $data->save();

        } elseif ( $request->file('img_ketua') == null || $request->file('img_wakil') == null ) {
            $data->save();
        }      

        Alert::success('Success', 'Data Berhasil Di Ubah');

        return redirect('/tabelPaslon');
    }

    //Method untuk menampilkan halaman detail Paslon
    public function detail( $id ) {
        $data = Paslon::find($id);
        return view('admin.detail', ['data' => $data]);
    }

    //Method untuk menampilkan halaman registerPemilih
    public function registerPemilih() {
        return view('admin.registerPemilih');
    }

    //Method untuk proses registerPemilih
    public function prosesRegisterPemilih( Request $request ) {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'role' => 'Pemilih',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'   => 2
        ]);

        Alert::success('Success', 'Register Akun Berhasil');
        return redirect('/tabelAkun');
    }

    //Method untuk proses voteSelesai
    public function voteSelesai() {
        $i = 1;
        while( $i <= 3 ) {
            $hasilNoUrut = count(voting::where('no_urut_paslon', $i)->get());
            HasilVoting::create([
                'no_urut_paslon' => $i,
                'jumlah_vote' => $hasilNoUrut
            ]);
            $i++;
        }
        return redirect('/dashboard');
    }

    public function hasilVote() {
        $data = HasilVoting::all();
        return view('admin.hasilVote', ['data' => $data]);
    }

    //Method untuk menampilkan halaman import Pemilih
    public function importPemilih() {
        return view('admin.importPemilih');
    }

    //Method untuk proses import Pemilih
    public function importExcel( Request $request ) {
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file_excel');

        $namaFile = rand().$file->getClientOriginalName();
        $file->move('file_user', $namaFile);

        Excel::import(new UserImport, public_path('/file_user' . '/' . $namaFile));

        Alert::success('Success', 'Import Data Berhasil');

        return redirect('/tabelAkun');
    }
}