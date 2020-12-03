@extends('layouts.master')
@section('title', 'Kullanıcı Düzenle')
@section('firmaadi', 'My Portal')
@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Kullanıcı Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('kullanicilar.update', $kullanici->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                <div class="form-group col-md-6">
                  <label for="name">Ad Soyad</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $kullanici->name }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="email">E-posta</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ $kullanici->email }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="password">Parola</label>
                  <input type="password" class="form-control" name="password" id="password" value="{{ $kullanici->password }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="yetki">Yetki</label>
                  <select name="yetki" id="yetki" class="form-control">
                    <option value="">Seçim Yapınız</option>
                        <option @if($kullanici->yetki == 'Kullanıcı') selected @endif value="Kullanıcı">Kullanıcı</option>
                        <option @if($kullanici->yetki == 'Yönetici') selected @endif value="Yönetici">Yönetici</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection