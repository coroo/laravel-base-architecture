<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on("keyup",'.data_money', function(){
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40){
                event.preventDefault();
            }
            var $this = $(this);
            var num = $this.val().replace(/,/gi, "");
            var num = $this.val().replace(/[^0-9]+/g, "");
            var num2 = num.split(/(?=(?:\d{3})+$)/).join(",");
            
            // the following line has been simplified. Revision history contains original.
            $this.val(num2);
        });
    });

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
        $('#btn-upload-img').prop("disabled", false);
    };

    function educationViewer(data) {
        $.ajax({
            type:'GET',
            url:'/api/v1/educations',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                rows = JSON.parse(JSON.stringify(data.data).replace(/\:null/gi, "\:\"-\""));
                var html = "<table border='1|1'>";
                for (var i = 0; i < rows.length; i++) {
                    x = i + 1;
                    html+="<tr>";
                    html+="<td>"+x+"</td>";
                    html+="<td>"+rows[i].pendidikan+"</td>";
                    html+="<td>"+rows[i].nama_lembaga+"</td>";
                    html+="<td>"+rows[i].jurusan+"</td>";
                    html+="<td>"+rows[i].gelar_akademik+"</td>";
                    html+="<td>"+rows[i].pendidikan_tamat+"</td>";
                    html+="<td>"+rows[i].tamat_tahun+"</td>";
                    html+="<td><a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateEducationDetail('"+rows[i].id+"')></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteEducationDetail('"+rows[i].id+"')></a></td>";

                    html+="</tr>";

                }
                html+="</table>";
                $("#education-viewer").html(html);
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function educationSubmission(data) {
        var id = $("input[name=id_pendidikan_list]").val();
        if(id == ""){
            var url = '/api/v1/add-education';
        } else {
            var url = '/api/v1/update-education/' + id;
        }

        $.ajax({
            type:'POST',
            url:url,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                $(".modal-content .modal-close").click();
                alert('Data Anda telah Tersimpan');
                educationViewer();
                rmvDataEducation();

                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    }
    function rmvDataEducation() {
        var data = [];
        $('input[name=id_pendidikan_list').val('');
        $("select[name=pendidikan]").val('');
        $('input[name=nama_lembaga]').val('');
        $('input[name=jurusan').val('');
        $('input[name=gelar_akademik').val('');
        $('select[name=pendidikan_tamat').val('');
        $('input[name=tamat_tahun').val('');
    };
    function clickUpdateEducationDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/education/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                console.log(data);
                $("input[name=id_pendidikan_list]").val(id);
                $('select[name=pendidikan]').val(data.data.pendidikan);
                $('input[name=nama_lembaga').val(data.data.nama_lembaga);
                $('input[name=jurusan').val(data.data.jurusan);
                $('input[name=gelar_akademik').val(data.data.gelar_akademik);
                $('select[name=pendidikan_tamat').val(data.data.pendidikan_tamat);
                $('input[name=tamat_tahun').val(data.data.tamat_tahun);
                $("#btnEditEducation").click();
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function clickDeleteEducationDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/delete-education/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                alert('Data berhasil dihapus');
                educationViewer();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };

    function familyViewer(data) {
        $.ajax({
            type:'GET',
            url:'/api/v1/families',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                rows = JSON.parse(JSON.stringify(data.data).replace(/\:null/gi, "\:\"-\""));
                var html = "<table border='1|1'>";
                for (var i = 0; i < rows.length; i++) {
                    x = i + 1;
                    html+="<tr>";
                    html+="<td>"+x+"</td>";
                    html+="<td>"+rows[i].nama+"</td>";
                    html+="<td>"+rows[i].kode_nas+"</td>";
                    html+="<td>"+rows[i].tanggal_lahir+"</td>";
                    html+="<td>"+rows[i].hubungan+"</td>";
                    html+="<td>"+rows[i].taslim_futuh+"</td>";
                    html+="<td>"+rows[i].sakanu_syubah+"</td>";
                    html+="<td><a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateFamilyDetail('"+rows[i].id+"')></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteFamilyDetail('"+rows[i].id+"')></a></td>";

                    html+="</tr>";

                }
                html+="</table>";
                $("#family-viewer").html(html);
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function familySubmission(data) {
        var id = $("input[name=id_hubungan_list]").val();
        if(id == ""){
            var url = '/api/v1/add-family';
        } else {
            var url = '/api/v1/update-family/' + id;
        }

        $.ajax({
            type:'POST',
            url:url,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                $(".modal-content .modal-close").click();
                alert('Data Anda telah Tersimpan');
                familyViewer();

                $('input[name=nama_hubungan]').val('');
                $('input[name=kode_nas_hubungan').val('');
                $('input[name=tanggal_lahir_hubungan').val('');
                $('select[name=hubungan').val('');
                $('select[name=taslim_futuh').val('');
                $('select[name=sakanu_syubah').val('');

                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    }
    function rmvDataFamily() {
        var data = [];
        $("input[name=id_hubungan_list]").val('');
        $('input[name=nama_hubungan]').val('');
        $('input[name=kode_nas_hubungan').val('');
        $('input[name=tanggal_lahir_hubungan').val('');
        $('select[name=hubungan').val('');
        $('select[name=taslim_futuh').val('');
        $('select[name=sakanu_syubah').val('');
    };
    function clickUpdateFamilyDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/family/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                $("input[name=id_hubungan_list]").val(id);
                $('input[name=nama_hubungan]').val(data.data.nama);
                $('input[name=kode_nas_hubungan').val(data.data.kode_nas);
                $('input[name=tanggal_lahir_hubungan').val(data.data.tanggal_lahir);
                $('select[name=hubungan').val(data.data.hubungan);
                $('select[name=taslim_futuh').val(data.data.taslim_futuh);
                $('select[name=sakanu_syubah').val(data.data.sakanu_syubah);
                $("#btnEditFamily").click();
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function clickDeleteFamilyDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/delete-family/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                alert('Data berhasil dihapus');
                familyViewer();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };

    // JOB CODE LIST
    function jobSubmission(data) {
        var id = $("input[name=id_institusi_list]").val();
        if(id == ""){
            var url = '/api/v1/add-job';
        } else {
            var url = '/api/v1/update-job/' + id;
        }

        $.ajax({
            type:'POST',
            url:url,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                $(".modal-content .modal-close").click();
                alert('Data Anda telah Tersimpan');
                jobViewer();

                $("input[name=id_institusi_list]").val('');
                $("input[name=institusi_tahun_mulai]").val('');
                $("input[name=institusi_tahun_selesai]").val('');
                $("input[name=nama_pekerjaan]").val('');
                $("input[name=nama_institusi]").val('');
                $("input[name=kota_institusi]").val('');
        
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    }
    function jobViewer(data) {
        $.ajax({
            type:'GET',
            url:'/api/v1/jobs',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                rows = JSON.parse(JSON.stringify(data.data).replace(/\:null/gi, "\:\"-\""));
                var html = "<table border='1|1'>";
                for (var i = 0; i < rows.length; i++) {
                    x = i + 1;
                    html+="<tr>";
                    html+="<td>"+x+"</td>";
                    html+="<td>"+rows[i].tahun_mulai+"</td>";
                    html+="<td>"+rows[i].tahun_selesai+"</td>";
                    html+="<td>"+rows[i].nama_pekerjaan+"</td>";
                    html+="<td>"+rows[i].nama_institusi+"</td>";
                    html+="<td>"+rows[i].kota+"</td>";
                    html+="<td><a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateJobDetail('"+rows[i].id+"')></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteJobDetail('"+rows[i].id+"')></a></td>";

                    html+="</tr>";

                }
                html+="</table>";
                $("#job-viewer").html(html);
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function rmvDataJob() {
        var data = [];
        $("input[name=id_institusi_list]").val('');
        $("input[name=institusi_tahun_mulai]").val('');
        $("input[name=institusi_tahun_selesai]").val('');
        $("input[name=nama_pekerjaan]").val('');
        $("input[name=nama_institusi]").val('');
        $("input[name=kota_institusi]").val('');
    };
    function clickUpdateJobDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/job/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                $("input[name=id_institusi_list]").val(id);
                $("input[name=institusi_tahun_mulai]").val(data.data.tahun_mulai);
                $("input[name=institusi_tahun_selesai]").val(data.data.tahun_selesai);
                $("input[name=nama_pekerjaan]").val(data.data.nama_pekerjaan);
                $("input[name=nama_institusi]").val(data.data.nama_institusi);
                $("input[name=kota_institusi]").val(data.data.kota);
                $("#btnEditJob").click();
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function clickDeleteJobDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/delete-job/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                alert('Data berhasil dihapus');
                jobViewer();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };

    function achievementViewer(data) {
        $.ajax({
            type:'GET',
            url:'/api/v1/achievements',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                rows = JSON.parse(JSON.stringify(data.data).replace(/\:null/gi, "\:\"-\""));
                var html = "<table border='1|1'>";
                for (var i = 0; i < rows.length; i++) {
                    x = i + 1;
                    html+="<tr>";
                    html+="<td>"+x+"</td>";
                    html+="<td>"+rows[i].tahun_achievement+"</td>";
                    html+="<td>"+rows[i].nama_achievement+"</td>";
                    html+="<td>"+rows[i].keterangan_achievement+"</td>";
                    html+="<td><a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=clickUpdateAchievementDetail('"+rows[i].id+"')></a> <a class='fas fa-lg fa-trash' style='cursor:pointer' onClick=clickDeleteAchievementDetail('"+rows[i].id+"')></a></td>";


                    html+="</tr>";

                }
                html+="</table>";
                $("#achievement-viewer").html(html);
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function achievementSubmission(data) {
        var id = $("input[name=id_achievement_list]").val();
        if(id == ""){
            var url = '/api/v1/add-achievement';
        } else {
            var url = '/api/v1/update-achievement/' + id;
        }

        $.ajax({
            type:'POST',
            url:url,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                $(".modal-content .modal-close").click();
                alert('Data Anda telah Tersimpan');
                achievementViewer();
                rmvDataAchievement();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
            }
        });
    };
    function rmvDataAchievement() {
        var data = [];
        $("input[name=id_achievement_list]").val('');
        $("input[name=tahun_achievement]").val('');
        $("input[name=nama_achievement]").val('');
        $("input[name=keterangan_achievement]").val('');
    };
    function clickUpdateAchievementDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/achievement/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                $("input[name=id_achievement_list]").val(id);
                $("input[name=tahun_achievement]").val(data.data.tahun_achievement);
                $("input[name=nama_achievement]").val(data.data.nama_achievement);
                $("input[name=keterangan_achievement]").val(data.data.keterangan_achievement);
                $("#btnEditAchievement").click();
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function clickDeleteAchievementDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/delete-achievement/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                alert('Data berhasil dihapus');
                achievementViewer();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };

    function profileSubmission(data) {
        $.ajax({
            type:'POST',
            url:'/api/v1/add-profile',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                alert('Data Anda telah Tersimpan');
                // location.reload();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    }

    function submitSectionFirst() {
        var data = [];
        //section 1
        data['syubah'] = $("select[name=syubah").children("option:selected").val();
        data['farah'] = $("select[name=farah").children("option:selected").val();
        data['nama_aslu'] = $("input[name=nama_aslu").val();
        data['nama_hijrah'] = $("input[name=nama_hijrah").val();

        data['jenis_kelamin'] = $("select[name=jenis_kelamin").val();
        data['tempat_lahir'] = $("input[name=tempat_lahir").val();
        data['tanggal_lahir'] = $("input[name=tanggal_lahir").val();
        data['status_keumatan'] = $("select[name=status_keumatan").val();
        data['status_kawin'] = $("select[name=status_kawin").val();
        data['golongan_darah'] = $("select[name=golongan_darah").val();

        data['ayah_kode_nas'] = $("input[name=ayah_kode_nas").val();
        data['ayah_nama_hijrah'] = $("input[name=ayah_nama_hijrah").val();
        data['ibu_kode_nas'] = $("input[name=ibu_kode_nas").val();
        data['ibu_nama_hijrah'] = $("input[name=ibu_nama_hijrah").val();
        data['wali_kode_nas'] = $("input[name=wali_kode_nas").val();
        data['wali_nama_hijrah'] = $("input[name=wali_nama_hijrah").val();
        data['alamat'] = $("textarea[name=alamat").val();
        data['email'] = $("input[name=email").val();
        data['kelurahan'] = $("input[name=kelurahan").val();
        data['kecamatan'] = $("input[name=kecamatan").val();
        data['kabupaten'] = $("input[name=kabupaten").val();
        data['provinsi'] = $("input[name=provinsi").val();
        data['kode_pos'] = $("input[name=kode_pos").val();
        data['no_telepon'] = $("input[name=no_telepon").val();
        data['whatsapp'] = $("input[name=whatsapp").val();
        data['pin_bb'] = $("input[name=pin_bb").val();
        data['nama_akun_fb'] = $("input[name=nama_akun_fb").val();

        profileSubmission(data);
    };

    function submitSectionSecond() {
        var data = [];
        //section 2
        data['tahun_taslim'] = $("input[name=tahun_taslim").val();
        data['syahid_1'] = $("input[name=syahid_1").val();
        data['syahid_2'] = $("input[name=syahid_2").val();
        data['tempat_taslim'] = $("input[name=tempat_taslim").val();
        
        profileSubmission(data);
    };

    function submitSectionThird() {
        var data = [];
        //section 3
        $namaLembaga = $("input[name=nama_lembaga]").val();
        if($namaLembaga != ''){
            data['pendidikan'] = $("select[name=pendidikan]").val();
            data['nama_lembaga'] = $namaLembaga;
            data['jurusan'] = $("input[name=jurusan]").val();
            data['gelar_akademik'] = $("input[name=gelar_akademik]").val();
            data['pendidikan_tamat'] = $("select[name=pendidikan_tamat]").val();
            data['tamat_tahun'] = $("input[name=tamat_tahun]").val();
            
            educationSubmission(data);
        } else {
            alert('Mohon isi nama lembaga terlebih dahulu');
        }
    };

    function submitSectionFourth() {
        var data = [];
        //section 4
        $namaHubungan = $("input[name=nama_hubungan]").val();
        if($namaHubungan != ''){
            data['nama'] = $namaHubungan;
            data['kode_nas'] = $("input[name=kode_nas_hubungan]").val();
            data['tanggal_lahir'] = $("input[name=tanggal_lahir_hubungan]").val();
            data['hubungan'] = $("select[name=hubungan]").val();
            data['taslim_futuh'] = $("select[name=taslim_futuh]").val();
            data['sakanu_syubah'] = $("select[name=sakanu_syubah]").val();
            
            familySubmission(data);
        } else {
            alert('Mohon lengkapi data Anda terlebih dahulu');
        }
    };

    function submitSectionFifth() {
        var data = [];
        //section 5

        data['tahun_mulai'] = $("input[name=institusi_tahun_mulai]").val();
        data['tahun_selesai'] = $("input[name=institusi_tahun_selesai]").val();
        data['nama_pekerjaan'] = $("input[name=nama_pekerjaan]").val();
        data['nama_institusi'] = $("input[name=nama_institusi]").val();
        data['kota'] = $("input[name=kota_institusi]").val();
        
        jobSubmission(data);
    };

    function submitSectionSixth() {
        var data = [];
        //section 5

        data['tahun_achievement'] = $("input[name=tahun_achievement]").val();
        data['nama_achievement'] = $("input[name=nama_achievement]").val();
        data['keterangan_achievement'] = $("input[name=keterangan_achievement]").val();
        
        achievementSubmission(data);
    };

    function submitSectionSeventh() {
        var data = [];
        //section 7
        data['bakat_keahlian'] = $("textarea[name=bakat_keahlian").val();
        data['minat_hobi'] = $("textarea[name=minat_hobi").val();
        console.log(data);
        profileSubmission(data);
    };


    function submitSectionEighth() {
        var data = [];
        //section 8
        data['jenis_penghasilan'] = $("select[name=jenis_penghasilan").val();
        data['penghasilan_mulai'] = parseFloat($("input[name=penghasilan_mulai").val().replace(/,/g, ''));
        data['penghasilan_sampai'] = parseFloat($("input[name=penghasilan_sampai").val().replace(/,/g, ''));
        data['pengeluaran_mulai'] = parseFloat($("input[name=pengeluaran_mulai").val().replace(/,/g, ''));
        data['pengeluaran_sampai'] = parseFloat($("input[name=pengeluaran_sampai").val().replace(/,/g, ''));

        profileSubmission(data);
    };

    function changePassword() {
        var data = [];
        //section change password
        data['current_password'] = $("input[name=current_password").val();
        data['new_password'] = $("input[name=new_password").val();
        data['new_confirm_password'] = $("input[name=new_confirm_password").val();
        $(".anyerrorin").html('');

        $.ajax({
            type:'POST',
            url:'/api/v1/change-password',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            data:{...data},
            success:function(data){
                alert('Password Anda Telah Berhasil Dirubah');
                location.reload();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                if(err.errors != undefined){
                    $.each(err.errors, function(key, value) {
                        $("#anyerrorin_" + key).html(value[0]);
                    });
                }
            }
        });
    };
</script>