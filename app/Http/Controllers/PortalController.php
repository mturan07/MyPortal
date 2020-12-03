<?php

namespace App\Http\Controllers;

//use App\Kayit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public static function getIcon($durum)
    {
        $sonuc = '';
        if ($durum == 'Clear') {
            $sonuc = 'fas fa-sun fa-3x';
        } 
        else if ($durum == 'Clouds'){
            $sonuc = 'fas fa-cloud fa-3x';
        }
        else if ($durum == 'Snow'){
            $sonuc = 'fas fa-snowflake fa-3x';
        }
        else if ($durum == 'Rain'){
            $sonuc = 'fas fa-cloud-showers-heavy fa-3x';
        }
        else if ($durum == 'Drizzle'){
            $sonuc = 'fas fa-cloud-rain fa-3x';
        }
        else if ($durum == 'Thunderstorm'){
            $sonuc = 'fas fa-poo-storm fa-3x';
        }     
        else {
            $sonuc = 'fas fa-smog fa-3x';
        }   
        return $sonuc;
    }

    public static function getDesc($durum)
    {
        $sonuc = '';
        if ($durum == 'Clear') {
            $sonuc = 'fas fa-sun fa-3x';
        } 
        else if ($durum == 'Clouds'){
            $sonuc = 'fas fa-cloud fa-3x';
        }
        else if ($durum == 'Snow'){
            $sonuc = 'fas fa-snowflake fa-3x';
        }
        else if ($durum == 'Rain'){
            $sonuc = 'fas fa-cloud-showers-heavy fa-3x';
        }
        else if ($durum == 'Drizzle'){
            $sonuc = 'fas fa-cloud-rain fa-3x';
        }
        else if ($durum == 'Thunderstorm'){
            $sonuc = 'fas fa-poo-storm fa-3x';
        }     
        else {
            $sonuc = 'fas fa-smog fa-3x';
        }   
        return $sonuc;
    }

    public static function getToday($gun)
    {
        $adi = '-';
        switch ($gun) {
            case 'Sun':
                $adi = 'Pazar';
            break;
            case('Mon'):
            $adi = 'Pazartesi';
            break;
            case('Tue'):
            $adi = 'Salı';
            break;
            case('Wed'):
            $adi = 'Çarşamba';
            break;
            case('Thu'):
            $adi = 'Perşembe';
            break;
            case('Fri'):
            $adi = 'Cuma';
            break;
            case('Sat'):
            $adi = 'Cumartesi';
            break;     
            default:
                $adi = '-';
                break;
        }

        return $adi;
    }

    public function getContent($bas, $son, $icerik){
        @preg_match_all('/' . preg_quote($bas, '/').'(.*?)'.preg_quote($son, '/').'/i', $icerik, $m);
        return @$m[1];
    }

    public function getHalFiyat(){
        $link = "https://www.antalya.bel.tr/BilgiEdin/halden-gunluk-fiyatlar";
        $icerik = file_get_contents($link);
        $urunler = $this->getContent('<p class="text-dark font-weight-bold">', '</p>', $icerik);
        return $urunler;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$topKay = Kayit::all()->count();
        $kayitsayisi = DB::table('kayits')->count();
        $toplamtutar = DB::table('kayits')->sum('tutar');
        //$meyveorani = DB::table('kayits')->where('');

        // $meyveoran = DB::table('kayits')
        //     ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
        //     ->join('grups', 'grups.id', '=', 'uruns.grup_id')
        //     ->where('uruns.grup_id', '=', '1')
        //     ->select('uruns.grup_id', 'grups.grupadi', DB::raw('COUNT(kayits.id) as ToplamKayit'))
        //     ->groupBy('uruns.grup_id', 'grups.grupadi')
        //     ->get();

        $meyve = DB::table('kayits')
            ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
            ->join('grups', 'grups.id', '=', 'uruns.grup_id')
            ->where('uruns.grup_id', '=', '1')
            //->select('uruns.grup_id', 'grups.grupadi', DB::raw('COUNT(kayits.id) as ToplamKayit'))
            ->select('kayits.id', 'grups.grupadi')
            //->groupBy('uruns.grup_id', 'grups.grupadi')
            ->get()->count();

        $meyvetoplam = DB::table('kayits')
            ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
            ->join('grups', 'grups.id', '=', 'uruns.grup_id')
            ->where('uruns.grup_id', '=', '1')
            ->sum('kayits.netagirlik');

        //$meyvetoplam = DB::table('kayits')->sum('netagirlik');

        $sebze = DB::table('kayits')
            ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
            ->join('grups', 'grups.id', '=', 'uruns.grup_id')
            ->where('uruns.grup_id', '=', '2')
            ->select('uruns.grup_id', 'grups.grupadi')
            ->get()->count();  

        $sebzetoplam = DB::table('kayits')
            ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
            ->join('grups', 'grups.id', '=', 'uruns.grup_id')
            ->where('uruns.grup_id', '=', '2')
            ->sum('kayits.netagirlik');
            
        $yesil = DB::table('kayits')
            ->join('uruns', 'uruns.id', '=', 'kayits.urun_id')
            ->join('grups', 'grups.id', '=', 'uruns.grup_id')
            ->where('uruns.grup_id', '=', '3')
            ->select('uruns.grup_id', 'grups.grupadi')
            ->get()->count();  

        $meyveoran = $kayitsayisi > 0 ? ($meyve/$kayitsayisi)*100 : 0;
        $sebzeoran = $kayitsayisi > 0 ? ($sebze/$kayitsayisi)*100 : 0;
        $yesiloran = $kayitsayisi > 0 ? ($yesil/$kayitsayisi)*100 : 0;

        $response = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=323776&units=metric&lang=tr&appid=e3953f900b3b5c76acd7692df0bc6beb');

        $response = json_decode($response);

        $bugun = $this->getToday(date('D'));

        $tarih = date('d.m.Y');

        $urunler = $this->getHalFiyat();

        //dd($urunler);

        //dd($response);

        //$sql = json_decode($toplam, true);
        //dd($meyveoran);
        return view('portal', compact(
            'kayitsayisi', 'toplamtutar', 'meyveoran', 'sebzeoran', 'yesiloran', 
            'meyvetoplam', 'sebzetoplam', 'urunler',
            'response', 'bugun', 'tarih'));
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
        //
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
        //
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
}
