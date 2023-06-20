<?php

namespace App\Http\Controllers;

use App\Models\JadwalVaksin;
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

    public function daftarVaksinasi($id)
    {
        $jadwal = JadwalVaksin::where('id',$id)->with('nama_vaksin')->orderBy('id', 'desc')->first();
        return Inertia::render('landingPage/DaftarVaksin',[
            'jadwal' => $jadwal
        ]);
    }

    public function storeVaksinasi(Request $request)
    {
        
        $request->validate([
            'nik' => 'required|integer',
            'jumlah_hewan' => 'required|integer',
            'nama_pemilik' => 'required',
        ]);

        PendaftaranVaksin::create([
            'nik' => $request->nik,
            'nama_pemilik' => $request->nama_pemilik,
            'jumlah_hewan' => $request->jumlah_hewan,
            'jadwal_vaksin_id' => $request->jadwal_vaksin_id
        ]);

        return Redirect::route('landingPage.daftarVaksinasi' , ['id' => $request->jadwal_vaksin_id])->with('message', 'Pendaftaran berhasil');
        
    }
}
