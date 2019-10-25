@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')

@if(session('sukses'))
    <div class="alert alert-success" >
      {{session('sukses')}}
    </div>
    @endif
    @if(session('gagal'))
    <div class="alert alert-success" >
      {{session('gagal')}}
    </div>
    @endif
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">
                {{ __('Informasi Restoran') }}    
                </h3>
                <a style="display: {{Auth::user()->role == "ahli gizi" ? "block" : "none"}}" href="/outlets/{{$outlet->id}}/menu" class="btn btn-link float-right">Tinjau Menu</a> 

                @can('update', $outlet)
                    <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-warning float-right" style="display: {{Auth::user()->id == $outlet->user_id ? "block" : "none"}}">{{ __('outlet.edit') }}</a>
                @endcan
          
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr><td>Nama Restoran</td><td>{{ $outlet->name }}</td></tr>
                        <tr><td>Alamat tertulis</td><td>{{ $outlet->getAddresses() }}</td></tr>
                        <tr><td>{{ __('outlet.latitude') }}</td><td>{{ $outlet->latitude_nv }}</td></tr>
                        <tr><td>{{ __('outlet.longitude') }}</td><td>{{ $outlet->longitude_nv }}</td></tr>
                        <tr class="{{$outlet->isverify=="no" ? "table-danger" : ""}}"><td>{{ __('statuss') }}</td><td><strong>{{ $outlet->getStatuses() }}</strong></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                
                @if(auth()->check())
                    <a href="{{Auth::user()->role == "admin" ? "/list-warung" : ""}} {{Auth::user()->role == "restoran" ? "/outlets" : ""}}" class="btn btn-link float-left">{{ __('Kembali') }}</a>
                       

                     

                    <form action="/verify-now" method="POST">
                        {{csrf_field()}}
                        <input type="submit" value="Verifikasi Sekarang" class="btn btn-primary float float-right" style="display: {{Auth::user()->role == 'admin' && $outlet->isverify == 'no' ? "block" : "none"}}">
                        <input type="hidden" value="{{ $outlet->id }}" name="thisID">
                    </form>
                @else
                    <a href="{{ route('outlet_map.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ trans('outlet.location') }}</div>
            @if ($outlet->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('outlet.no_coordinate') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map)
        .bindPopup('{!! $outlet->map_popup_content !!}');
</script>
@endpush
