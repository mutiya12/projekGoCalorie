@extends('layouts.app')

@section('title')
Buat Ahli Gizi
@stop


@section('content')
<div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">Form Pengisian Data Menu</div>
            <form method="POST" action="/buat-ahli-gizi-baru" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Lengkap</label>
                        <input id="" type="text" class="form-control" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Email</label>
                        <input id="" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Lulusan</label>
                        <input id="" type="text" class="form-control" name="lulusan" required>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Buat Menu') }}" class="btn btn-primary">
                    <a href="/ahli-gizi" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
                </div>
            </form>
        </div>
    </div>


@stop