@extends('layouts.app')

@section('title')
Buat Menu
@stop


@section('content')

<table class="table table-hover table-stripped text-center">
	<thead class="thead-dark">
		<th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Tinjau</th>
	</thead>
	<tbody>
		@php
		$i = 1;
		@endphp
		@foreach($lokasiTinjau as $lt)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$lt->name}}</td>
			<td>{{$lt->address}}</td>
			<td>
				<a href="/outlets/{{$lt->id}}" class="btn btn-link btn-sm">Tinjau</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop