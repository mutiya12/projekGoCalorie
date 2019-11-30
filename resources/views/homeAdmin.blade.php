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
            <p style="font-family: Angeline Vintage ; font-size: 22px; color:#007944;">WELCOME!! “Mereka yang berpikir mereka tidak punya waktu 
            untuk makan sehat, cepat atau lambat harus mencari waktu untuk sakit.” – Edward Stanley 
         </p>
            

        </div>

    </div>
</div>
@endsection
