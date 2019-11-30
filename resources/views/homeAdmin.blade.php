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
            <p style="font-family: Angeline Vintage ; font-size: 22px; color:#007944;">WELCOME!! Apa aktivitas kamu hari ini? perhatikan pola makan dengan makan makanan seimbang. Temukan rekomendasi makanan untuk makananmu hari ini.
                 Dapatkan informasi mengenai makanan sehat juga di GoCalorie. </p>
            

        </div>

    </div>
</div>
@endsection
