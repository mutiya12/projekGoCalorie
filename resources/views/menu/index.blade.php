@extends('layouts.app')

@section('title')
Menu makanan
@stop


@section('content')

<div class="col-md-12" style="display: {{$status=="belum" ? "block" : "none"}}">
	<div class="alert alert-danger">Restoran Anda Belum <strong>Terverifikasi</strong></div>
</div>
<div class="row">
@foreach($menu as $m)
<div class="card border-dark mb-4 mr-3" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$m->getAvatar()}}" alt="Card image cap" height="200px">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$m->nama_makanan}}</h5>
    <p class="float-right">{{$m->harga_makanan}}</p><br>
    <br>
    <p class="text-center">Komposii</p>
    <p class=""><strong>Kalori : {{$m->getKalori()}}</strong></p>
    <p class=""><strong>Protein : {{$m->getProtein()}}</strong></p>
    <p class=""><strong>Lemak : {{$m->getLemak()}}</strong></p>
    <p class=""><strong>Karbohidrat : {{$m->getKarbohidrat()}}</strong></p>

    <a href="/outlets/{{$m->id}}/edit-menu" class="btn btn-dark float-right">Edit Menu</a>
  </div>
</div>
@endforeach

</div>
@stop