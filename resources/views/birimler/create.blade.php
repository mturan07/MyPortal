@extends('layouts.master')
@section('title', 'Birim Ekle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Ürün Ekle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('birimler.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-6">
                  <label for="birimadi">Birim Adı</label>
                  <input type="text" class="form-control" name="birimadi" id="birimadi" autofocus required>                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Birimi Kaydet</button>
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