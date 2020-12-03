@extends('layouts.master')
@section('title', 'Kayıt Ekle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Kayıt Ekle</strong></h6>
            </div>
            <div class="card-body">

                <form id="formKayit" action="{{route('kayitlar.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-3">
                  <label for="urun_id">Ürün Adı</label>
                  <select name="urun_id" id="urun_id" class="form-control" autofocus>
                    <option value="">Seçim Yapınız</option>
                    @foreach ($urunler as $urun)
                        <option value="{{$urun->id}}">{{$urun->urunadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="birim_id">Birim Adı</label>
                  <select name="birim_id" id="birim_id" class="form-control">
                    <option value="">Seçim Yapınız</option>
                    @foreach ($birimler as $birim)
                        <option value="{{$birim->id}}">{{$birim->birimadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="birimfiyat">Birim Fiyat</label>
                  <input type="number" data-decimals="2" min="0" max="999" step="0.05" class="form-control" name="birimfiyat" id="birimfiyat" required>                  
                </div>

                <div class="form-group col-md-3">
                  <label for="netagirlik">Net Ağırlık</label>
                  <input type="number" data-decimals="2" min="0" max="99999" step="0.05" class="form-control" name="netagirlik" id="netagirlik" required>                  
                </div>

                <div class="form-group col-md-3">
                  <label for="tutar">Tutar</label>
                  <input type="number" pattern="(([1-9]\d{2}|[1-9]\d|[1-9]\d),\d)|0,[1-9]" size="6" min="0" max="9999999" step="0.05" class="form-control" name="tutar" id="tutar" required>                  
                </div>

                {{-- <div class="form-group col-md-3">
                  <label for="onayli">Onaylı</label>
                  <select name="onayli" id="onayli" class="form-control">
                      <option value="">Seçim Yapınız</option>
                      <option value="1">Evet</option>
                      <option value="0">Hayır</option>
                  </select>
                </div> --}}

                <div class="form-group col-md-3">
                  <button id="btnKaydet" type="submit" class="btn btn-primary btn-block">Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection

@section('css')
    <!-- JQuery Confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" />    
@endsection

@section('js')
  {{--  <script src="{{asset('theme/')}}/js/bootstrap-input-spinner.js"></script>
  <script>
      $("input[type='number']").inputSpinner()
  </script>  --}}
  <script src="{{asset('theme/')}}/js/kayit.js"></script>
  <!-- JQuery Confirm -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
@endsection