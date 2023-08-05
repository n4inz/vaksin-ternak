<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\DataVaksin;
use App\Models\Desa;
use App\Models\JadwalVaksin;
use App\Models\Kecamatan;
use App\Models\PendaftaranVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LandingPageControllrer extends Controller
{
    public function index()
    {
        $jadwal = JadwalVaksin::with(['nama_vaksin'])
                    ->orderBy('id', 'desc')
                    ->whereHas('nama_vaksin')
                    ->withCount('pendaftaran_vaksin')
                    ->get();
        
        return Inertia::render('landingPage/index' , [
            'jadwal' => $jadwal,
        ]);
 
    }

    public function daftarVaksinasi()
    {
        $jadwal = JadwalVaksin::with('nama_vaksin')->orderBy('id', 'desc')->get();
        $kecamatan = Kecamatan::orderBy('id','desc')->get();
        $desa = Desa::orderBy('id','desc')->get();
        $alamat = Alamat::orderBy('id','desc')->get();

        $namaVaksin = DataVaksin::orderBy('id','desc')->get();
        return Inertia::render('landingPage/DaftarVaksin',[
            'jadwal' => $jadwal,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'alamat' => $alamat,
            'namaVaksin' => $namaVaksin
        ]);
    }

    public function storeVaksinasi(Request $request)
    {
        
        $request->validate([
            'nik' => 'required|integer',
            'jumlah_hewan' => 'required|integer',
            'nama_pemilik' => 'required',
            'umur_jumlah' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'jadwal_form' => 'required',
            'no_hp' => 'required'
        ]);

        PendaftaranVaksin::create([
            'nik' => $request->nik,
            'nama_pemilik' => $request->nama_pemilik,
            'jumlah_hewan' => $request->jumlah_hewan,
            'jadwal_vaksin_id' => $request->jadwal_form,
            'umur_jumlah' => $request->umur_jumlah,
            'umur_bulan' => $request->umur_bulan,
            'no_hp' => '+62'.$request->no_hp
        ]);

        return Redirect::route('landingPage.daftarVaksinasi' , ['id' => $request->jadwal_vaksin_id])->with('message', 'Pendaftaran berhasil');
        
    }
}
