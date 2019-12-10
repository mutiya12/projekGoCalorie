@extends('layouts.app')

@section('title')
Input Komposisi
@stop


@section('content')
@if(session('sukses'))
    <div class="alert alert-success" >
      {{session('sukses')}}
    </div>
    @endif
    @if(session('gagal'))
    <div class="alert alert-danger" >
      {{session('gagal')}}
    </div>
    @endif
<div class="col-md-6 offset-3">
<div class="card">
    <div class="card-header">Form Pengisian Nutrisi Menu</div>
    <form method="POST" action="/store-kalori" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
        	<input type="hidden" value="{{$menu->id}}" name="idnya">
            <div class="form-group">
                <label for="name" class="control-label">Kalori</label>
                <input type="number" class="form-control" name="kalori" required value="{{$menu->kalori}}">
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Protein</label>
                <input type="number" class="form-control" name="protein" required value="{{$menu->protein}}">
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Lemak</label>
                <input type="number" class="form-control" name="lemak" required value="{{$menu->lemak}}">
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Karbohidrat</label>
                <input type="number" class="form-control" name="karbohidrat" required value="{{$menu->karbohidrat}}">
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="{{ __('Simpan') }}" class="btn btn-dark">
            <a href="/outlets/{{$menu->restoran_id}}/menu" class="btn btn-danger float-right">{{ __('Kembali') }}</a>
        </div>
    </form>
</div>
</div>

@stop