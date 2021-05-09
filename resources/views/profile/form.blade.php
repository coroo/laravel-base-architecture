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
                                <ul class="tabs bg--white">
                                    <li class="active">
                                        <div class="tab__title"> <span class="h5"><p>Identitas</p></span> </div>
                                        <div class="tab__content">
                                            <div class="row justify-content-center no-gutters">
                                                <!-- <div class="col-md-10 col-lg-8"> -->
                                                    <div class="boxed boxed--border">
                                                        <h4>Identitas</h4>
                                                        <div class="text-left row mx-0">
                                                            <div class="col-md-12"> 
                                                                <label>NAS:</label> 
                                                                <input type="text" name="kode_nas" value="{{ $user['username'] }}" readonly> 
                                                            </div>
                                                            <div class="col-md-6"> 
                                                                <label>SYU'BAH:</label> 
                                                                <div class="input-select">
                                                                    <select name="syubah">
                                                                        @foreach($syubahs as $syubah)
                                                                            @if($syubah['kode_syubah'] == $profile['syubah']){
                                                                                <option value="{{ $syubah['kode_syubah'] }}" selected>{{ $syubah['nama_syubah'] }}</option>
                                                                            @else
                                                                                <option value="{{ $syubah['kode_syubah'] }}">{{ $syubah['nama_syubah'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"> 
                                                                <label>FAR'AH:</label> 
                                                                <div class="input-select">
                                                                    <select name="farah">
                                                                        @foreach($farahs as $farah)
                                                                            @if($farah['kode_farah'] == $profile['farah']){
                                                                            <option value="{{ $farah['kode_farah'] }}" selected>{{ $farah['nama_farah'] }}</option>
                                                                            @else
                                                                            <option value="{{ $farah['kode_farah'] }}">{{ $farah['nama_farah'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"> 
                                                                <label>Nama Aslu:</label> 
                                                                <input type="text" name="nama_aslu" value="{{ $profile['nama_aslu'] ?? '' }}"> 
                                                            </div>
                                                            <div class="col-md-6"> 
                                                                <label>Nama Hijrah:</label> 
                                                                <input type="text" name="nama_hijrah" value="{{ $profile['nama_hijrah'] ?? '' }}"> 
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label>Jenis Kelamin:</label>
                                                                <select name="jenis_kelamin">
                                                                    <option value="male" @if(isset($profile['jenis_kelamin']))
                                                                        @if($profile['jenis_kelamin']=='male') 
                                                                        selected
                                                                        @endif
                                                                    @endif>Laki Laki</option>
                                                                    <option value="female" @if(isset($profile['jenis_kelamin']))
                                                                        @if($profile['jenis_kelamin']=='female') 
                                                                        selected
                                                                        @endif
                                                                    @endif>Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            </div>
                                                            <div class="col-md-6 col-6"> <label>Tempat Lahir:</label> <input type="text" name="tempat_lahir" value="{{ $profile['tempat_lahir'] ?? '' }}" /></div>
                                                            @php
                                                                if(isset($profile['tanggal_lahir'])){
                                                                    $tanggalLahir = date('Y-m-d', strtotime($profile['tanggal_lahir'])) ?? '';
                                                                } else {
                                                                    $tanggalLahir = "";
                                                                }
                                                            @endphp
                                                            <div class="col-md-6 col-6"> <label>Tanggal Lahir:</label> <input type="date" name="tanggal_lahir" value="{{ $tanggalLahir }}" placeholder="Choose a date" /></div>
                                                            <div class="col-md-6 col-6"> 
                                                                <label>Status Keumatan:</label>
                                                                <select name="status_keumatan">
                                                                @php
                                                                    $arrayStatusKeumatan = ['1.Dewasa','2.Ghilman','3.Fityan','4.Shibyan'];
                                                                    foreach($arrayStatusKeumatan as $keySK => $statusKeumatan){
                                                                        if($arrayStatusKeumatan[$keySK] == $profile['status_keumatan']){
                                                                            echo '<option value="'.$arrayStatusKeumatan[$keySK].'" selected>'.$arrayStatusKeumatan[$keySK].'</option>';   
                                                                        }else{
                                                                            echo '<option value="'.$arrayStatusKeumatan[$keySK].'">'.$arrayStatusKeumatan[$keySK].'</option>';   
                                                                        }
                                                                    }
                                                                @endphp
                                                                </select>
                                                            </div>
                                                            <!-- <div class="col-md-12"> <label>Tanggal Lahir:</label> <input type="text" name="date" class="datepicker" placeholder="Choose a date" /></div> -->
                                                            <div class="col-lg-6 col-md-6">
                                                                <label>Status Perkawinan</label>
                                                                <select name="status_kawin">
                                                                    <option value="S" @if(isset($profile['status_kawin']))
                                                                        @if($profile['status_kawin']=='S') 
                                                                        selected
                                                                        @endif
                                                                    @endif>Single</option>
                                                                    <option value="M" @if(isset($profile['status_kawin']))
                                                                        @if($profile['status_kawin']=='M') 
                                                                        selected
                                                                        @endif
                                                                    @endif>Menikah</option>
                                                                    <option value="D" @if(isset($profile['status_kawin']))
                                                                        @if($profile['status_kawin']=='D') 
                                                                        selected
                                                                        @endif
                                                                    @endif>Janda/Duda</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label>Golongan Darah</label>
                                                                <select name="golongan_darah">
                                                                @php
                                                                    $arrayGolonganDarah = ['A','B','AB','O'];
                                                                    foreach($arrayGolonganDarah as $keyGD => $GolonganDarah){
                                                                        if($arrayGolonganDarah[$keyGD] == $profile['golongan_darah']){
                                                                            echo '<option value="'.$arrayGolonganDarah[$keyGD].'" selected>'.$arrayGolonganDarah[$keyGD].'</option>';   
                                                                        }else{
                                                                            echo '<option value="'.$arrayGolonganDarah[$keyGD].'">'.$arrayGolonganDarah[$keyGD].'</option>';   
                                                                        }
                                                                    }
                                                                @endphp
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 text-center">
                                                                <br/>
                                                                <label>Ayah</label>
                                                            </div>
                                                            <div class="col-md-6"> <label>Kode NAS</label> <input type="text" name="ayah_kode_nas" value="{{ $profile['ayah_kode_nas'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Nama Hijrah</label> <input type="text" name="ayah_nama_hijrah" value="{{ $profile['ayah_nama_hijrah'] ?? '' }}"> </div>
                                                            <div class="col-md-12 text-center">
                                                                <br/>
                                                                <label>Ibu</label>
                                                            </div>
                                                            <div class="col-md-6"> <label>Kode NAS</label> <input type="text" name="ibu_kode_nas" value="{{ $profile['ibu_kode_nas'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Nama Hijrah</label> <input type="text" name="ibu_nama_hijrah" value="{{ $profile['ibu_nama_hijrah'] ?? '' }}"> </div>
                                                            <div class="col-md-12 text-center">
                                                                <br/>
                                                                <label>Wali Fiddien</label>
                                                            </div>
                                                            <div class="col-md-6"> <label>Kode NAS</label> <input type="text" name="wali_kode_nas" value="{{ $profile['wali_kode_nas'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Nama Hijrah</label> <input type="text" name="wali_nama_hijrah" value="{{ $profile['wali_nama_hijrah'] ?? '' }}"> </div>
                                                            <div class="col-md-12">
                                                                <hr style="margin:30px 0 10px"/>
                                                                <h4>Alamat</h4>
                                                            </div>
                                                            <div class="col-md-12 col-12"> <label>Alamat</label> <textarea rows="4" name="alamat">{{ $profile['alamat'] ?? '' }}</textarea> </div>
                                                            
                                                            <div class="col-md-6"> <label>Kel. Desa</label> <input type="text" name="kelurahan" value="{{ $profile['kelurahan'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Kecamatan</label> <input type="text" name="kecamatan" value="{{ $profile['kecamatan'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Kabupaten</label> <input type="text" name="kabupaten" value="{{ $profile['kabupaten'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Propinsi</label> <input type="text" name="provinsi" value="{{ $profile['provinsi'] ?? '' }}"> </div>
                                                            <div class="col-md-6"> <label>Kode Pos</label> <input type="text" name="kode_pos" value="{{ $profile['kode_pos'] ?? '' }}"> </div>
                                                            <div class="col-md-12"> <label>Email</label> <input type="email" name="email" value="{{ $profile['email'] ?? '' }}"> </div>
                                                            <div class="col-md-12"> <label>Nomor Telp</label> <input type="text" name="no_telepon" value="{{ $profile['no_telepon'] ?? '' }}"> </div>
                                                            <div class="col-md-12"> <label>Whatsapp</label> <input type="text" name="whatsapp" value="{{ $profile['whatsapp'] ?? '' }}"> </div>
                                                            <div class="col-md-12"> <label>Pin BB</label> <input type="text" name="pin_bb" value="{{ $profile['pin_bb'] ?? '' }}"> </div>
                                                            <div class="col-md-12"> <label>Nama Akun FB</label> <input type="text" name="nama_akun_fb" value="{{ $profile['nama_akun_fb'] ?? '' }}"> </div>
                                                            <div class="col-md-12 boxed"> 
                                                                <!-- <button type="submit" id="btn-submit-identitas" class="btn bg--dark type--uppercase">Simpan</button>  -->
                                                                <button onclick="submitSectionFirst()" class="btn bg--dark type--uppercase">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title"> <span class="h5"><p>Data ketasliman</p></span> </div>
                                        <div class="tab__content">
                                            <div class="boxed boxed--border">
                                                <h4>Data Ketasliman</h4>
                                                <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly."></form>
                                                    <div class="col-md-12"> <label>Tahun Taslim</label> <input type="number" name="tahun_taslim" value="{{ $profile['tahun_taslim'] ?? '' }}"> </div>
                                                    <div class="col-md-12"> <label>Syahid/Saksi 1</label> <input type="text" name="syahid_1" value="{{ $profile['syahid_1'] ?? '' }}"> </div>
                                                    <div class="col-md-12"> <label>Syahid/Saksi 2</label> <input type="text" name="syahid_2" value="{{ $profile['syahid_2'] ?? '' }}"> </div>
                                                    <div class="col-md-12"> <label>Tempat Taslim</label> <input type="text" name="tempat_taslim" value="{{ $profile['tempat_taslim'] ?? '' }}"> </div>
                                                    <div class="col-md-12 boxed"> 
                                                        <button onclick="submitSectionSecond()" class="btn bg--dark type--uppercase">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title" onClick="educationViewer()"> <span class="h5"><p>Pendidikan formal</p></span> </div>
                                        <div class="tab__content">
                                            <h4>Pendidikan formal</h4>
                                            <table class="border--round table--alternate-row bg--white">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Pendidikan</th>
                                                        <th>Nama Lembaga</th>
                                                        <th>Jurusan</th>
                                                        <th>Gelar Akademik</th>
                                                        <th>Pendidikan Terakhir Tamat</th>
                                                        <th>Tamat tahun</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="education-viewer">
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach($educations as $education)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $education['pendidikan'] }}</td>
                                                            <td>{{ $education['nama_lembaga'] }}</td>
                                                            <td>{{ $education['jurusan'] }}</td>
                                                            <td>{{ $education['gelar_akademik'] }}</td>
                                                            <td>{{ $education['pendidikan_tamat'] }}</td>
                                                            <td>{{ $education['tamat_tahun'] }}</td>
                                                            <td>
                                                                <a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateEducationDetail({{ $education['id'] }})></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteEducationDetail({{ $education['id'] }})></a>
                                                            </td>
                                                        </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-instance">
                                                <a onClick="rmvDataEducation()" class="btn bg--dark type--uppercase modal-trigger" href="#">
                                                    <span class="btn__text">
                                                        Tambah
                                                    </span>
                                                </a>
                                                <a class="btn bg--dark type--uppercase modal-trigger" href="#" style="display:none">
                                                    <span class="btn__text" id="btnEditEducation">
                                                        Edit
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                        <div class="boxed boxed--border">
                                                            <h4>Pendidikan Formal</h4>
                                                            <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                <input type="hidden" name="id_pendidikan_list">
                                                                <div class="col-md-12">
                                                                    <label>Pendidikan</label>
                                                                    <select name="pendidikan">
                                                                    @php
                                                                        $arrayPendidikan = ['sd','smp','sma','d1','d2','d3','s1','s2','s3'];
                                                                        foreach($arrayPendidikan as $keyP => $pendidikan){
                                                                            if($arrayPendidikan[$keyP] == $profile['pendidikan']){
                                                                                echo '<option value="'.$arrayPendidikan[$keyP].'" selected>'.strtoupper($arrayPendidikan[$keyP]).'</option>';   
                                                                            }else{
                                                                                echo '<option value="'.$arrayPendidikan[$keyP].'">'.strtoupper($arrayPendidikan[$keyP]).'</option>';   
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12"> <label>Nama Lembaga Pendidikan</label> <input type="text" name="nama_lembaga" value="{{ $profile['nama_lembaga'] ?? '' }}"> </div>
                                                                <div class="col-md-12"> <label>Jurusan</label> <input type="text" name="jurusan" value="{{ $profile['jurusan'] ?? '' }}"> </div>
                                                                <div class="col-md-12"> <label>Gelar Akademik</label> <input type="text" name="gelar_akademik" value="{{ $profile['gelar_akademik'] ?? '' }}"> </div>
                                                                <div class="col-md-12">
                                                                    <label>Pendidikan Tamat</label>
                                                                    <select name="pendidikan_tamat">
                                                                        <option value="n" @if(isset($profile['pendidikan_tamat']))
                                                                            @if($profile['pendidikan_tamat']=='n') 
                                                                            selected
                                                                            @endif
                                                                        @endif>Tidak</option>
                                                                        <option value="p" @if(isset($profile['pendidikan_tamat']))
                                                                            @if($profile['pendidikan_tamat']=='p') 
                                                                            selected
                                                                            @endif
                                                                        @endif>Masih Dijalani</option>
                                                                        <option value="y" @if(isset($profile['pendidikan_tamat']))
                                                                            @if($profile['pendidikan_tamat']=='y') 
                                                                            selected
                                                                            @endif
                                                                        @endif>Ya</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12"> <label>Tamat tahun</label> <input type="number" name="tamat_tahun" value="{{ $profile['tamat_tahun'] ?? '' }}"> </div>
                                                                <div class="col-md-12 boxed"> 
                                                                <button onclick="submitSectionThird()" class="btn bg--dark type--uppercase">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title" onClick="familyViewer()"> <span class="h5"><p>Susunan ailah/keluarga</p></span> </div>
                                        <div class="tab__content">
                                            <h4>Susunan Ailah / Keluarga</h4>
                                            <table class="border--round table--alternate-row bg--white">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Aslu/Hijrah</th>
                                                        <th>Kode NAS</th>
                                                        <th>Tgl. Lahir</th>
                                                        <th>Hub. Nasab</th>
                                                        <th>Taslim/Futuh?</th>
                                                        <th>Sakanu / Syu’bah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="family-viewer">
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach($families as $family)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $family['nama'] }}</td>
                                                            <td>{{ $family['kode_nas'] }}</td>
                                                            <td>{{ $family['tanggal_lahir'] }}</td>
                                                            <td>{{ $family['hubungan'] }}</td>
                                                            <td>{{ $family['taslim_futuh'] }}</td>
                                                            <td>{{ $family['sakanu_syubah'] }}</td>
                                                            <td>
                                                                <a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateFamilyDetail({{ $family['id'] }})></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteFamilyDetail({{ $family['id'] }})></a>
                                                            </td>
                                                        </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-instance">
                                                <a onClick="rmvDataFamily()" class="btn bg--dark type--uppercase modal-trigger" href="#">
                                                    <span class="btn__text">
                                                        Tambah
                                                    </span>
                                                </a>
                                                <a class="btn bg--dark type--uppercase modal-trigger" href="#" style="display:none">
                                                    <span class="btn__text" id="btnEditFamily">
                                                        Edit
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                                <div class="boxed boxed--border">
                                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                        <div class="col-md-12 text-center boxed">
                                                                            <h5>Susunan Ailah/Keluarga</h5>
                                                                        </div>
                                                                        <input type="hidden" name="id_hubungan_list">
                                                                        <div class="col-md-12"> 
                                                                            <span>Nama Aslu/Hijrah</span> 
                                                                            <input type="text" name="nama_hubungan"> </div>
                                                                        <div class="col-md-12"> 
                                                                            <span>Kode NAS</span> 
                                                                            <input type="text" name="kode_nas_hubungan"> </div>
                                                                        <div class="col-md-12"> 
                                                                            <span>Tanggal Lahir</span> 
                                                                            <input type="date" name="tanggal_lahir_hubungan"> </div>
                                                                        <div class="col-md-12"> 
                                                                            <span>Hub. Nasab</span> 
                                                                            <select name="hubungan">
                                                                            @php
                                                                                $arrayHubungan = ['suami','istri','anak'];
                                                                                foreach($arrayHubungan as $key => $hubungan){
                                                                                    echo '<option value="'.$arrayHubungan[$key].'">'.ucfirst($arrayHubungan[$key]).'</option>';   
                                                                                }
                                                                            @endphp
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12"> 
                                                                            <span>Taslim/Futuh ? (Y/T)</span> 
                                                                            <select name="taslim_futuh">
                                                                            @php
                                                                                $arrayTaslimFutuh = ['Y','T'];
                                                                                foreach($arrayTaslimFutuh as $key => $taslimFutuh){
                                                                                    echo '<option value="'.$arrayTaslimFutuh[$key].'">'.ucfirst($arrayTaslimFutuh[$key]).'</option>';   
                                                                                }
                                                                            @endphp
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12"> 
                                                                            <span>Sakanu Syu'bah</span> 
                                                                            <!-- <input type="text" name="sakanu_syubah">  -->
                                                                            <select name="sakanu_syubah">
                                                                                @foreach($syubahs as $syubah)
                                                                                    @if($syubah['kode_syubah'] == $profile['syubah']){
                                                                                        <option value="{{ $syubah['kode_syubah'] }}" selected>{{ $syubah['nama_syubah'] }}</option>
                                                                                    @else
                                                                                        <option value="{{ $syubah['kode_syubah'] }}">{{ $syubah['nama_syubah'] }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 boxed"> 
                                                                            <!-- <button type="submit" class="btn bg--dark type--uppercase">Simpan</button>  -->
                                                                            <button onclick="submitSectionFourth()" class="btn bg--dark type--uppercase">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end of modal instance-->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title" onClick="jobViewer()"> <span class="h5"><p>Riwayat pekerjaan / Ma'isyah</p></span> </div>
                                        <div class="tab__content">
                                            <h4>Riwayat Pekerjaan</h4>
                                            <table class="border--round table--alternate-row bg--white">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tahun Mulai</th>
                                                        <th>Tahun Selesai</th>
                                                        <th>Nama Pekerjaan</th>
                                                        <th>Nama Institusi</th>
                                                        <th>Kota</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="job-viewer">
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach($jobs as $job)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $job['tahun_mulai'] }}</td>
                                                            <td>{{ $job['tahun_selesai'] }}</td>
                                                            <td>{{ $job['nama_pekerjaan'] }}</td>
                                                            <td>{{ $job['nama_institusi'] }}</td>
                                                            <td>{{ $job['kota'] }}</td>
                                                            <td>
                                                                <a class='fas fa-lg fa-ban' style='margin-right:5px;cursor:pointer' onClick=clickUpdateJobDetail({{ $job['id'] }})></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteJobDetail({{ $job['id'] }})></a>
                                                            </td>
                                                        </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-instance">
                                                <a onClick="rmvDataJob()" class="btn bg--dark type--uppercase modal-trigger" href="#">
                                                    <span class="btn__text">
                                                        Tambah
                                                    </span>
                                                </a>
                                                <a class="btn bg--dark type--uppercase modal-trigger" href="#" style="display:none">
                                                    <span class="btn__text" id="btnEditJob">
                                                        Edit
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                                <div class="boxed boxed--border">
                                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                        <div class="col-md-12 text-center boxed">
                                                                            <h5>Riwayat Pekerjaan</h5>
                                                                        </div>
                                                                        <input type="hidden" name="id_institusi_list">
                                                                        <div class="col-md-12"> <span>Tahun mulai</span> <input type="number" name="institusi_tahun_mulai" value=""> </div>
                                                                        <div class="col-md-12"> <span>Tahun selesai</span> <input type="number" name="institusi_tahun_selesai" value=""> </div>
                                                                        <div class="col-md-12"> <span>Nama Pekerjaan / Jabatan</span> <input type="text" name="nama_pekerjaan" value=""> </div>
                                                                        <div class="col-md-12"> <span>Nama Tempat Kerja / Perusahaan / Institusi</span> <input type="text" name="nama_institusi" value=""> </div>
                                                                        <div class="col-md-12"> <span>Kota</span> <input type="text" name="kota_institusi" value=""> </div>
                                                                        <div class="col-md-12 boxed"> 
                                                                            <button onclick="submitSectionFifth()" class="btn bg--dark type--uppercase">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end of modal instance-->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title" onClick="achievementViewer()"> <span class="h5"><p>Data Prestasi</p></span> </div>
                                        <div class="tab__content">
                                            <h4>Data Prestasi</h4>
                                            <table class="border--round table--alternate-row bg--white">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tahun Achievement</th>
                                                        <th>Nama Achievement</th>
                                                        <th>Keterangan Achievement</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="achievement-viewer">
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach($achievements as $achievement)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $achievement['tahun_achievement'] }}</td>
                                                            <td>{{ $achievement['nama_achievement'] }}</td>
                                                            <td>{{ $achievement['keterangan_achievement'] }}</td>
                                                            <td>
                                                                <a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateAchievementDetail({{ $achievement['id'] }})></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteAchievementDetail({{ $achievement['id'] }})></a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-instance">
                                                <a onClick="rmvDataAchievement()" class="btn bg--dark type--uppercase modal-trigger" href="#">
                                                    <span class="btn__text">
                                                        Tambah
                                                    </span>
                                                </a>
                                                <a class="btn bg--dark type--uppercase modal-trigger" href="#" style="display:none">
                                                    <span class="btn__text" id="btnEditAchievement">
                                                        Edit
                                                    </span>
                                                </a>
                                                <div class="modal-container">
                                                    <div class="modal-content">
                                                        <div class="row justify-content-center no-gutters">
                                                                <div class="boxed boxed--border">
                                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                                        <div class="col-md-12 text-center boxed">
                                                                            <h5>Data Prestasi</h5>
                                                                        </div>
                                                                        <input type="hidden" name="id_achievement_list">
                                                                        <div class="col-md-12"> <span>Tahun</span> <input type="number" name="tahun_achievement"> </div>
                                                                        <div class="col-md-12"> <span>Nama acara / lomba / event / kegiatan</span> <input type="text" name="nama_achievement"> </div>
                                                                        <div class="col-md-12"> <span>keterangan prestasi yang diraih</span> <input type="text" name="keterangan_achievement"> </div>
                                                                        <div class="col-md-12 boxed"> 
                                                                            <button onclick="submitSectionSixth()" class="btn bg--dark type--uppercase">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end of modal instance-->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title"> <span class="h5"><p>Potensi Diri</p></span> </div>
                                        <div class="tab__content">
                                            <div class="row justify-content-center no-gutters">
                                                <div class="boxed boxed--border">
                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                        <h4>Potensi Diri</h4>
                                                        <div class="col-md-12 col-12"> <label>Minat / Hobi</label> <textarea rows="4" name="minat_hobi">{{ $profile['minat_hobi'] ?? '' }}</textarea> </div>
                                                        <div class="col-md-12 col-12"> <label>Bakat / Keahlian</label> <textarea rows="4" name="bakat_keahlian">{{ $profile['bakat_keahlian'] ?? '' }}</textarea> </div>
                                                        <div class="col-md-12 boxed"> 
                                                            <button onclick="submitSectionSeventh()" class="btn bg--dark type--uppercase">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tab__title"> <span class="h5"><p>Sosio Ekonomi</p></span> </div>
                                        <div class="tab__content">
                                            <div class="row justify-content-center no-gutters">
                                                <div class="boxed boxed--border">
                                                    <div class="text-left form-email row mx-0" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                                        <h4>Sosio Ekonomi</h4>
                                                        <div class="col-md-12">
                                                            <label>Jenis Penghasilan</label>
                                                            <select name="jenis_penghasilan">
                                                                <option value="tetap" @if(isset($profile['jenis_penghasilan']))
                                                                    @if($profile['jenis_penghasilan']=="tetap") 
                                                                    selected
                                                                    @endif
                                                                @endif>Tetap</option>
                                                                <option value="tidak" @if(isset($profile['jenis_penghasilan']))
                                                                    @if($profile['jenis_penghasilan']=="tidak") 
                                                                    selected
                                                                    @endif
                                                                @endif>Tidak Tetap</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <br/>
                                                            <label>Penghasilan perbulan</label>
                                                        </div>
                                                        <div class="col-md-6"> <span>Dari</span> 
                                                            <div class="input-icon">
                                                                <i>Rp</i>
                                                                <input type="text" class="data_money" name="penghasilan_mulai" value="{{ $profile['penghasilan_mulai'] ? number_format($profile['penghasilan_mulai'],0) : 0 }}"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> <span>Sampai dengan</span> 
                                                            <div class="input-icon">
                                                                <i>Rp</i>
                                                                <input type="text" class="data_money" name="penghasilan_sampai" value="{{ $profile['penghasilan_sampai'] ? number_format($profile['penghasilan_sampai'],0) : 0 }}"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <br/>
                                                            <label>Pengeluaran perbulan</label>
                                                        </div>
                                                        <div class="col-md-6"> <span>Dari</span> 
                                                            <div class="input-icon">
                                                                <i>Rp</i>
                                                                <input type="text" class="data_money" name="pengeluaran_mulai" value="{{ $profile['pengeluaran_mulai'] ? number_format($profile['pengeluaran_mulai'],0) : 0 }}"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> <span>Sampai dengan</span> 
                                                            <div class="input-icon">
                                                                <i>Rp</i>
                                                                <input type="text" class="data_money" name="pengeluaran_sampai" value="{{ $profile['pengeluaran_sampai'] ? number_format($profile['pengeluaran_sampai'],0) : 0 }}"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 boxed"> 
                                                            <button onclick="submitSectionEighth()" class="btn bg--dark type--uppercase">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
        @include('profile.script')
    </body>

</html>