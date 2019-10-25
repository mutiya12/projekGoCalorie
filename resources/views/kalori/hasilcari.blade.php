@extends('layouts.app')

@section('title')
Hasil Pencarian
@stop


@section('content')

<div class="alert alert-info" role="alert">
  
    <p><strong>Kebutuhan kalori : {{round($BMR)}}</strong></p>
    <div class="row">
      <div class="col-md-4">Pagi : <strong>{{round($BMR_PAGI_kurang)}} - {{round($BMR_PAGI_lebih)}}</strong> kal </div>
      <div class="col-md-4">Siang :<strong>{{round($BMR_SIANG_kurang)}} - {{round($BMR_SIANG_lebih)}}</strong> kal </div>
      <div class="col-md-4">Malam : <strong>{{round($BMR_MALAM_kurang)}}  - {{round($BMR_MALAM_lebih)}}</strong>kal</div>
    </div>
    
    
    
    
    
  
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Makanan Pagi</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Makanan Siang</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Makanan Malam</a>
  </li>
</ul>
<br>
<div class="tab-content" id="myTabContent">
    <!-- PAGI -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	<div class="row">
@foreach($menuPAGI as $mp)
<div class="card border-dark mb-4 mr-3" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$mp->getAvatar()}}" alt="Card image cap" height="200px">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mp->nama_makanan}}</h5>
    <p class="float-right">{{$mp->harga_makanan}}</p><br>
    <br>
    <p class="text-center">Komposii</p>
    <p class=""><strong>Kalori : {{$mp->getKalori()}}</strong></p>
    <p class=""><strong>Protein : {{$mp->getProtein()}}</strong></p>
    <p class=""><strong>Lemak : {{$mp->getLemak()}}</strong></p>
    <p class=""><strong>Karbohidrat : {{$mp->getKarbohidrat()}}</strong></p>

    <a href="/outlets/{{$mp->id}}/edit-menu" class="btn btn-dark float-right" 
    	style="display: {{Auth::user()->role=="customer" ? "none" : "blck"}}">Edit Menu</a>
    <a href="/outlets/{{$mp->restoran_id}}" class="btn btn-success float-left">Lihat Lokasi</a>
  </div>
</div>
@endforeach
</div>
  </div>
  <!-- SIANG -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="row">
@foreach($menuSIANG as $ms)
<div class="card border-dark mb-4 mr-3" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$ms->getAvatar()}}" alt="Card image cap" height="200px">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$ms->nama_makanan}}</h5>
    <p class="float-right">{{$ms->harga_makanan}}</p><br>
    <br>
    <p class="text-center">Komposii</p>
    <p class=""><strong>Kalori : {{$ms->getKalori()}}</strong></p>
    <p class=""><strong>Protein : {{$ms->getProtein()}}</strong></p>
    <p class=""><strong>Lemak : {{$ms->getLemak()}}</strong></p>
    <p class=""><strong>Karbohidrat : {{$ms->getKarbohidrat()}}</strong></p>

    <a href="/outlets/{{$ms->id}}/edit-menu" class="btn btn-dark float-right" 
      style="display: {{Auth::user()->role=="customer" ? "none" : "blck"}}">Edit Menu</a>
    <a href="/outlets/{{$ms->restoran_id}}" class="btn btn-success float-left">Lihat Lokasi</a>
  </div>
</div>
@endforeach
</div>    


  </div>


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    
  <div class="row">
@foreach($menuMALAM as $mm)
<div class="card border-dark mb-4 mr-3" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$mm->getAvatar()}}" alt="Card image cap" height="200px">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mm->nama_makanan}}</h5>
    <p class="float-right">{{$mm->harga_makanan}}</p><br>
    <br>
    <p class="text-center">Komposii</p>
    <p class=""><strong>Kalori : {{$mm->getKalori()}}</strong></p>
    <p class=""><strong>Protein : {{$mm->getProtein()}}</strong></p>
    <p class=""><strong>Lemak : {{$mm->getLemak()}}</strong></p>
    <p class=""><strong>Karbohidrat : {{$mm->getKarbohidrat()}}</strong></p>

    <a href="/outlets/{{$mm->id}}/edit-menu" class="btn btn-dark float-right" 
      style="display: {{Auth::user()->role=="customer" ? "none" : "blck"}}">Edit Menu</a>
    <a href="/outlets/{{$mm->restoran_id}}" class="btn btn-success float-left">Lihat Lokasi</a>
  </div>
</div>
@endforeach
</div> 

  </div>

</div>




@stop