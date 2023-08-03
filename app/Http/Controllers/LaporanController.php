<?php

namespace App\Http\Controllers;

use App\Models\JadwalVaksin;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PDF;

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

    public function export()
    {

        $pdf = PDF::loadview('pdf/export',['pegawai'=> []]);
        return $pdf->download('laporan-pdf.pdf');
    }
}
