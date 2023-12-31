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
        $jadwal = JadwalVaksin::with(['nama_vaksin' ,'kecamatan' ,'desa' , 'alamat'])
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
        $jadwal = JadwalVaksin::with(['nama_vaksin' ,'kecamatan' ,'desa' , 'alamat'])->orderBy('id', 'desc')->get();
        // return $jadwal;
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
        
    //    return $request->all();
        // $kec = Kecamatan::where('id', $request->kecamatan)->first('kecamatan');
        // $des = Desa::where('id', $request->desa)->first('desa');
        // $alamat = Alamat::where('id', $request->alamat)->first('alamat');
        // $request->validate([
        //     'nik' => 'required|integer',
        //     'jumlah_hewan' => 'required|integer',
        //     'nama_pemilik' => 'required',
        //     'umur_jumlah' => 'required',
        //     'kecamatan' => 'required',
        //     'desa' => 'required',
        //     'alamat' => 'required',
        //     'jadwal_form' => 'required',
        //     'no_hp' => 'required'
        // ]);

        // PendaftaranVaksin::create([
        //     'nik' => $request->nik,
        //     'nama_pemilik' => $request->nama_pemilik,
        //     'jumlah_hewan' => $request->jumlah_hewan,
        //     'jadwal_vaksin_id' => $request->jadwal_form,
        //     'umur_jumlah' => $request->umur_jumlah,
        //     'umur_bulan' => $request->umur_bulan,
        //     'kecamatan' => $kec ? $kec->kecamatan : $request->kecamatan,
        //     'desa' => $des ? $des->desa :  $request->desa,
        //     'alamat' => $alamat ? $alamat->alamat :  $request->alamat,
        //     'no_hp' => '+62'.$request->no_hp
        // ]);

        // return Redirect::route('landingPage.daftarVaksinasi' , ['id' => $request->jadwal_vaksin_id])->with('message', 'Pendaftaran berhasil');
        
        $jadwal = JadwalVaksin::where('id', $request->kecamatan)
        ->with(['nama_vaksin' ,'kecamatan' ,'desa' , 'alamat'])
        ->first();
     
        $query = DataVaksin::where('nama_vaksin' ,$request->nama_vaksin);
        $dataVaksin = $query->first();

        $query->update([
            'terpakai' => $dataVaksin->terpakai + 1
        ]);

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
            'jadwal_vaksin_id' => $request->kecamatan,
            'umur_jumlah' => $request->umur_jumlah,
            'umur_bulan' => $request->umur_bulan,
            'kecamatan' => $jadwal->kecamatan->kecamatan,
            'desa' => $jadwal->desa->desa,
            'alamat' => $jadwal->alamat->alamat,
            'no_hp' => '+62'.$request->no_hp,
            'nama_vaksin' => $request->nama_vaksin
        ]);

        return Redirect::route('landingPage.daftarVaksinasi' , ['id' => $request->jadwal_vaksin_id])->with('message', 'Pendaftaran berhasil');
    
    }
}
