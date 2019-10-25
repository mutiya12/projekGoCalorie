@extends('layouts.app')

@section('title')

@stop

@section('styles')

@stop

@section('content')
<div class="card">
	<div class="card-body">
	<h4 class="mb-0"><strong>{{$artikel->judul}}</strong></h4> 
    <small id="emailHelp" class="form-text text-muted mb-4">{{$artikel->updated_at}}</small>
	{!! $artikel->isi !!}
    <a href="/artikel-dan-tips" class="mt-2 btn btn-dark float-left">Kembali</a>
    <a style="display: {{Auth::user()->role == "admin" ? "block" : "none"}}" href="/edit-artikel-dan-tips/{{$artikel->artikelid}}" class="mt-2 btn btn-success float-right">Ubah Artikel / Tips</a>
  </div>
</div>
@stop