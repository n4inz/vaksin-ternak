<?php

namespace App\Http\Controllers;

use App\Models\DataVaksin;
use App\Models\JadwalVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JadwalVaksinController extends Controller
{
    public function index()
    {
        $jadwal = JadwalVaksin::query()->orderBy('id', 'desc')->get();
        return Inertia::render('Vaksinator/JadwalVaksin',[
            'jadwal' => $jadwal
        ]);
    }

    public function createJadwal()
    {
        $dataVaksin = DataVaksin::query()->get();
        return Inertia::render('Vaksinator/BuatJadwalVaksin',[
            'dataVaksin' => $dataVaksin
        ]);
    }

    public function storeJadwal(Request $request)
    {
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
            
        ]);

        return Redirect::route('jadwal.index')->with('success', 'Create jadwal suksess');
    }

    public function jadwalSaya(Request $request)
    {
        return Inertia::render('Vaksinator/JadwalSaya');
    }
}
