@extends('layouts.master')
@section('title', 'Kullanıcı Ekle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Kullanıcı Ekle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('kullanicilar.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-6">
                  <label for="name">Ad Soyad</label>
                  <input type="text" class="form-control" name="name" id="name" autofocus required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="name">E-posta</label>
                  <input type="email" class="form-control" name="email" id="email" autofocus required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="name">Parola</label>
                  <input type="password" class="form-control" name="password" id="password" autofocus required>                  
                </div>

                <div class="form-group col-md-6">
                  <label for="yetki">Yetki</label>
                  <select name="yetki" id="yetki" class="form-control">
                    <option value="">Seçim Yapınız</option>
                        <option value="Kullanıcı">Kullanıcı</option>
                        <option value="Yönetici">Yönetici</option>
                  </select>
                </div>  

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
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