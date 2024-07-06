<head>
    <title>Detail Penjualan</title>
    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('css/styless.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="  <?php echo e(asset('css/jquery.autocomplete.css')); ?>" />
    <script type="text/javascript" src=" <?php echo e(asset('js/jquery.autocomplete.js')); ?>"></script>
    <script type='text/javascript' src=' <?php echo e(asset('js/jquery-1.4.js')); ?>'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
    body {
        background-color:whitesmoke ;
    }
    tanggal {
        color: maroon;
        margin-left: 40px;
    } 
    input:hover {
      background-color: yellow;
    }
    </style>
    <script language="javascript">
    $(document).ready(function() {
            $("#pelanggan_name").autocomplete("jualLovpelanggan.php", {
                width: 158
            });
    
            $("#pelanggan_name").result(function (event, data, formatted) {
                var supplier = document.getElementById("pelanggan_name").value;
                $.ajax({
                    url: 'jualLovdetpelanggan.php?pelanggan_id=' + pelanggan_id,
                    dataType: 'json',
                    data: "pelanggan_id=" + formatted,
                    success: function (data) {
                        var pelanggan_id = data.pelanggan_id
                        $('#pelanggan_id').val(pelanggan_id);
                    }
                });
    
            });
        
    
        
      });
    </script>
    </head>
    <body>
    <?php
    // error_reporting(0);
    //connection with database with PDO
    // require "../../include/config.php";
    ?>
    <form id='form2' name='form2' action='' method='post'>
        <table width='100%'>
          <tr>
            
            <td class='fontjudul'>Detail Pengupahan</td>
             <!-- grandtotal -->
        </tr>
    </table>
        <hr />
    <table width='100%' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='fonttext'>(*) 1. <b>Pelanggan</b></td>
            <td> <input type='text' class='inputform' name='customer' id='customer' value=''></td>
            <td class='fonttext'> (*) 2. <b>Tanggal Transaksi</b> </td>
            <td><input type='date' class='inputform' name='penjualan_tanggal' id='penjualan_tanggal' value='<?php echo isset($row['penjualan_tanggal']) ? $row['penjualan_tanggal'] : ''; ?>' onkeyup="this.value = this.value.toUpperCase();" />
            </td>
        </tr>
        <tr>
        <td class='fonttext'>(*) 3. <b>QTY</b></td>
        <td><input type='text' class='inputform' name='penjualan_qty_m' id='penjualan_qty_m' value='<?php echo isset($row['penjualan_qty_name']) ? $row['penjualan_qty_name'] : ''; ?>' onkeyup="this.value = this.value.toUpperCase();" />   
        </tr>
        <!-- <tr>
        <td class='fonttext'> (*) 2. <b>Kurs</b> </td>
            <td>
            <input type="number" class="inputform" name="kurs" id="kurs" value="" name="kurs" id="kurs" onchange="hitungjml(1)">
            </td>
            <td class='fonttext'> 5. <b>Keterangan</b> </td>
            <td>
            <textarea name="ket" id="ket" cols="30" rows="20" class="inputform"> </textarea>
            </td>
        </tr>
        <tr>
            <td class='fonttext'> (*) 3. <b>Surat Jalan</b> </td>
            <td><input type='text' class='inputform' name='suratjalan' id='suratjalan' value='' onkeyup="this.value = this.value.toUpperCase();" />
            </td>
            <td class='fonttext'> (*) 6. <b>Tanggal</b> </td>
            <td><input type='date' class='inputform' name='tanggal' id='tanggal' value='' />
            </td>
        </tr>
        <tr>
            <td class='fonttext'> (*) 4. <b>Agen</b> </td>
            <td><input type='text' class='inputform' name='agen' id='agen' value='-' /><input type="hidden" name='kodeagen' id='kodeagen' value="0" >
            </td>
            <td class='fonttext'> 7. <b>PO</b> </td>
            <td><input type='text' class='inputform' name='po' id='po' value='' />
            </td>
        </tr> -->
         <tr height='5'>
         <td colspan='6'></td>
         </tr>
         <tr height='5'>
         <td colspan='6'></td>
         </tr>
    </table>
    <table align='center' width='100%' id='tbl_1'>
    <thead>
        <tr>
       
            <td align='center' width='15%' class='fonttext'>Barcode</td>
            <td align='center' width='15%' class='fonttext'>Nama Bahan</td>
            <td align='center' width='15%' class='fonttext'>Nama Model</td>
            <td align='center' width='10%' class='fonttext'>Warna          
            </td>
            <td align='center' width='13%' class='fonttext'>QTY</td>
            <!-- <td align='center' width='10%' class='fonttext'>@</td>
              <td align='center' width='10%' class='fonttext'>KG</td>
            <td align='center' width='10%' class='fonttext'>Harga USD</td>
            <td align='center' width='10%' class='fonttext'>Harga IDR</td> -->
            <!-- <td align='center' width='10%' class='fonttext'>Jumlah</td> -->
            <td align='center' width='5%'  class='fonttext'>Hapus</td>
        
        </tr>
    </thead>
    </table>
    <table>
    <br>
    <br>
    <br>
    <br>
    <table>
    <td>
    <p><input type='text' name='jum' value='' /><input  type='hidden' name='temp_limit' id='temp_limit' value='' /></p>
    
    </table>
    </form>
    <table>
        Tanda <b>(*)</b> Artinya Wajib Di Isi / Tidak Boleh Kosong
    <tr>
    <td>
    <p>  <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-success" value='Tambah Baris'  id='baru'  onClick='addNewRow1()'>Tambah</button></p>
    </td>
    <!-- <td>
    <p align='center'><input name='print' type='image' src='../../images/simpan.png' value='Cetak' id='print' onClick='cetak()' /></p>
    </td> -->
    <!-- <td>
    <p><input type='button' value='batal' id='tutup' onClick='tutup()' /></p>
    </td> -->
    </tr>
    
    </table>
    
    <script type="text/javascript">
    //autocomplete pada grid
    function get_products(a){  
        // console.log(cust);
        // cust = $("#kodesupp").val();
       $("#product_kode"+a+"").autocomplete("barang_kode.php?", {
        width: 178});
    
       $("#barang_kode"+a+"").result(function(event, data, formatted) {
        var nama = document.getElementById("barang_kode"+a+"").value;
        for(var i=0;i<nama.length;i++){
            var id = nama.split(':');
            if (id[0]=="") continue;
            var barang_id=id[0];
            var barang_name=id[2];
        }
        //console.log(id_pd);
        $.ajax({
            url : 'jualLovdetbarang.php?barang_id='+barang_id,
            dataType: 'json',
            data: "barang_id="+formatted,
            success: function(data) {
            var barang_name  = data.barang_name;
                $("#barang_name"+a+"").val(barang_name);
            var barang_id  = data.barang_id;
                $("#barang_id"+a+"").val(barang_id);
            var barang_harga = data.barang_harga;
                $("#barang_harga"+a+"").val(barang_harga);
            // var hargabarang  = data.jualUS;
            // var hargaidr = data.jualRp
            // 	$("#Harga"+a+"").val(hargabarang);
            // 	$("#HargaIDR"+a+"").val(hargaidr);
            // 	$("#Qty"+a+"").focus();
            }
        });	
                
        });
    }  	
    
    var baris1=1;
    addNewRow1();
    function addNewRow1() 
    {
        
    var tbl = document.getElementById("tbl_1");
    var row = tbl.insertRow(tbl.rows.length);
    row.id = 't1'+baris1;
    
    var td0 = document.createElement("td");
    var td0 = document.createElement("td");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var td6 = document.createElement("td");
    // var td7 = document.createElement("td");
    // var td8 = document.createElement("td");
    // var td9 = document.createElement("td");
    // var td10 = document.createElement("td");
    
    td0.appendChild(generateproduct_id(baris1));
    td0.appendChild(generateproduct_kode(baris1));
    td1.appendChild(generatebarang_name(baris1));
    td2.appendChild(generatebarang_model(baris1));
    td3.appendChild(generatebarang_warna(baris1));
    td4.appendChild(generateqty(baris1));
    td5.appendChild(generatedelete(baris1));
    // td6.appendChild(generateKG(baris1));
    // td7.appendChild(generateHargaUSD(baris1));
    // td8.appendChild(generateHargaIDR(baris1));
    // td9.appendChild(generateJumlah(baris1));
    // td10.appendChild(generateDel1(baris1));
    
    row.appendChild(td0);
    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);
    // row.appendChild(td6);
    // row.appendChild(td7);
    // row.appendChild(td8);
    // row.appendChild(td9);
    // row.appendChild(td10);
    
    
    // document.getElementById('BARCODE'+baris1+'').focus();
    
    document.getElementById('product_id'+baris1+'').setAttribute('onclick', 'delRow1('+baris1+')');
    document.getElementById('barang_name'+baris1+'').setAttribute('onclick', 'popjasa('+baris1+')');
    document.getElementById('barang_warna'+baris1+'').setAttribute('onclick', 'popjasa('+baris1+')');
    document.getElementById('barang_model'+baris1+'').setAttribute('onclick', 'popjasa('+baris1+')');
    // document.getElementById('barang_harga'+baris1+'').setAttribute('onclick', 'hitungjml('+baris1+')');
    // document.getElementById('pelanggan_name'+baris1+'').setAttribute('onclick', 'popjasa('+baris1+')');
    // document.getElementById('departemen'+baris1+'').setAttribute('onclick', 'popjasa('+baris1+')');
    // document.getElementById('karyawan_tipe'+baris1+'').setAttribute('onChange', 'hitungjml('+baris1+')');
    // document.getElementById('KG'+baris1+'').setAttribute('onChange', 'hitungjml('+baris1+')');
    document.getElementById('jumlah'+baris1+'').setAttribute('onChange', 'hitungjml('+baris1+')');
    // document.getElementById('penjualan_detail_total'+baris1+'').setAttribute('onChange', 'hitungjml('+baris1+')');
    // document.getElementById('Jumlah'+baris1+'').setAttribute('onkeydown', 'addnewrow()');
    document.getElementById('delete'+baris1+'').setAttribute('onclick', 'delRow1('+baris1+')');
    get_products(baris1);
    baris1++;
    }
    
    function popjasa(a){
        var width  = 550;
         var height = 400;
         var left   = (screen.width  - width)/2;
         var top    = (screen.height - height)/2;
          var params = 'width='+width+', height='+height+',scrollbars=yes';
        var cust = $("#kodesupp").val();
        var barang = $("#idbarang"+a+"").val();
         params += ', top='+top+', left='+left;
            window.open('lookupHistory.php?baris='+a+'&cust='+cust+'&barang='+barang,'',params);
    };
    
    function hitungtotalqty(){
        var total=0;
        for (var i=1; i<=baris1;i++){
            
            var barang_id=document.getElementById("barang_id"+i+"");
            if 	(barang_id != null)
            {   
                total+= parseFloat(document.getElementById("penjualan_detail_qty"+i+"").value);
            }
        }
        document.getElementById("penjualan_qty_m").value = total;
    }
    
    function hitungtotal(){
        var total=0;
        for (var i=1; i<=baris1;i++){
            
            var barang_kode=document.getElementById("barang_kode"+i+"");
            if 	(barang_kode != null)
            {   
            total+= parseFloat(document.getElementById("penjualan_detail_qty"+i+"").value)* parseFloat(document.getElementById("barang_harga"+i+"").value ) ;
            }
        }
        // 
        // var locale = 'IDR';
        // var options = {style: 'currency', currency: 'IDR', minimumFractionDigits: 2, maximumFractionDigits: 2};
        // var formatter = new Intl.NumberFormat(locale, options);
        // 
        document.getElementById("penjualan_total_m").value = total.toFixed(0);
        // document.getElementById("PPN").value = parseFloat(total.toFixed(0)) * 0.1;
        // document.getElementById("grandtotal").value = (parseFloat(total.toFixed(0)) + parseFloat(total.toFixed(0) * 0.1));
        // 
        // document.getElementById("penjualan_total_m").value = formatter.format(total.toFixed(0));
        // document.getElementById("PPN_m").value = formatter.format(parseFloat(total.toFixed(0)) * 0.1);
        // document.getElementById("grandpenjualan_total_m").value = formatter.format((parseFloat(total.toFixed(0)) + parseFloat(total.toFixed(0) * 0.1)));
            
    }
    
    
    
    function hitungjml(a)
    {
        // if(document.getElementById("KG"+a+"").value == '') {
        //       document.getElementById("KG"+a+"").value = 0;
        // }
        // if(document.getElementById("Harga"+a+"").value == ''){
        //       document.getElementById("Harga"+a+"").value = 0;
        // }
        if(document.getElementById("penjualan_detail_qty"+a+"").value == '') {
              document.getElementById("penjualan_detail_qty"+a+"").value = 0;
        }
        if(document.getElementById("penjualan_detail_total"+a+"").value == ''){
              document.getElementById("penjualan_detail_total"+a+"").value = 0;
        }
        
        var qty = parseFloat(document.getElementById("penjualan_detail_qty"+a+"").value);
        // var kgsatuan = parseFloat(document.getElementById("kgsatuan"+a+"").value);
        // var ke1 = parseFloat(document.getElementById("KG"+a+"").value);
        var ke2 = parseFloat(document.getElementById("barang_harga"+a+"").value);
        var jml=0;
        var total=0;
        var totalkg=0;
        
            total=qty*ke2;
            // console.log($("#KG"+a).val());
    
         document.getElementById("penjualan_detail_total"+a+"").value = total.toFixed(0);
         // document.getElementById("HargaIDR"+a+"").value = ke2.toFixed(2);
         // document.getElementById("Jumlah"+a+"").value = jml.toFixed(0);	
         hitungtotal();
         hitungtotalqty();
        
        
    }
    
    function generateproduct_id(index){
    var idx = document.createElement("input");
    idx.type = "hidden";
    idx.name = "product_id"+index+"";
    idx.id = "product_id"+index+"";
    idx.size="15";
    idx.align = "left";
    return idx;
    }
    
    function generateproduct_kode(index) {
    var idx = document.createElement("input");
    idx.type = "text";
    idx.name = "product_kode"+index+"";
    idx.id = "product_kode"+index+"";
    idx.size = "10";
    idx.align = "center";
    return idx;
    }
    
    function generatebarang_name(index) {
    var idx = document.createElement("input");
    idx.type = "text";
    idx.name = "barang_name"+index+"";
    idx.id = "barang_name"+index+"";
    idx.size = "18";
    idx.readOnly = "readonly";
    return idx;
    }
    
    function generatebarang_model(index) {
    var idx = document.createElement("input");
    idx.type = "text";
    idx.name = "barang_model"+index+"";
    idx.id = "barang_model"+index+"";
    idx.size = "18";
    idx.readOnly = "readonly";
    return idx;
    }

    function generatebarang_warna(index) {
    var idx = document.createElement("input");
    idx.type = "text";
    idx.name = "barang_warna"+index+"";
    idx.id = "barang_warna"+index+"";
    idx.size = "18";
    idx.readOnly = "readonly";
    return idx;
    }
    
    function generateqty(index) {
    var idx = document.createElement("input");
    idx.type = "number";
    idx.name = "penjualan_detail_qty"+index+"";
    idx.id = "penjualan_detail_qty"+index+"";
    idx.size = "10";
    idx.align = "center";
    return idx;
    }
    
    // function generatetotal(index) {
    // var idx = document.createElement("input");
    // idx.type = "number";
    // idx.name = "penjualan_detail_total"+index+"";
    // idx.id = "penjualan_detail_total"+index+"";
    // idx.size = "20";
    // idx.align = "center";
    // return idx;
    // }
    
    function generatedelete(index) {
    var idx = document.createElement("input");
    idx.type = "button";
    idx.value = "x";
    idx.name = "delete"+index+"";
    idx.id = "delete"+index+"";
    idx.size = "10";
    idx.style="text-align:right;";
    return idx;
    }
    
    // function generateKG(index) {
    // var idx = document.createElement("input");
    // idx.type = "text";
    // idx.name = "KG"+index+"";
    // idx.id = "KG"+index+"";
    // idx.size = "10";
    // idx.style="text-align:right;";
    // return idx;
    // }
    
    // function generateHargaUSD(index) {
    // var idx = document.createElement("input");
    // idx.type = "text";
    // idx.name = "Harga"+index+"";
    // idx.id = "Harga"+index+"";
    // idx.size = "15";
    // idx.style="text-align:right;";
    // return idx;
    // }
    
    // function generateHargaIDR(index) {
    // var idx = document.createElement("input");
    // idx.type = "text";
    // idx.name = "HargaIDR"+index+"";
    // idx.id = "HargaIDR"+index+"";
    // idx.size = "15";
    // idx.style="text-align:right;";
    // idx.readOnly="readonly";
    // return idx;
    // }
    
    // function generateJumlah(index) {
    // var idx = document.createElement("input");
    // idx.type = "text";
    // idx.name = "Jumlah"+index+"";
    // idx.id = "Jumlah"+index+"";
    // idx.size = "15";
    // idx.style="text-align:right;";
    // return idx;
    // }
    
    function generateDel1(index) {
    var idx = document.createElement("input");
    idx.type = "button";
    idx.name = "del1"+index+"";
    idx.id = "del1"+index+"";
    idx.size = "10";
    idx.value = "X";
    return idx;
    
    }
    
    function delRow1(id){ 
        var el = document.getElementById("t1"+id);
        baris1-=1;
        el.parentNode.removeChild(el);
        return false;
    }
    
    
    
    function hitungrow() 
    {
        document.form2.jum.value= baris1;
        // var barang_id = document.getElementById('barang_id').value= baris1;  
        // var pengujian_detail_qty = document.getElementById('pengujian_detail_qty').value= baris1;  
        // var pengujian_detail_qty = document.getElementById('pengujian_detail_qty').value= bari;  
    }
    
    function tutup(){
    window.close();
    }
    
    function cetak(){
        var pesan        = '';
        var total      = document.getElementById("penjualan_total_m").value;
        var pelanggan	 = document.getElementById("pelanggan_id").value;
        var qty		 = document.getElementById("penjualan_qty_m").value;
        var penjualan_tanggal = document.getElementById("penjualan_tanggal").value;
    
            if(pelanggan == ''){
            pesan='Nama Pelanggan Tidak Boleh Kosong';	
            }else if(total == ""){
            pesan ="total harus di isi";
            }
            else if(qty == ''){
            pesan='Kuantitas Tidak boleh kosong';	
            }else if(penjualan_tanggal == ''){
            pesan='Tanggal Transaksi Tidak Boleh Kosong';	
            }
    
            var arr_idbarang=[];
            for (i=1;i<(baris1);i++){
                arr_idbarang[i-1] = document.getElementById("barang_id"+i+"");	
                    if (arr_idbarang[i-1]){
                    arr_idbarang[i-1].value;
                    if(arr_idbarang[i-1].value == ""){
                        pesan = 'Masukan Nama Barang Kembali\n';	
                    }
                    } 
                }
                    
        if (pesan != '') {
            alert('Maaf, ada kesalahan pengisian Nota : \n'+pesan);
            return false;
        }
        else
        {	var answer = confirm("Mau Simpan datanya????")
            if (answer)
            {	
            hitungrow();
            
            // hitung() ; 
            document.form2.action="simpan.php?action=add";
            document.form2.submit();
            }
            else
            {}
        } 
    }	
    
    document.onkeydown = function (e) {
                    switch (e.keyCode) {
                        // esc
                        case 27:
                            //setTimeout('self.location.href="logout.php"', 0);
                            //alert('esc');
                            tutup();
                            break;
                        case 113:
                            //setTimeout('self.location.href="logout.php"', 0);
                            //alert('f2');
                            addNewRow1();
                            break;
                        // f4
                        case 115:
                            //setTimeout('self.location.href="help.php"', 0);
                            //alert('f3');
                            cetak();
                            break;
                    }
                    //menghilangkan fungsi default tombol
                    //e.preventDefault();
                };
        
                function lookupHistory(index){
                    var barang = $("#kodesupp").val();
                    var cust = $("#idbarang"+index+"").val();
                    window.open("lookupHistory.php?cust="+cust+"&barang="+barang+"&baris="+index+"");
                }
    </script>
    
    </body><?php /**PATH D:\web\resources\views/dashboard/toko/detailpenjualanproduk.blade.php ENDPATH**/ ?>