<?php

namespace App\Http\Controllers;

use App\Urun;
use App\Kayit;
use App\Grup;
use App\Birim;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $urunler = Urun::orderBy('created_at', 'desc')->get();
        return view('urunler.index', compact('urunler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gruplar = Grup::all();
        $birimler = Birim::all();
        return view('urunler.create', compact('gruplar', 'birimler'));
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
            $urun = new Urun;
            $urun->urunadi = $request->urunadi;
            $urun->birim_id = $request->birim_id;
            $urun->grup_id = $request->grup_id;
            $urun->birimfiyat = $request->birimfiyat;   
            $urun->cinsi = $request->cinsi;   
            $urun->barkod = $request->barkod;   
            $urun->sinif = $request->sinif;
            $urun->save();
            toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('urunler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id . " nolu ürün";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gruplar = Grup::all();
        $birimler = Birim::all();
        $urun = Urun::findOrFail($id);
                
        return view('urunler.edit', compact('gruplar', 'birimler', 'urun'));
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
            $urun = Urun::find($id);
            if(isset($urun)){
                $urun->urunadi = $request->urunadi;
                $urun->birim_id = $request->birim_id;
                $urun->grup_id = $request->grup_id;
                $urun->birimfiyat = $request->birimfiyat;   
                $urun->cinsi = $request->cinsi;   
                $urun->barkod = $request->barkod;   
                $urun->sinif = $request->sinif;
                $urun->save();
                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('İşlem başarısız oldu!', 'Hata : '. $th->getMessage());
        }

        return redirect()->route('urunler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
    }

    function isUsed($id){
        return Kayit::where('urun_id', '=', $id)->get()->count();
    }

    public function delete($id)
    {
        try {
            if ($this->isUsed($id) > 0){
                toastr()->error('Diğer tablolarda kullanıldığı için silinemez!', 'Uyarı');
            }
            else
            {
                Urun::find($id)->delete();
                toastr()->success('Ürün başarıyla silindi.', 'Bilgi');        
            }
        } catch (\Throwable $th) {
            toastr()->success('Ürün silme başarısız oldu!', 'Hata : '. $th->getMessage());  
        }
        return redirect()->route('urunler.index');
    }
}
