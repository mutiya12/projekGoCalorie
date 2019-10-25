@extends('layouts.app')

@section('title')
Edit Artikel & Tips
@stop

@section('styles')
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@stop

@section('content')
<form action="{{url('/update-article-now')}}" method="POST">
{{ csrf_field()}}
<div class="card">
	<div class="card-body">
	<input type="hidden" value="{{$artikel->artikelid}}" name="idartikel">
    <textarea class="ckeditor" id="ckedtor" name="artikel">
    	{!! $artikel->isi !!}
    </textarea>
    <a href="/artikel-dan-tips" class="mt-2 btn btn-dark float-left">Kembali</a>
    <button class="mt-2 btn btn-success float-right">Ubah Artikel / Tips</button>
  </div>
</div>
</form>
@stop