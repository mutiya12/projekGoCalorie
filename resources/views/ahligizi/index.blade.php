@extends('layouts.app')

@section('title')

@stop

@section('content')
<br>
<a href="/buat-ahli-gizi" style="display: {{Auth::user()->role == "admin" ? "block" : "none"}}" class="btn btn-dark mb-2 offset-10">Buat </a>
@foreach($ahligizi as $a)
<div class="card mb-2">
	<div class="card-body">
    <h4 class="mb-0"><a href="" class="text-dark"><strong>{{$a->nama_lengkap}}</strong></a></h4> 
    <small id="emailHelp" class="form-text text-muted mb-4">Lulusan {{$a->lulusan}}</small>
	
	
  </div>
</div>
@endforeach
@stop