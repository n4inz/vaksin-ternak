<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;

class LokasiController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::select('id', 'kecamatan')->orderBy('id', 'desc')->get()->toArray();
        $desas = Desa::select('id', 'desa')->orderBy('id', 'desc')->get()->toArray();
        $alamats = Alamat::select('id', 'alamat')->orderBy('id', 'desc')->get()->toArray();
        
        $combinedData = [];
        
        for ($i = 0; $i < count($kecamatans); $i++) {
            $data = [
                'kecamatan' => $kecamatans[$i]['kecamatan'] ?? null,
                'kecamatan_id' => $kecamatans[$i]['id'] ?? null,
                'desa' => $desas[$i]['desa'] ?? null,
                'desa_id' => $desas[$i]['id'] ?? null,
                'alamat' => $alamats[$i]['alamat'] ?? null,
                'alamat_id' => $alamats[$i]['id'] ?? null,
            ];
            array_push($combinedData, $data);
        }
        
        // return $combinedData;
        return Inertia::render('Vaksinator/Lokasi', [
            'combined' => $combinedData,
            
        ]);
    }

    public function addLokasi()
    {
        return Inertia::render('Vaksinator/AddLokasi');
    }

    public function saveLokasi(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required'
        ]);

        Kecamatan::create([
            'kecamatan' => $request->kecamatan
        ]);

        Desa::create([
            'desa' => $request->desa
        ]);


        Alamat::create([
            'alamat' => $request->alamat
        ]);

        

        return Redirect::route('index.lokasi')->with('success', 'Create lokasi suksess');
    }

    public function delete(Request $request)
    {
        
        Kecamatan::where('id' , $request->kec)->delete();

        Desa::where('id' , $request->des)->delete();


        Alamat::where('id' , $request->al)->delete();

        return Redirect::route('index.lokasi')->with('success', 'Delete lokasi suksess');
    }
}
