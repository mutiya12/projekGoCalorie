@extends('layouts.app')

@section('title', __('outlet.list'))



@section('content')



<div style="display: {{Auth::user()->role == "admin" ? "block" : "none"}};">
<div class="mb-3">
    
    <h1 class="page-title">{{ __('Restoran yang Terverifikasi') }} <small>{{ __('app.total') }} : {{ $outlets->total() }} {{ __('outlet.outlet') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('outlet.search') }}</label>
                        <input placeholder="{{ __('outlet.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('outlet.search') }}" class="btn btn-secondary">
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Restoran</th>
                        <th>Alamat Restoran</th>
                        
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlets as $key => $outlet)
                    <tr>
                        <td class="text-center">{{ $outlets->firstItem() + $key }}</td>
                        <td>{!! $outlet->name_link !!}</td>
                        <td>{{ $outlet->address }}</td>
                    
                        <td class="text-center" >
                            <a href="{{ route('outlets.show', $outlet) }}" id="show-outlet-{{ $outlet->id }}">Detail Warung</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $outlets->appends(Request::except('page'))->render() }}</div>
        </div>



<br>
<br>
<br>
<br>






        <!-- NV -->
<h1 class="page-title">{{ __('Restoran Belum Terverifikasi') }} <small>{{ __('app.total') }} : {{ $outlets_nv->total() }} {{ __('outlet.outlet') }}</small></h1>
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('outlet.search') }}</label>
                        <input placeholder="{{ __('outlet.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('outlet.search') }}" class="btn btn-secondary">
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Restoran</th>
                        <th>Alamat Restoran</th>
                        
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlets_nv as $key_nv => $outlet_nv)
                    <tr>
                        <td class="text-center">{{ $outlets_nv->firstItem() + $key_nv }}</td>
                        <td>{!! $outlet_nv->name_link !!}</td>
                        <td>{{ $outlet_nv->address }}</td>
                    
                        <td class="text-center" >
                            <a href="{{ route('outlets.show', $outlet_nv) }}" id="show-outlet-{{ $outlet_nv->id }}">Detail Warung</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $outlets->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>

</div>


@endsection
