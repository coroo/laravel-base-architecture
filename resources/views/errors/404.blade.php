@extends('layout.simple')
@section('content')

@include('layout.header', [ 'header-type' => 'light' ])
<div class="main-container">
    <section class="imagebg height-100 text-center" data-gradient-bg="#5f2c82,#49a09d,#F3A183,#5f2c82">
        <div class="background-image-holder">
            <img alt="background" src="{{ asset('img/background-white.jpg') }}" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-9">
                    <span class="h1 countdown">404</span>
                    <br/>
                    <p class="lead" style="margin-top:-20px">
                        Mohon maaf kami tidak menemukan halaman yang Anda tuju.
                    </p>
                    <a href="/" class="btn btn--dark">Kembali ke Halaman Awal</a>
                    </div>
                    <!--end modal instance-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
</div>
<!--<div class="loader"></div>-->
<a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
    <i class="stack-interface stack-up-open-big"></i>
</a>
@endsection
