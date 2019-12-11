@extends('layouts.app')

@section('title')
Buat Menu
@stop


@section('content')
@if(session('sukses'))
<div class="alert alert-success">
    {{session('sukses')}}
</div>
@endif
@if(session('gagal'))
<div class="alert alert-danger">
    {{session('gagal')}}
</div>
@endif


 <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">Form Pengisian Data Menu</div>
            <form method="POST" action="/buat-menu-yang-baru" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Menu</label>
                        <input type="text" class="form-control" name="nama" required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="harga" class="control-label">Harga Menu</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="form-group">
					    <label>Gambar Menu</label>
					    <input type="file" class="form-control" name="gambar" required>
				    </div>
                    
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Buat Menu') }}" class="btn btn-primary">
                    <a href="{{ route('outlets.index') }}" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
                </div>
            </form>
        </div>
    </div>

@stop