@extends('layouts.master')
@section('title', 'Kayıt Listesi')
@section('firmaadi', 'My Portal')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$kayitlar->count()}} kayıt bulundu.</strong></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="mytable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ürün Adı</th>
                      <th>Birim Adı</th>
                      <th>Birim Fiyat</th>
                      <th>Net Ağırlık</th>
                      <th>Tutar</th>
                      {{-- <th>Onaylı</th> --}}
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($kayitlar as $kayit)
                      <tr>
                        <td>{{$kayit->getUrun->urunadi}}</td>
                        <td>{{$kayit->getBirim->birimadi}}</td>
                        <td>{{$kayit->birimfiyat}}</td>
                        <td>{{$kayit->netagirlik}}</td>
                        <td>{{$kayit->tutar}}</td>
                        {{-- <td>{{$kayit->onayli ? 'Evet' : 'Hayır'}}</td>    --}}
                        <td>
                            <a href="{{ route('kayitlar.edit', $kayit->id) }}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            {{-- href="{{ route('urunler.delete', $urun->id) }}"  --}}
                            <button onclick = 
                            "
                             $.confirm({
                                title:'Onay',
                                content:'Kayıt silinsin mi?',
                                buttons: {
                                    onay: {
                                        btnClass: 'btn-blue',
                                        action: function(){
                                          event.preventDefault();
                                          window.location.href = '/portal/kayit/delete/' + {{ $kayit->id }};
                                          //$.alert('Kayıt silindi!');
                                        }
                                    },
                                    vazgec: {
                                        btnClass: 'btn-warning',
                                    },
                                }
                             });
                            " value="{{ $kayit->id }}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                        </td>
                      </tr>                   
                      @endforeach                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    
@endsection

@section('css')
    <!-- JQuery Confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" />    
@endsection

@section('js')
  <!-- JQuery Confirm -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
  <script src="{{asset('theme/')}}/js/datatable.js"></script>
@endsection