<?php

namespace App\Http\Controllers;

use App\Models\JadwalVaksin;
use Illuminate\Http\Request;
use Inertia\Inertia;
class LaporanController extends Controller
{
    public function index()
    {
        $laporan = JadwalVaksin::query()
        ->withCount('pendaftaran_vaksin')
        // ->with('pendaftaran_vaksin')
        ->withSum('pendaftaran_vaksin', 'jumlah_hewan')
        ->with(['user' , 'kecamatan', 'desa' , 'alamat'])
        ->orderBy('id', 'desc')->get();
        return Inertia::render('Vaksinator/Laporan', [
            'laporan' => $laporan
        ]);
    }
}
