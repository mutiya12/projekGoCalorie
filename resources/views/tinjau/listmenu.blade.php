@extends('layouts.app')

@section('title')
Tinjau menu
@stop


@section('content')
    
<div class="row">
@foreach($menu as $m)
<div class="card border-dark mb-4 mr-3" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$m->getAvatar()}}" alt="Card image cap" height="200px">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$m->nama_makanan}}</h5>
    <p class="float-right">Rp {{$m->harga_makanan}}</p><br>
    <br>
    <p class="text-center">Komposisi</p>
    <p class=""><strong>Kalori : {{$m->getKalori()}}</strong></p>
    <p class=""><strong>Protein : {{$m->getProtein()}}</strong></p>
    <p class=""><strong>Lemak : {{$m->getLemak()}}</strong></p>
    <p class=""><strong>Karbohidrat : {{$m->getKarbohidrat()}}</strong></p>

    <a href="/input-komposisi/{{$m->id}}" class="btn btn-dark btn-sm float-right"
      style="display: {{empty($m->kalori) ? "block" : "none"}}">Input Komposisi</a>
    <a href="/input-komposisi/{{$m->id}}" class="btn btn-success btn-sm float-right"
      style="display: {{empty($m->kalori) ? "none" : "block"}}">Edit Komposisi</a>      
  </div>
</div>
@endforeach

</div>
@stop