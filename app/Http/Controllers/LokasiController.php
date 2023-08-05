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
        $kecamatans = Kecamatan::select('id', 'kecamatan')->with(['desa' => function($desa){
            $desa->with('alamat');
        }])->orderBy('id', 'desc')->get()->toArray();

        // return $kecamatans;
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
            'combined' => $kecamatans,
            
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
        
        $kec = Kecamatan::where('kecamatan', $request->kecamatan)->first('id');
        if(!$kec){
            $kec = Kecamatan::create([
                'kecamatan' => $request->kecamatan
            ]);
        } 

        $des = Desa::where('desa', $request->desa)->first('id');

        if(!$des){
            $des = Desa::create([
                'desa' => $request->desa,
                'kecamatans_id' => $kec->id,
            ]);
        }


        Alamat::create([
            'alamat' => $request->alamat,
            'kecamatans_id' => $kec->id,
            'desas_id' => $des->id
        ]);

        return Redirect::route('index.lokasi')->with('success', 'Create lokasi suksess');
    }

    public function delete(Request $request)
    {
        Kecamatan::where('id' , $request->kec)->delete();
        Alamat::where('kecamatans_id' , $request->kec)->delete();
        Desa::where('kecamatans_id' , $request->kec)->delete();
        return Redirect::route('index.lokasi')->with('success', 'Delete lokasi suksess');
    }
}
