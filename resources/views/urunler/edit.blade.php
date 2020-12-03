@extends('layouts.master')
@section('title', 'Ürün Düzenle')
@section('firmaadi', 'My Portal')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Ürün Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('urunler.update', $urun->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                <div class="form-group col-md-6">
                  <label for="urunadi">Ürün Adı</label>
                  <input type="text" class="form-control" name="urunadi" id="urunadi" value="{{ $urun->urunadi }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="grup_id">Grup Adı</label>
                  <select name="grup_id" id="grup_id" class="form-control">
                    <option value="">Seçim Yapınız</option>
                    @foreach ($gruplar as $grup)
                        <option @if($urun->grup_id == $grup->id) selected @endif value="{{$grup->id}}">{{$grup->grupadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="birim_id">Birim Adı</label>
                  <select name="birim_id" id="birim_id" class="form-control">
                    <option value="">Seçim Yapınız</option>
                    @foreach ($birimler as $birim)
                        <option @if($urun->birim_id == $birim->id) selected @endif value="{{$birim->id}}">{{$birim->birimadi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="birimfiyat">Birim Fiyat</label>
                  <input type="text" class="form-control" name="birimfiyat" id="birimfiyat" value="{{ $urun->birimfiyat }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="cinsi">Cinsi</label>
                  <input type="text" class="form-control" name="cinsi" id="cinsi" value="{{ $urun->cinsi }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="barkod">Barkod</label>
                  <input type="text" class="form-control" name="barkod" id="barkod" value="{{ $urun->barkod }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="sinif">Sınıf</label>
                  <input type="text" class="form-control" name="sinif" id="sinif" value="{{ $urun->sinif }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Ürünü Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection