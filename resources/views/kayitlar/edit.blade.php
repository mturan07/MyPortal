@extends('layouts.master')
@section('title', 'Kayıt Düzenle')
@section('firmaadi', 'My Portal')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Kayıt Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('kayitlar.update', $kayit->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                  <div class="form-group col-md-3">
                    <label for="urun_id">Ürün Adı</label>
                    <select name="urun_id" id="urun_id" class="form-control">
                      <option value="">Seçim Yapınız</option>
                      @foreach ($urunler as $urun)
                          <option @if($kayit->urun_id == $urun->id) selected @endif value="{{$urun->id}}">{{$urun->urunadi}}</option>
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group col-md-3">
                    <label for="birim_id">Birim Adı</label>
                    <select name="birim_id" id="birim_id" class="form-control">
                      <option value="">Seçim Yapınız</option>
                      @foreach ($birimler as $birim)
                          <option @if($kayit->birim_id == $birim->id) selected @endif value="{{$birim->id}}">{{$birim->birimadi}}</option>
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group col-md-3">
                    <label for="birimfiyat">Birim Fiyat</label>
                    <input type="number" data-decimals="2" min="0" max="999" step="0.05" class="form-control" name="birimfiyat" id="birimfiyat" value="{{ $kayit->birimfiyat }}" required>                  
                  </div>
  
                  <div class="form-group col-md-3">
                    <label for="netagirlik">Net Ağırlık</label>
                    <input type="number" data-decimals="2" min="0" max="99999" step="0.5" class="form-control" name="netagirlik" id="netagirlik" value="{{ $kayit->netagirlik }}" required>                  
                  </div>
  
                  <div class="form-group col-md-3">
                    <label for="tutar">Tutar</label>
                    <input type="number" data-decimals="2" min="0" max="9999999" step="0.5" class="form-control" name="tutar" id="tutar" value="{{ $kayit->tutar }}" required>                  
                  </div>
  
                  {{-- <div class="form-group col-md-3">
                    <label for="onayli">Onaylı</label>
                    <select name="onayli" id="onayli" class="form-control">
                        <option value="">Seçim Yapınız</option>
                        <option @if($kayit->onayli == 1) selected @endif value="1">Evet</option>
                        <option @if($kayit->onayli == 0) selected @endif value="0">Hayır</option>
                    </select>
                  </div> --}}

                <div class="form-group col-md-3">
                  <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
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