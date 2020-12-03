<?php

namespace App\Http\Controllers;

use Auth;
use App\Userlog;
use Illuminate\Http\Request;

class UserlogController extends Controller
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
        
        //DB::table('users')->orderBy('id')
        $loglar = Userlog::orderBy('tarih', 'desc')->get();
        return view('loglar.index', compact('loglar'));
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
     * @param  \App\Userlog  $userlog
     * @return \Illuminate\Http\Response
     */
    public function show(Userlog $userlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userlog  $userlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Userlog $userlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userlog  $userlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userlog $userlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userlog  $userlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userlog $userlog)
    {
        //
    }
}
