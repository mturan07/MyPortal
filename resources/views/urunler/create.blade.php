@extends('layouts.master')
@section('title', 'Ürün Ekle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Ürün Ekle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('urunler.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-6">
                  <label for="urunadi">Ürün Adı</label>
                  <input type="text" class="form-control" name="urunadi" id="urunadi" autofocus required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="grup_id">Grup Adı</label>
                  <select name="grup_id" id="grup_id" class="form-control">
                    <option value="">Seçim Yapınız</option>
                    @foreach ($gruplar as $grup)
                        <option value="{{$grup->id}}">{{$grup->grupadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="birim_id">Birim Adı</label>
                  <select name="birim_id" id="birim_id" class="form-control">
                    <option value="">Seçim Yapınız</option>
                    @foreach ($birimler as $birim)
                        <option value="{{$birim->id}}">{{$birim->birimadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="birimfiyat">Birim Fiyat</label>
                  <input type="number" data-decimals="2" min="0" max="999" step="0.05" class="form-control" name="birimfiyat" id="birimfiyat" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="cinsi">Cinsi</label>
                  <input type="text" class="form-control" name="cinsi" id="cinsi">                  
                </div>

                <div class="form-group col-md-6">
                  <label for="barkod">Barkod</label>
                  <input type="text" class="form-control" name="barkod" id="barkod">                  
                </div>

                <div class="form-group col-md-6">
                  <label for="sinif">Sınıf</label>
                  <input type="text" class="form-control" name="sinif" id="sinif">                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Ürünü Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection

@section('js')
  <script src="{{asset('theme/')}}/js/bootstrap-input-spinner.js"></script>
  <script>
      $("input[type='number']").inputSpinner()
  </script>
@endsection