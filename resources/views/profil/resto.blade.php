@extends('layouts.app')

@section('title')
Edit Profil
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
            <div class="card-header">Edit Profil Saya</div>
            <form method="POST" action="/edit-profil-resto" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <input type="hidden" value="{{$resto->id}}" name="idnya">
                    <input type="hidden" value="{{$resto->user->id}}" name="idUser">
                    
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Lengkap</label>
                        <input id="" type="text" class="form-control" name="name" required value="{{$resto->name}}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Email Restoran</label>
                        <input id="" type="email" class="form-control" name="email" required value="{{$resto->user->email}}">
                    </div>
                    <hr>
                    <h4 class="text-center">Ubah Password</h4>
                    <div class="form-group">
                        <label for="name" class="control-label">Password</label>
                        <input id="" type="password" class="form-control" name="p1">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Ulangi Password</label>
                        <input id="" type="password" class="form-control" name="p2">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Edit Menu') }}" class="btn btn-primary">
                    <a href="/menu-makanan" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
                </div>
            </form>
        </div>
    </div>

@stop