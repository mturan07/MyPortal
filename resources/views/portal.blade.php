@extends('layouts.master')
@section('title', 'My Portal')
@section('firmaadi', 'My Portal')
@section('content')
    @inject('provider', 'App\Http\Controllers\PortalController')

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kayıt Sayısı</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kayitsayisi }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calculator fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tutar Toplam</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $toplamtutar }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-lira-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Meyve Oranı -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Meyve Toplam</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $meyvetoplam }} Kg</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-apple-alt fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Sebze Oranı -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sebze Toplam</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sebzetoplam }} Kg</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-pepper-hot fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Oranlar -->
            <div class="mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Oranlar</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Meyve Oranı <span class="float-right">%{{ number_format($meyveoran, 2) }}</span></h4>
                        <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ number_format($meyveoran, 0) }}0%" aria-valuenow="{{ number_format($meyveoran, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Sebze Oranı <span class="float-right">%{{ number_format($sebzeoran, 2) }}</span></h4>
                        <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ number_format($sebzeoran, 2) }}%" aria-valuenow="{{ number_format($sebzeoran, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Yeşillik Oranı <span class="float-right">%{{ number_format($yesiloran, 2) }}</span></h4>
                        <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format($yesiloran, 2) }}%" aria-valuenow="{{ number_format($yesiloran, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hava Durumu -->
            <div class="mb-4">
                
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hava Tahmini</h6>
                </div>
                <div class="card-body">
                    <!--weather card-->
                    <div class="card card-weather">
                        <div class="card-body">
                            <div class="weather-date-location">
                                <h3>{{ $bugun }}</h3>
                                <p class="text-gray"> <span class="weather-date">{{ $tarih }}</span> <span class="weather-location">{{ $response->city->name }} {{ $response->city->country }}</span> </p>
                            </div>
                            <div class="weather-data d-flex">
                                <div class="mr-auto">
                                    <i class="fas fa-sun fa-3x"></i>
                                    <br>
                                    <h4 class="display-3">{{ $response->list[2]->main->temp }} <span class="symbol">°</span>C</h4>
                                    <p> {{ $response->list[2]->weather[0]->description }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex weakly-weather">
                                @foreach ($response->list as $item)
                                    @if (strpos($item->dt_txt, '12:00:00'))                                                     
                                        <div class="weakly-weather-item">
                                            <i class="{{ $provider::getIcon($item->weather[0]->main) }}"></i>                                               
                                            <p class="mb-1"> {{ $provider::getToday(gmdate("D", $item->dt)) }} </p> 
                                            <p class="mb-1"> {{ $item->main->temp }}°<br>Nem: {{ $item->main->humidity }} </p>
                                        </div>
                                    @endif
                                @endforeach                                                        
                            </div>
                        </div>
                    </div>
                    <br>
                    <span class="ml-2">Not: Sunulan değerler öğlen saatine aittir. (Kaynak : <strong>OpenWeather</strong>)</span>
                    <!--weather card ends-->
                </div>
                </div>

                {{--  <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Widget</h6>
                </div>
                <div class="card-body">
                </div>
                </div>  --}}

            </div>              
        </div>
        <div class="col-lg-6">
            <!-- Hal Fiyatları -->
            <div class="mb-4"> 
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ABB Hal Fiyatları</h6>
                    </div>
                    <div class="card-body">
                        {{-- @for ($i = 0; $i < count($urunler)-1; $i++)
                            <ul>
                                <li> {{ $i }} {!! $urunler[$i] !!} {{ $i }} {!! $urunler[$i+1] !!}</li>
                            </ul>                        
                        @endfor --}}
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                  <th>Ürün Adı</th>
                                  <th>Fiyat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urunler as $urun)
                                    @if($loop->odd)
                                        <tr>
                                        <td>{!! $urun !!}</td>
                                    @else
                                        <td>{!! $urun !!}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>

@endsection
