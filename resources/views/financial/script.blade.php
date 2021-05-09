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
    
    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
        $('#btn-upload-img').prop("disabled", false);
    };

    
    var loadBuktiTransferFile = function(event) {
        var output = document.getElementById('buktitransfer-output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
        $('#btn-upload-bukti-transfer').prop("disabled", false);
    };

    function finansialViewer(data) {
        $.ajax({
            type:'GET',
            url:'/api/v1/finansial',
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                rows = JSON.parse(JSON.stringify(data.data).replace(/\:null/gi, "\:\"-\""));
                var html = "<table border='1|1'>";
                for (var i = 0; i < rows.length; i++) {
                    x = i + 1;
                    if(rows[i].debit_kredit=='kredit'){
                        html+="<tr style='background:rgba(253, 23, 23, 0.20)'>";
                    } else {
                        html+="<tr>";
                    }
                    html+="<td>"+x+"</td>";
                    html+="<td>"+rows[i].tanggal_finansial+"</td>";
                    html+="<td>"+rows[i].bulan_finansial+"</td>";
                    html+="<td>"+rows[i].tahun_finansial+"</td>";
                    if(rows[i].status_finansial=='verified'){
                        html+="<td class='color--success'>"+number_format(rows[i].nominal_finansial)+"</td>";
                    }else if(rows[i].status_finansial=='reject'){
                        html+="<td class='color--error'>"+number_format(rows[i].nominal_finansial)+"</td>";
                    }else{
                        html+="<td>"+number_format(rows[i].nominal_finansial)+"</td>";
                    }
                    html+="<td>"+rows[i].status_finansial+"</td>";
                    if(rows[i].status_finansial == 'pending'){
                        html+="<td><a class='fas fa-lg fa-edit' style='margin-right:5px;cursor:pointer' onClick=\"clickUpdateFinancialDetail('"+rows[i].id+"', '"+rows[i].debit_kredit+"')\"></a></td>";
                    } else {
                        html+="<td><a class='fas fa-lg fa-info-circle' style='margin-right:5px;cursor:pointer' onClick=\"clickUpdateFinancialDetail('"+rows[i].id+"', '"+rows[i].debit_kredit+"')\"></a> </td>"
                    }

                    html+="</tr>";

                }
                html+="</table>";
                $("#finansial-viewer").html(html);
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function finansialSubmission(data) {
        var id = $("input[name=id_bulan_finansial_list]").val();
        
        var data = [];
        if(id == ""){
            var url = '/api/v1/add-finansial';
        } else {
            var url = '/api/v1/update-finansial/' + id;
        }

        var tanggal_transaksi = $('input[name=tanggal_finansial').val();
        if(tanggal_transaksi == 'dd/mm/yyyy' || tanggal_transaksi === '' || tanggal_transaksi === null){
            alert('Mohon isi tanggal transaksi terlebih dahulu');
        } else {
            data['bulan_finansial'] = $('select[name=bulan_finansial]').val();
            data['financial_input_type'] = 'shadaqah';
            data['nominal_finansial'] = parseFloat($("input[name=nominal_finansial").val().replace(/,/g, ''));
            data['tanggal_finansial'] = tanggal_transaksi;
            data['catatan'] = $('textarea[name=catatan').val();
            data['tahun_finansial'] = $('select[name=tahun_finansial').val();
            data['metode_finansial'] = $('select[name=metode_finansial').val();

            // data['buktitransfer'] = document.getElementById('buktitransfer').files[0];
            // var file = document.getElementById('buktitransfer').files[0];
            // var data = new FormData;
            // data.append('buktitransfer', file);

            // data.append('image', files[0]);

            // data['buktitransfer'] = $('input[name=bukti_transfer').val();

            // console.log(data['buktitransfer']);

            var no_rek = $('input[name=no_rek').val();
            var bank_code = $('input[name=bank_code').val();
            var atas_nama = $('input[name=atas_nama').val();
            if(no_rek != '' || bank_code != '' || atas_nama != ''){
                data['debit_kredit'] = 'kredit';
            } else {
                data['debit_kredit'] = 'debit';
            }
            data['no_rek'] = no_rek;
            data['bank_code'] = bank_code;
            data['atas_nama'] = atas_nama;
            
            $.ajax({
                type:'POST',
                url:url,
                headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
                data:{...data},
                success:function(data){
                    var file = document.getElementById('buktitransfer').files[0];
                    var formData = new FormData;
                    formData.append('buktitransfer', file);
                    
                    $.ajax({
                        type:'POST',
                        url:'/api/v1/upload-bukti-transfer/' + data.data.id,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
                        data:formData,
                        success:function(data){
                            console.log('sukses disini')
                            $(".modal-content .modal-close").click();
                            alert('Data Anda telah Tersimpan');
                            finansialViewer();
                            rmvDataFinancial('input');

                            return false;
                        }, 
                        error: function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.message);
                            console.log(err.message);
                        }
                    });
                    // post 2 end
                }, 
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.message);
                    console.log(err.message);
                }
            });

        }
    }
    function rmvDataFinancial(type) {
        var data = [];
        $('input[name=id_bulan_finansial_list').val('');
        $("select[name=bulan_finansial]").val('');
        $('input[name=financial_input_type]').val('shadaqah');
        $('input[name=nominal_finansial').val('');
        $('input[name=tanggal_finansial').val('');
        $('textarea[name=catatan').val('');
        $('select[name=tahun_finansial').val('');
        $('select[name=metode_finansial').val('');

        $('input[name=no_rek').val('');
        $('input[name=bank_code').val('');
        $('input[name=atas_nama').val('');
        $('#buktitransfer').val('');

        if(type=='kredit'){
            $('.row_no_rek').show();
            $('.row_bank_code').show();
            $('.row_atas_nama').show();
            $('.row_bukti_bayar').hide();
            $('#finansial-title').text('Pengambilan Tabungan');
            $('input[name=debit_kredit]').val('kredit');
        } else {
            $('.row_no_rek').hide();
            $('.row_bank_code').hide();
            $('.row_atas_nama').hide();
            $('.row_bukti_bayar').show();
            $('#finansial-title').text('Form Setoran');
            $('input[name=debit_kredit]').val('debit');
        }
    };
    function clickUpdateFinancialDetail(id, type) {
        $('#buktitransfer-output').removeAttr('src');
        $('#buktitransfer').val('');
                
        $.ajax({
            type:'GET',
            url:'/api/v1/finansial/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                $("input[name=id_bulan_finansial_list]").val(id);
                $('select[name=bulan_finansial]').val(data.data.bulan_finansial);
                $('input[name=nominal_finansial').val(data.data.nominal_finansial);
                $('input[name=tanggal_finansial').val(data.data.tanggal_finansial);
                $('textarea[name=catatan').val(data.data.catatan);
                $('select[name=tahun_finansial').val(data.data.tahun_finansial);
                $('select[name=metode_finansial').val(data.data.metode_finansial);
                $("#btnEditFinancial").click();

                $('input[name=no_rek').val(data.data.no_rek);
                $('input[name=bank_code').val(data.data.bank_code);
                $('input[name=atas_nama').val(data.data.atas_nama);

                if(type=='kredit'){
                    $('.row_no_rek').show();
                    $('.row_bank_code').show();
                    $('.row_atas_nama').show();
                    $('.row_bukti_bayar').hide();
                    $('#finansial-title').text('Pengambilan Tabungan');
                    $('input[name=debit_kredit]').val('kredit');
                } else {
                    $('.row_no_rek').hide();
                    $('.row_bank_code').hide();
                    $('.row_atas_nama').hide();
                    $('.row_bukti_bayar').show();
                    $('#buktitransfer-output').attr('src', data.data.bukti_transfer);
                    
                    $('#finansial-title').text('Form Setoran');
                    $('input[name=debit_kredit]').val('debit');
                }
                
                if(data.data.status_finansial == 'pending'){
                    $('.check-finansial-status').show();
                } else {
                    $('.check-finansial-status').hide();
                }
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
    };
    function clickDeleteFinancialDetail(id) {
        $.ajax({
            type:'GET',
            url:'/api/v1/delete-finansial/' + id,
            headers: {"Authorization": "Bearer {!! auth()->user()->access_token !!}"},
            success:function(data){
                alert('Data berhasil dihapus');
                finansialViewer();
                return false;
            }, 
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
                console.log(err.message);
            }
        });
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