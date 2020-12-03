@extends('layouts.master')
@section('title', 'Kullanıcı Listesi')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$kullanicilar->count()}} kayıt bulundu.</strong></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ad Soyad</th>
                      <th>E-posta</th>
                      <th>Yetki</th>
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($kullanicilar as $kullanici)
                      <tr>
                        <td>{{$kullanici->name}}</td>
                        <td>{{$kullanici->email}}</td>
                        <td>{{$kullanici->yetki}}</td>
                        <td>
                            <a href="{{ route('kullanicilar.edit', $kullanici->id) }}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
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
                                          window.location.href = '/kullanici/delete/' + {{ $kullanici->id }};
                                          //$.alert('Kayıt silindi!');
                                        }
                                    },
                                    vazgec: {
                                        btnClass: 'btn-warning',
                                    },
                                }
                             });
                            " value="{{ $kullanici->id }}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
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
@endsection