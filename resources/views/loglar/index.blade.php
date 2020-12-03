@extends('layouts.master')
@section('title', 'Kullanıcı Logları')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$loglar->count()}} kayıt bulundu.</strong></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kullanıcı</th>
                      <th>İşlem</th>
                      <th>Tarih</th>
                      <th>Açıklama</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($loglar as $log)
                      <tr>
                        <td>{{$log->kullanici}}</td>
                        <td>{{$log->islem}}</td>
                        <td>{{$log->tarih}}</td>
                        <td>{{$log->aciklama}}</td>
                      </tr>                   
                      @endforeach                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    
@endsection

@section('css')
@endsection

@section('js')
@endsection