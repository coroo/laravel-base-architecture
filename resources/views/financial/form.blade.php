<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ env('APP_NAME'), 'Application Name' }} - Profile</title>
        <link rel="icon" 
            type="image/png" 
            href="/img/logo_aw.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/stack-interface.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">
        <style>
            .btn {
                width: 100%;
            }
        </style>
    </head>
    <body data-smooth-scroll-offset="77" style="background:url(img/background-white.jpg);background-repeat: no-repeat;background-attachment: fixed;background-position: center;-o-background-size:80% auto;-webkit-background-size:80% auto;-moz-background-size:80% auto;background-size:80% auto;">
        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="#">
                                <img class="logo logo-dark" alt="logo" src="img/logo_small.png">
                                <img class="logo logo-light" alt="logo" src="img/logo_small.png">
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="#">
                                    <img class="logo logo-dark" alt="logo" src="img/logo_small.png">
                                    <img class="logo logo-light" alt="logo" src="img/logo_small.png">
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-9 col-md-10 text-right text-left-xs text-left-sm">
                        </div>
                        <div class="col-lg-2 col-md-2 text-right text-left-xs text-left-sm">
                            <div class="bar__module">
                                <a class="btn btn--sm bg--dark type--uppercase" href="{{ route('logout') }}">
                                    <span class="btn__text">
                                        LOGOUT
                                    </span>
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>
        <div class="main-container">
            <!-- bg--secondary -->
            <section class="space--sm text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="boxed boxed--lg boxed--border">
                                <div class="text-block text-center">
                                    <img alt="avatar" src="
                                    {{ Auth::user()->getMedia('avatars')->last() ? Auth::user()->getMedia('avatars')->last()->getUrl() : 'img/avatar.png' }}
                                    " class="image--lg">
                                    <span class="h5">{{ $user['nama_aslu'] }}</span>
                                    <span class="btn btn--sm bg--dark">{{ $user['username'] }}</span><br/>
                                    <span>{{ __('general.'.$user['user_type']) }}</span>
                                </div>
                                <hr>
                                <div class="text-block">
                                    <ul class="menu-vertical">
                                        <li>
                                            <a href="/profile-form">
                                                <span class="">
                                                    Profil
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/finansial-setoran">
                                                <span class="">
                                                    Keuangan
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr/>
                                <div class="text-block">
                                    <ul class="menu-vertical">
                                        <li>
                                            <div class="modal-instance">
                                                <a class="modal-trigger" href="#">
                                                    <span class="">
                                                        Ubah Foto
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                                <div class="boxed boxed--border">
                                                                    <form class="text-left row mx-0" method="post" action="{{ route('avatar.store') }}" enctype="multipart/form-data" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                    @csrf
                                                                        <div class="col-md-6">
                                                                            <label>Unggah Foto Baru:</label>
                                                                            <input id="avatar" name="avatar" type="file" accept="image/*" onchange="loadFile(event)">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <img id="output"/>
                                                                            <button id="btn-upload-img" class="btn bg--dark type--uppercase" disabled>Unggah</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end of modal instance-->
                                        </li>
                                        <li>
                                            <div class="modal-instance">
                                                <a class="modal-trigger" href="#">
                                                    <span class="">
                                                        Ubah Sandi
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                                <div class="boxed boxed--border">
                                                                    <div class="text-left row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                    @csrf
                                                                        <div class="text-left row mx-0">
                                                                            <div class="col-md-12"> 
                                                                                <h4>Identitas</h4>
                                                                            </div>
                                                                            <div class="col-md-6"> 
                                                                                <label>Password Lama:</label> 
                                                                                <input type="password" name="current_password" value="">
                                                                                <span class="type--fine-print color--error anyerrorin" id="anyerrorin_current_password"></span> 
                                                                            </div>
                                                                            <div class="col-md-6"> 
                                                                                <label>Password Baru:</label> 
                                                                                <input type="password" name="new_password" value=""> 
                                                                                <span class="type--fine-print color--error anyerrorin" id="anyerrorin_new_password"></span> 
                                                                                <label>Ulangi Password Baru:</label> 
                                                                                <input type="password" name="new_confirm_password" value=""> 
                                                                                <span class="type--fine-print color--error anyerrorin" id="anyerrorin_new_confirm_password"></span> 
                                                                            </div>
                                                                            <div class="col-md-6"></div>
                                                                            <div class="col-md-6">
                                                                                <img id="output"/>
                                                                                <button onclick="changePassword()" class="btn bg--dark type--uppercase">Ubah Kata Sandi</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end of modal instance-->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tabs-container" data-content-align="left">
                                <div class="tab__content">
                                    <h4 style="text-align:left">Manajemen Keuangan</h4>
                                    <table class="border--round table--alternate-row bg--white">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Nominal</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="finansial-viewer">
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach($finansials as $finansial)
                                                <tr
                                                    @if($finansial['debit_kredit']=='kredit')
                                                        style="background:rgba(253, 23, 23, 0.20)"
                                                    @endif
                                                >
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $finansial['tanggal_finansial'] }}</td>
                                                    <td>{{ ucwords($finansial['bulan_finansial']) }}</td>
                                                    <td>{{ $finansial['tahun_finansial'] }}</td>
                                                    <td style="text-align:right">{{ number_format($finansial['nominal_finansial'],0) }}</td>
                                                    <td
                                                    @if($finansial['status_finansial']=='verified')
                                                        class = "color--success"
                                                    @elseif($finansial['status_finansial']=='reject')
                                                        class = "color--error"
                                                    @endif
                                                    >{{ $finansial['status_finansial'] }}</td>
                                                    <td>
                                                        @if($finansial['status_finansial']=='pending')
                                                            <a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick="clickUpdateFinancialDetail({{ $finansial['id'] }}, '{{ $finansial['debit_kredit'] }}')"></a>
                                                        @else
                                                            <a class='fas fa-lg fa-info-circle' style='margin-right:5px;cursor:pointer' onClick="clickUpdateFinancialDetail({{ $finansial['id'] }}, '{{ $finansial['debit_kredit'] }}')"></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="modal-instance" style="width:100%">
                                        <a onClick="rmvDataFinancial('debit')" class="btn bg--twitter type--uppercase modal-trigger" style="width:30%;float:right" href="#">
                                            <span class="btn__text">
                                                <i style="margin-right:5px" class="fas fa-plus"></i>
                                                Tambah Setoran
                                            </span>
                                        </a>
                                        <a onClick="rmvDataFinancial('kredit')" class="btn bg--googleplus type--uppercase modal-trigger" style="width:30%;float:left" href="#">
                                            <span class="btn__text">
                                                <i style="margin-right:5px" class="fas fa-minus"></i>
                                                Ambil Tabungan
                                            </span>
                                        </a>
                                        <a class="btn bg--dark type--uppercase modal-trigger" href="#" style="display:none">
                                            <span class="btn__text" id="btnEditFinancial">
                                                Edit
                                            </span>
                                        </a>
                                        <div class="modal-container">
                                            <div class="modal-content">
                                                <div class="row justify-content-center no-gutters">
                                                <div class="boxed boxed--border">
                                                    <h4 id='finansial-title'>Form Setoran</h4>
                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                        <input type="hidden" name="id_bulan_finansial_list">
                                                        <input type="hidden" name="debit_kredit" readonly>
                                                        <input type="hidden" name="financial_input_type" value="shadaqah" readonly>
                                                        <div class="col-md-12"> <label>Tanggal:</label> <input type="date" name="tanggal_finansial" placeholder="Choose a date" /></div>
                                                        <div class="col-md-6">
                                                            <label>Bulan</label>
                                                            <select name="bulan_finansial">
                                                            @php
                                                                $arrayBulan = [
                                                                    [
                                                                        'key'   => 'ramadhan',     
                                                                        'value' =>	'Ramadhan'
                                                                    ],
                                                                    [
                                                                        'key'   => 'syawal',       
                                                                        'value' =>	'Syawal'
                                                                    ],
                                                                    [
                                                                        'key'   => 'dzulqaidah', 
                                                                        'value' =>	'Dzulqa\'idah'
                                                                    ],
                                                                    [
                                                                        'key'   => 'dzulhijjah',   
                                                                        'value' =>	'Dzulhijjah'
                                                                    ],
                                                                    [
                                                                        'key'   => 'muharram',     
                                                                        'value' =>	'Muharram'
                                                                    ],
                                                                    [
                                                                        'key'   => 'shafar',       
                                                                        'value' =>	'Shafar'
                                                                    ],
                                                                    [
                                                                        'key'   => 'rabiul awal',
                                                                        'value' =>	'Rabi\'ul Awal'
                                                                    ],
                                                                    [
                                                                        'key'   => 'rabiul akhir',
                                                                        'value' =>	'Rabi\'ul Akhir'
                                                                    ],
                                                                    [
                                                                        'key'   => 'jumadil awal', 
                                                                        'value' =>	'Jumadil Awal'
                                                                    ],
                                                                    [
                                                                        'key'   => 'jumadil akhir',
                                                                        'value' =>	'Jumadil Akhir'
                                                                    ],
                                                                    [
                                                                        'key'   => 'rajab',        
                                                                        'value' =>	'Rajab'
                                                                    ],
                                                                    [
                                                                        'key'   => 'syaban',        
                                                                        'value' =>	'Sya\'ban'
                                                                    ]
                                                                ]; 
                                                                foreach($arrayBulan as $keyB => $bulan){
                                                                    echo '<option value="'.$bulan['key'].'">'.$bulan['value'].'</option>';
                                                                }
                                                            @endphp
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Tahun</label>
                                                            <select name="tahun_finansial">
                                                            @php
                                                                $arrayTahun = ['40/41','41/42','42/43','43/44','44/45','45/46','46/47','47/48','48/49','49/50','50/52','52/52'];
                                                                foreach($arrayTahun as $keyT => $tahun){
                                                                    echo '<option value="'.$arrayTahun[$keyT].'">'.ucfirst($arrayTahun[$keyT]).'</option>';
                                                                }
                                                            @endphp
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12"> <span>Nominal</span> 
                                                            <div class="input-icon">
                                                                <i>Rp</i>
                                                                <input type="text" class="data_money" name="nominal_finansial"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Metode</label>
                                                            <select name="metode_finansial">
                                                            @php
                                                                $arrayMetodeFinansial = ['transfer', 'cash'];
                                                                foreach($arrayMetodeFinansial as $keyMF => $metodeFinansial){
                                                                    echo '<option value="'.$arrayMetodeFinansial[$keyMF].'">'.ucfirst($arrayMetodeFinansial[$keyMF]).'</option>';
                                                                }
                                                            @endphp
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 row_no_rek"> <label>No Rekening:</label> <input type="text" name="no_rek" /></div>
                                                        <div class="col-md-12 row_atas_nama"> <label>Atas Nama:</label> <input type="text" name="atas_nama" /></div>
                                                        <div class="col-md-12 row_bank_code"> <label>Nama Bank:</label> <input type="text" name="bank_code" /></div>
                                                        <div class="col-md-6 row_bukti_bayar">
                                                            <label>Unggah Bukti Bayar:</label>
                                                            <input id="buktitransfer" name="bukti_transfer" type="file" accept="image/*" onchange="loadBuktiTransferFile(event)">
                                                        </div>
                                                        <div class="col-md-6 row_bukti_bayar">
                                                            <br/>
                                                            <img id="buktitransfer-output"/>
                                                            <!-- <button id="btn-upload-bukti-transfer" class="check-finansial-status btn bg--dark type--uppercase" disabled>Unggah</button> -->
                                                        </div>
                                                        <div class="col-md-12"> <label>Catatan</label> <textarea name="catatan"></textarea> </div>
                                                        <div class="col-md-12 boxed"> 
                                                        <button onclick="finansialSubmission()" class="check-finansial-status btn bg--dark type--uppercase">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="type--fine-print">
                        <br/>
                        <br/>
                    </p>
                </div>
                <div class="col-md-6 text-right text-center-xs">
                    <span class="type--fine-print">
                        {{ env('APP_NAME'), 'Application Name' }} &copy; {{ date('Y') }} - <a href="https://www.github.com/coroo" class="text-primary dim no-underline" style="text-decoration:none">By Kuncoro Wicaksono</a>.
                    </span>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/granim.min.js"></script>
        <!-- <script src="js/smooth-scroll.min.js"></script> -->
        <script src="js/scripts.js"></script>
        @include('financial.script')
    </body>

</html>