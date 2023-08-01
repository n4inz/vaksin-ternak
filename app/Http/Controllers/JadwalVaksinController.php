<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\DataVaksin;
use App\Models\Desa;
use App\Models\JadwalVaksin;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JadwalVaksinController extends Controller
{
    public function index()
    {
        $jadwal = JadwalVaksin::query()
        ->withCount('pendaftaran_vaksin')
        // ->with('pendaftaran_vaksin')
        ->withSum('pendaftaran_vaksin', 'jumlah_hewan')
        ->with('user')
        ->orderBy('id', 'desc')->get();
        // return $jadwal;
        return Inertia::render('Vaksinator/JadwalVaksin',[
            'jadwal' => $jadwal
        ]);
    }

    public function createJadwal()
    {
        $kecamatan = Kecamatan::orderBy('id', 'desc')->get();
        $desa = Desa::orderBy('id', 'desc')->get();
        $alamat = Alamat::orderBy('id', 'desc')->get();
        $dataVaksin = DataVaksin::query()->get();
        return Inertia::render('Vaksinator/BuatJadwalVaksin',[
            'dataVaksin' => $dataVaksin,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'alamat' => $alamat,
        ]);
    }

    public function storeJadwal(Request $request)
    {
        // return $request;
        $request->validate([
            'jadwal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'nama_vaksin' => 'required'
        ]);
        JadwalVaksin::create([
            'jadwal' => $request->jadwal. ' '.$request->waktu,
            'lokasi' => $request->lokasi,
            'data_vaksins_id' => $request->nama_vaksin,
            'keterangan' => $request->keterangan
        ]);

        return Redirect::route('jadwal.index')->with('success', 'Create jadwal suksess');
    }

    public function jadwalSaya(Request $request)
    {
        $jadwal = JadwalVaksin::query()
        ->withCount('pendaftaran_vaksin')
        ->with('nama_vaksin')
        ->whereHas('nama_vaksin')
        ->withSum('pendaftaran_vaksin', 'jumlah_hewan')
        ->orderBy('id', 'desc')->get();
        
        return Inertia::render('Vaksinator/JadwalSaya',[
            'jadwal' => $jadwal
        ]);
    }

    public function addJumlahVaksin(Request $request)
    {
       
        $request->validate([
            'jumlahVaksin' => 'required',
            'status' => 'required'
        ]);

        $user = $request->user();
        $query = JadwalVaksin::where('id', $request->id);
        
        $jadwalVaksin = $query->first(['id','data_vaksins_id']);
        $dataVaksin = DataVaksin::where('id',$jadwalVaksin->data_vaksins_id);

        // if( ($dataVaksin->first()->jumlah - $dataVaksin->first()->terpakai ) <= $request->jumlahVaksin AND $dataVaksin->first()->jumlah <= $request->jumlahVaksin){
        //     return Redirect::route('jadwal.jadwalSaya')->with('message' , 'stok_'.$request->id);
        // }

        $query->update([
            'jumlah_vaksin' => $request->jumlahVaksin,
            'user_id' => $user->id,
            'status' => $request->status
        ]);

        $dataVaksin->update([
            'terpakai' => $request->jumlahVaksin + $dataVaksin->first()->terpakai,
        ]);

    }

    public function deleteJadwal(JadwalVaksin $id)
    {
        $id->delete();
        return Redirect::route('jadwal.index')->with('message' , 'Success delete');
    }
}
