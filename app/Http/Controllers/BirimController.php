<?php

namespace App\Http\Controllers;

use App\Urun;
use App\Kayit;
use App\Birim;
use Illuminate\Http\Request;

class BirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birimler = Birim::all();
        return view('birimler.index', compact('birimler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birimler.create');
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
            $birim = new Birim;
            $birim->birimadi = $request->birimadi;
            $birim->save();
            toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('birimler.index');
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
        $birim = Birim::findOrFail($id);
        return view('birimler.edit', compact('birim'));
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
            $birim = Birim::find($id);
            if(isset($birim)){
                $birim->birimadi = $request->birimadi;
                $birim->save();
                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('Hata: '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('birimler.index'); 
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

    function isUsed($id){
        $kayitToplam = Kayit::where('birim_id', '=', $id)->get()->count();
        $urunToplam = Urun::where('birim_id', '=', $id)->get()->count();
        $sonuc = $kayitToplam > $urunToplam ? $kayitToplam : $urunToplam;
        return $sonuc;
    }

    public function delete($id)
    {
        try {
            //dd($this->isUsed($id));
            if ($this->isUsed($id) > 0){
                toastr()->error('Diğer tablolarda kullanıldığı için silinemez!', 'Uyarı');
            }
            else
            {
                Birim::find($id)->delete();
                toastr()->success('Kayıt başarıyla silindi.', 'Bilgi');                 
            }
       
        } catch (\Throwable $th) {
            toastr()->success('Kayıt silme başarısız oldu!', 'Hata: '. $th->getMessage());  
        }
        return redirect()->route('birimler.index');
    }
}
