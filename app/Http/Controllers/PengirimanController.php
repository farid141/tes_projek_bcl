<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Armada;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eager loading
        $pengirimans = Pengiriman::with('armada')->get();
        return view('pengiriman.index', ['pengirimans'=>$pengirimans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $armadas=Armada::where('ketersediaan', 'tersedia')->get();
        return view('pengiriman.create', ['armadas'=>$armadas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_armada' => '',
            'tanggal_kirim' => 'required|date|after:today',
            'loc_asal' => '',
            'loc_tujuan' => '',
            'status' => 'required',
        ]);

        Pengiriman::create($validatedData);
        return redirect(route('pengiriman.index'))->with('success', 'New pengiriman has been added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
}
