@extends('layouts.app')

@section('title')
Edit Menu
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
            <div class="card-header">Edit Data Menu</div>
            <form method="POST" action="/edit-menu-yang-lama" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <input type="hidden" value="{{$menu->id}}" name="idnya">
                    
                    <img class="card-img-top" src="{{$menu->getAvatar()}}" alt="Card image cap" height="200px">
                    <div class="form-group">
					    <label>Ubah Gambar Menu</label>
					    <input type="file" class="form-control" name="gambar">
				    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Menu</label>
                        <input id="" type="text" class="form-control" name="nama" required value="{{$menu->nama_makanan}}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Harga Menu</label>
                        <input id="" type="number" class="form-control" name="harga" required value="{{$menu->harga_makanan}}">
                    </div>
                    
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Edit Menu') }}" class="btn btn-primary">
                    <a href="/menu-makanan" class="btn btn-danger float-right">{{ __('Kembali') }}</a>
                </div>
            </form>
        </div>
    </div>

@stop