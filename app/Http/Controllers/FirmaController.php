<?php

namespace App\Http\Controllers;

use App\Firma;
use Illuminate\Http\Request;

class FirmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function show(Firma $firma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function edit(Firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $firma = Firma::find($id);
            if(isset($firma)){
                $firma->firma_unvan = $request->firma_unvan;
                $firma->firma_adres = $request->firma_adres;
                $firma->firma_telefon = $request->firma_telefon;
                $firma->firma_faks = $request->firma_faks;
                $firma->firma_eposta = $request->firma_eposta;
                $firma->save();
                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('Hata: '. $th->getMessage(), 'İşlem başarısız oldu!');
        }
        return view(); // redirect()->route('firma.update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firma $firma)
    {
        //
    }
}
