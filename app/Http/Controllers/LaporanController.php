<?php

namespace App\Http\Controllers;

use App\Models\JadwalVaksin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        ->where('status' , JadwalVaksin::DONE)
        ->orderBy('id', 'desc')->get();
        return Inertia::render('Vaksinator/Laporan', [
            'laporan' => $laporan
        ]);
    }

    public function export(Request $request)
    {
        $data = $request->get('data');
        if ($data == 'Minggu') {
            $time = Carbon::now()->startOfWeek();
        } elseif ($data == 'Bulan') {
            $time = Carbon::now()->startOfMonth();
        } elseif ($data == 'Tahun') {
            $time = Carbon::now()->startOfYear();
        }
        

        $laporan = JadwalVaksin::query()
        ->withCount('pendaftaran_vaksin')
        ->withSum('pendaftaran_vaksin', 'jumlah_hewan')
        ->with(['user', 'kecamatan', 'desa', 'alamat'])
        ->whereDate('updated_at', '>=', $time)
        ->orderBy('id', 'desc')
        ->get();

       
        // return $laporan;
       
        $pdf = PDF::loadview('pdf/export',['laporan'=> $laporan]);
        return $pdf->download('laporan-pdf.pdf');
    }
}
