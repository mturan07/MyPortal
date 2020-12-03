<?php

namespace App\Http\Controllers;

use Auth;
use App\Userlog;
use App\Kayit;
use App\Urun;
use App\Birim;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;


class KayitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kayitlar = Kayit::orderBy('created_at', 'desc')->get();
        return view('kayitlar.index', compact('kayitlar'));
    }

    public function LogKaydet($kullanici, $islem, $aciklama) {
        try {
            $log = new Userlog;
            $log->kullanici = $kullanici;
            $log->islem = $islem;
            $log->aciklama = $aciklama;
            $log->save();            
            //toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'Log kaydı başarısız oldu!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urunler = Urun::all();
        $birimler = Birim::all();
        return view('kayitlar.create', compact('urunler', 'birimler'));
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
            $kayit = new Kayit;
            $kayit->urun_id = $request->urun_id;
            $kayit->birim_id = $request->birim_id;
            $kayit->birimfiyat = $request->birimfiyat;   
            $kayit->netagirlik = $request->netagirlik;   
            $kayit->tutar = $request->tutar;   
            $kayit->onayli = $request->onayli;
            $kayit->created_user_id = Auth::user()->id;
            $kayit->save();

            // log kaydı - başlangıç
            $urunadi = Urun::findOrFail($kayit->urun_id)->urunadi;
            $birimadi = Birim::findOrFail($kayit->birim_id)->birimadi;

            $this->LogKaydet(Auth::user()->name.' (id:'.Auth::user()->id.')', 'Kayıt Ekle', 
                '[urun_id:'.$kayit->urun_id.' ('.$urunadi.')]'.
                '[birim_id:'.$kayit->birim_id.' ('.$birimadi.')]'.
                '[birimfiyat:'.$kayit->birimfiyat.']'.
                '[netagirlik:'.$kayit->netagirlik.']'.
                '[tutar:'.$kayit->tutar.']'.
                '[onayli:'.$kayit->onayli.']'.
                '[created_user_id:'.Auth::user()->id.']'
            );
            // log kaydı - bitiş

            toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('kayitlar.index');
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
        $urunler = Urun::all();
        $birimler = Birim::all();
        $kayit = Kayit::findOrFail($id);
                
        return view('kayitlar.edit', compact('urunler', 'birimler', 'kayit'));
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
            $kayit = Kayit::find($id);
            if(isset($kayit)){
                $kayit->urun_id = $request->urun_id;
                $kayit->birim_id = $request->birim_id;
                $kayit->birimfiyat = $request->birimfiyat;   
                $kayit->netagirlik = $request->netagirlik;   
                $kayit->tutar = $request->tutar;   
                $kayit->onayli = $request->onayli;
                $kayit->updated_user_id = Auth::user()->id;
                $kayit->save();

                // log kaydı - başlangıç
                $urunadi = Urun::findOrFail($kayit->urun_id)->urunadi;
                $birimadi = Birim::findOrFail($kayit->birim_id)->birimadi;

                $this->LogKaydet(Auth::user()->name.' (id:'.Auth::user()->id.')', 'Kayıt Düzenle', 
                    '[urun_id:'.$kayit->urun_id.' ('.$urunadi.')]'.
                    '[birim_id:'.$kayit->birim_id.' ('.$birimadi.')]'.
                    '[birimfiyat:'.$kayit->birimfiyat.']'.
                    '[netagirlik:'.$kayit->netagirlik.']'.
                    '[tutar:'.$kayit->tutar.']'.
                    '[onayli:'.$kayit->onayli.']'.
                    '[created_user_id:'.Auth::user()->id.']'
                );
                // log kaydı - bitiş

                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('İşlem başarısız oldu!', 'Hata : '. $th->getMessage());
        }

        return redirect()->route('kayitlar.index');
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
            // log kaydı - başlangıç
            $kayit = Kayit::findOrFail($id);
            $urunadi = Urun::findOrFail($kayit->urun_id)->urunadi;
            $birimadi = Birim::findOrFail($kayit->birim_id)->birimadi;

            $this->LogKaydet(Auth::user()->name.' (id:'.Auth::user()->id.')', 'Kayıt Silme', 
                '[urun_id:'.$kayit->urun_id.' ('.$urunadi.')]'.
                '[birim_id:'.$kayit->birim_id.' ('.$birimadi.')]'.
                '[birimfiyat:'.$kayit->birimfiyat.']'.
                '[netagirlik:'.$kayit->netagirlik.']'.
                '[tutar:'.$kayit->tutar.']'.
                '[onayli:'.$kayit->onayli.']'.
                '[created_user_id:'.Auth::user()->id.']'
            );
            // log kaydı - bitiş

            Kayit::find($id)->delete();
            toastr()->success('Kayıt başarıyla silindi.', 'Bilgi');        
        } catch (\Throwable $th) {
            toastr()->success('Kayıt silme başarısız oldu!', 'Hata : '. $th->getMessage());  
        }
        return redirect()->route('kayitlar.index');
    }
}
