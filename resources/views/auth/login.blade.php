<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ env('APP_NAME'), 'Application Name' }}</title>
        <link rel="icon" 
            type="image/png" 
            href="/img/logo_aw.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class=" ">
        <a id="start"></a>
        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="#">
                                <img class="logo logo-dark" alt="logo" src="img/logo_small.png" />
                                <img class="logo logo-light" alt="logo" src="img/logo_small.png" />
                            </a>
                        </div>
                        @if (strpos(env('APP_NAME'), 'Staging') !== false) {
                        <div class="col-lg-12">
                            <div style="float:right">
                            <a class="btn btn--primary bg--pinterest" href="#">
                                <span class="btn__text">DEVELOPMENT MODE</span>
                            </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs bar--transparent bar--absolute">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="#">
                                    <img class="logo logo-dark" alt="logo" src="img/logo_small.png" />
                                    <img class="logo logo-light" alt="logo" src="img/logo_small.png" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        @if (strpos(env('APP_NAME'), 'Staging') !== false) {
                        <div class="col-lg-12">
                            <div style="float:right">
                            <a class="btn btn--primary bg--pinterest" href="#">
                                <span class="btn__text">DEVELOPMENT MODE</span>
                            </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>
        <div class="main-container">
            <section class="height-100 imagebg text-center" data-overlay="0">
                <div class="background-image-holder">
                    <img alt="background" src="img/background-white.jpg" style="opacity:0.6" />
            </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <img alt="Image" class="" src="img/logo_aw.png" style="max-height:120px">
                            <p class="lead color--dark" style="color:black !important">
                                {{ env('APP_NAME'), 'Application Name' }}
                            </p>
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-icon">
                                            <i class="material-icons">person</i>
                                            <input type="text" name="username" id="username" placeholder="Username">
                                            <span class="type--fine-print color--error anyerrorin" id="anyerrorin_username"></span> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-icon">
                                            <i class="material-icons">lock</i>
                                            <input type="password" name="password" id="password" placeholder="Password">
                                            <span class="type--fine-print color--error anyerrorin" id="anyerrorin_password"></span> 
                                        </div>
                                    </div>
                                    <div class="col-12 text-left">
                                        <div class="input-checkbox"> 
                                            <input type="checkbox" name="rememberme" id="rememberme"> <label></label> </div> 
                                            <span style="color:black">Ingat saya</span> 
                                        </div>
                                    <div class="col-md-12">
                                        <span class="type--fine-print color--error anyerrorin" style="color:red" id="anyerrorin_all"></span> 
                                    </div>
                                    <div class="col-md-12">
                                    <!-- <span class="icon has-text-danger">
                            <i class="fas fa-ban"></i>
                            </span> -->
                                        <a onClick="login()" id="loginButton" style="width:100%" class="btn bg--dark type--uppercase">Masuk</a>
                                    </div>
                                </div>
                                <!--end of row-->
                            </form>
                            <span class="type--fine-print block color--dark" style="color:black !important">© {{ date('Y') }} {{ env('APP_NAME'), 'Application Name' }}
                            </span>
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
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/flickity.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/scripts.js"></script>

        <script type="text/javascript">
        function login() {
            var data = [];
            //section change password
            data['username'] = $("input[name=username").val();
            data['password'] = $("input[name=password").val();
            $(".anyerrorin").html('');
            $("#loginButton").html('<i class="fas fa-circle-notch fa-spin"></i> Memproses ...');

            $.ajax({
                type:'POST',
                url:'/login-request',
                data:{
                    "_token": "{{ csrf_token() }}",
                    ...data
                },
                success:function(data){
                    if(data.msg == 'login_success'){
                        window.location.href = "/" + data.url;
                    } else if(data.msg.error==='invalid_grant'){
                        $("#anyerrorin_all").html('{{ __("auth.invalid_grant") }}');
                    } else {
                        $("#anyerrorin_all").html(data.msg.error_description);
                    }
                    $("#loginButton").html('Masuk');
                }, 
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    $("#anyerrorin_all").html('{{ __("auth.exceed_limit") }}');
                    $("#loginButton").html('Masuk');
                },
                statusCode: {
                    429: function() {
                        $("#anyerrorin_all").html('{{ __("auth.exceed_limit") }}');
                        $("#loginButton").html('Masuk');
                    }
                }
            });
        };
        </script>
    </body>
</html>