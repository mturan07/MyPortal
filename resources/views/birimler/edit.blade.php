@extends('layouts.master')
@section('title', 'Birim Düzenle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Birim Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('birimler.update', $birim->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                <div class="form-group col-md-6">
                  <label for="birimadi">Birim Adı</label>
                  <input type="text" class="form-control" name="birimadi" id="birimadi" value="{{ $birim->birimadi }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Birim Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection