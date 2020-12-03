<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->yetki != "Yönetici") {
            abort(403, 'Bu sayfayı görmeye yetkili değilsiniz!');
        }

        $kullanicilar = User::all();
        return view('kullanicilar.index', compact('kullanicilar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->yetki != "Yönetici") {
            abort(403, 'Bu sayfayı görmeye yetkili değilsiniz!');
        }

        return view('kullanicilar.create');
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
            $kullanici = new User;
            $kullanici->name = $request->name;
            $kullanici->email = $request->email;
            $kullanici->password = Hash::make($request->password);
            $kullanici->save();
            toastr()->success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Bilgi');            
        } catch (\Throwable $th) {
            toastr()->error('Hata : '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('kullanicilar.index');
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
        if (Auth::user()->yetki != "Yönetici") {
            abort(403, 'Bu sayfayı görmeye yetkili değilsiniz!');
        }

        $kullanici = User::findOrFail($id);
        return view('kullanicilar.edit', compact('kullanici'));
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
            $kullanici = User::find($id);
            if(isset($kullanici)){
                $kullanici->name = $request->name;
                $kullanici->email = $request->email;
                $kullanici->password = Hash::make($request->password);
                $kullanici->save();
                toastr()->success('Kayıt başarıyla güncellendi.', 'Bilgi');
            }
        } catch (\Throwable $th) {
            toastr()->error('Hata: '. $th->getMessage(), 'İşlem başarısız oldu!');
        }

        return redirect()->route('kullanicilar.index'); 
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
            User::find($id)->delete();
            toastr()->success('Kayıt başarıyla silindi.', 'Bilgi');        
        } catch (\Throwable $th) {
            toastr()->success('Kayıt silme başarısız oldu!', 'Hata: '. $th->getMessage());  
        }
        return redirect()->route('kullanicilar.index');
    }
}
