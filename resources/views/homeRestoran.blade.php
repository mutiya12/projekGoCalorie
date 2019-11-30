@extends('layouts.app')

@section('content')


    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
            
            <p style="font-family: Angeline Vintage; font-size: 65px; color:#357376 ;">Hello, {{Auth::user()->name}}</p>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
        </div>
    </div>
    <div class="row justify-content-left">
        <div class="col-md-6">
            <p style="font-family: Angeline Vintage ; font-size: 23px; color:#007944;">WELCOME!! “Anda tidak 
            harus memasak mahakarya mewah atau rumit – hanya makanan yang baik 
            dari bahan-bahan segar.” – Julia Child</p>
            

        </div>

    </div>
    </div>
</div>
@endsection
