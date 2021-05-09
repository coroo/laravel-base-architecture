@extends('layout.simple')
@section('content')

@include('layout.header', [ 'header-type' => 'light' ])
<div class="main-container">
    <section class="imagebg height-100 text-center" data-gradient-bg="#5f2c82,#49a09d,#F3A183,#5f2c82">
        <div class="background-image-holder">
            <img alt="background" src="{{ asset('img/bg-maintenance.jpg') }}" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-9">
                    <span class="h1 countdown">Pembaharuan {{ __(env('APP_VERSION')) ?? '' }}</span>
                    <br/>
                    <div class="typed-headline">
                        <span class="h4 inline-block">Kami punya sesuatu yang</span>
                        <span class="h4 inline-block typed-text typed-text--cursor color--white" style="margin-right: -10px;font-weight: 800;" data-typed-strings="baru,lebih baik,istimewa,lebih membantu"></span>
                        <span class="h4 inline-block" style="margin-left:0">untuk Anda</span>
                    </div>
                    <p class="lead" style="margin-top:-20px">
                        Mohon maaf dan silahkan periksa kembali kami dalam beberapa jam kedepan.
                    </p>
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
