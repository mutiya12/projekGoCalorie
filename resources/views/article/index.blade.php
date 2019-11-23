@extends('layouts.app')

@section('title')
Artikel dan Tips
@stop

@section('styles')

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
<br>
<a href="/buat-artikel-tips" style="display: {{Auth::user()->role == "admin" ? "block" : "none"}}" class="btn btn-dark mb-2 offset-10">Buat Artikel</a>
@foreach($artikel as $a)
<div class="card mb-2">
	<div class="card-body">
    <h4 class="mb-0"><a href="/artikel-dan-tips/{{$a->artikelid}}" class="text-dark"><strong>{{$a->judul}}</strong></a></h4> 
    <small id="emailHelp" class="form-text text-muted mb-4">{{$a->updated_at}}</small>
	
    {!! $a->isi !!}
    <a href="/artikel-dan-tips/{{$a->artikelid}}" class="btn btn-light text-primary">Lihat Artikel / Tips</a>
    <a href="/edit-artikel-dan-tips/{{$a->artikelid}}" style="display: {{Auth::user()->role == "admin" ? "block" : "none"}}" class="btn btn-light text-primary float-right">Edit</a>

    <a href="/delete/{{$a->artikelid}}" style="display: {{Auth::user()->role == "admin" ? "block" : "none"}}" class="btn btn-light text-primary float-right mr-3">Delete</a>
  </div>
</div>
@endforeach


@stop