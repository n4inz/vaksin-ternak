<?php

namespace App\Http\Controllers;

use App\Models\DataVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DataVaksinController extends Controller
{
    public function index()
    {
        $vaksin =  DataVaksin::query()->orderBy('id','desc')->get();
        return Inertia::render('Vaksinator/DataVaksin',[
            'vaksin' => $vaksin
        ]);
    }

    public function storeVaksin(Request $request)
    {
        $request->validate([
            'nama_vaksin' => 'required',
            'jumlah' => 'required'
        ]);
        DataVaksin::create([
            'nama_vaksin' => $request->nama_vaksin,
            'jumlah' => $request->jumlah
        ]);


        return Redirect::route('dataVaksin')->with('success','Tambah data vaksin suksess');
        
    }

    public function deleteVaksin(Request $request, DataVaksin $id)
    {
        $id->delete();
        return Redirect::route('dataVaksin')->with('success','Tambah data vaksin suksess');

    }

    
}
