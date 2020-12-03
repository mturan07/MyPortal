@extends('layouts.master')
@section('title', 'Grup Düzenle')
@section('firmaadi', 'My Portal')
@section('content')

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Grup Düzenle</strong></h6>
            </div>
            <div class="card-body">

                <form action="{{route('gruplar.update', $grup->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf

                <div class="form-group col-md-6">
                  <label for="grupadi">Grup Adı</label>
                  <input type="text" class="form-control" name="grupadi" id="grupadi" value="{{ $grup->grupadi }}" required>                  
                </div>

                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary btn-block">Grup Kaydet</button>
                </div>
              </form>

            </div>
          </div>
    
@endsection