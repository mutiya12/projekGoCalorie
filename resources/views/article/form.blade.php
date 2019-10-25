@extends('layouts.app')

@section('title')
Buat Artikel dan Tips
@stop

@section('styles')
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@stop

@section('content')
<form action="{{url('/create-article-now')}}" method="POST">
{{ csrf_field()}}
<div class="card">
	<div class="card-body">
	<div class="form-group">
	<label for="name" class="control-label margin-left">Judul Artikel / Tips</label>
    <input type="text" class="form-control input-sm col-md-4" name="judul" required>
	</div>
	<br>
    <label for="name" class="control-label margin-left">Isi Artikel</label>
    <textarea class="ckeditor" id="ckedtor" name="isi"></textarea>
    <a href="/artikel-dan-tips" class="mt-2 btn btn-dark float-left">Kembali</a>
    <button class="mt-2 btn btn-success float-right">Buat Artikel / Tips</button>
  </div>
</div>
</form>
@stop