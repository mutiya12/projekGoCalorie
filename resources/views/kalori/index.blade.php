@extends('layouts.app')

@section('title')
Perhitungan
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
            <div class="card-header">Form Perhitungan Kalori</div>
            <form method="POST" action="/cari-rekom" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Berat Badan</label>
                        <input id="" type="number" class="form-control" name="BB" max="200" required min="1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Tinggi Badan</label>
                        <input id="" type="number" class="form-control" name="TB" max="250" required min="1">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Umur</label>
                        <input id="" type="number" class="form-control" name="UMUR" max="200" required min="1">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Jenis Kelamin</label>
                        <select class="custom-select" id="inputGroupSelect01" name="jk">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Jenis Aktivitas</label>
                        <select class="custom-select" id="inputGroupSelect01" name="aktivitas">
                            <option selected disabled>Pilih Jenis Aktivitas</option>
                            <option value="a">Aktivitas Ringan</option>
                            <option value="b">Aktivitas Sedang</option>
                            <option value="c">Aktivitas Berat</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Hitung') }}" class="btn btn-primary">
                    
                    <!-- <a href="/ahli-gizi" class="btn btn-danger float-right">{{ __('Batalkan') }}</a> -->
                </div>
            </form>
        </div>
    </div>


@stop