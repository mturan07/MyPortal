<?php

namespace App\Http\Controllers;

use App\Grup;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gruplar = Grup::all();
        return view('gruplar.index', compact('gruplar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gruplar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $grup = new Grup;
            $grup->grupadi = $request->grupadi;
            $grup->save();
            toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('gruplar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grup = Grup::findOrFail($id);
        return view('gruplar.edit', compact('grup'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $grup = Grup::find($id);
            if(isset($grup)){
                $grup->grupadi = $request->grupadi;
                $grup->save();
                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('Hata: '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('gruplar.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        try {
            Grup::find($id)->delete();
            toastr()->success('Kayıt başarıyla silindi.', 'Bilgi');        
        } catch (\Throwable $th) {
            toastr()->success('Kayıt silme başarısız oldu!', 'Hata: '. $th->getMessage());  
        }
        return redirect()->route('gruplar.index');
    }
}
