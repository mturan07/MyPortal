@extends('layouts.master')
@section('title', 'Firma Düzenle')
@section('firmaadi', 'My Portal')
@section('content')
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Firma Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('firma.update', $firma->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                <div class="form-group col-md-6">
                  <label for="firma_unvan">Firma Ünvan</label>
                  <input type="text" class="form-control" name="firma_unvan" id="firma_unvan" value="{{ $firma->firma_unvan }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="firma_adres">Firma Adres</label>
                  <input type="text" class="form-control" name="firma_adres" id="firma_adres" value="{{ $firma->firma_adres }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="firma_telefon">Firma Telefon</label>
                  <input type="text" class="form-control" name="firma_telefon" id="firma_telefon" value="{{ $firma->firma_telefon }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="firma_faks">Firma Faks</label>
                  <input type="text" class="form-control" name="firma_faks" id="firma_faks" value="{{ $firma->firma_faks }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="firma_eposta">Firma Eposta</label>
                  <input type="text" class="form-control" name="firma_eposta" id="firma_eposta" value="{{ $firma->firma_eposta }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection