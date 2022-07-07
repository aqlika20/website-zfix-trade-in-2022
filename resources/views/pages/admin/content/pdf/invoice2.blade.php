<!DOCTYPE html>
<html>
    <head>
        <title>Invoice</title>
        <style type='text/css'>
        
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        .row:before, .row:after {
        content: " ";
        display: table;
        }
        .row:after {
        clear: both;
        }

        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-right: 20px;
        }

        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
        float: left;
        }

        .col-xs-1 {
        width: 8.33333%;
        }

        .col-xs-2 {
        width: 16.66667%;
        }

        .col-xs-3 {
        width: 25%;
        }

        .col-xs-4 {
        width: 33.33333%;
        }

        .col-xs-5 {
        width: 41.66667%;
        }

        .col-xs-6 {
        width: 50%;
        }

        .col-xs-7 {
        width: 58.33333%;
        }

        .col-xs-8 {
        width: 66.66667%;
        }

        .col-xs-9 {
        width: 75%;
        }

        .col-xs-10 {
        width: 83.33333%;
        }

        .col-xs-11 {
        width: 91.66667%;
        }

        .col-xs-12 {
        width: 100%;
        }

        .col-xs-pull-0 {
        right: auto;
        }

        .col-xs-pull-1 {
        right: 8.33333%;
        }

        .col-xs-pull-2 {
        right: 16.66667%;
        }

        .col-xs-pull-3 {
        right: 25%;
        }

        .col-xs-pull-4 {
        right: 33.33333%;
        }

        .col-xs-pull-5 {
        right: 41.66667%;
        }

        .col-xs-pull-6 {
        right: 50%;
        }

        .col-xs-pull-7 {
        right: 58.33333%;
        }

        .col-xs-pull-8 {
        right: 66.66667%;
        }

        .col-xs-pull-9 {
        right: 75%;
        }

        .col-xs-pull-10 {
        right: 83.33333%;
        }

        .col-xs-pull-11 {
        right: 91.66667%;
        }

        .col-xs-pull-12 {
        right: 100%;
        }

        .col-xs-push-0 {
        left: auto;
        }

        .col-xs-push-1 {
        left: 8.33333%;
        }

        .col-xs-push-2 {
        left: 16.66667%;
        }

        .col-xs-push-3 {
        left: 25%;
        }

        .col-xs-push-4 {
        left: 33.33333%;
        }

        .col-xs-push-5 {
        left: 41.66667%;
        }

        .col-xs-push-6 {
        left: 50%;
        }

        .col-xs-push-7 {
        left: 58.33333%;
        }

        .col-xs-push-8 {
        left: 66.66667%;
        }

        .col-xs-push-9 {
        left: 75%;
        }

        .col-xs-push-10 {
        left: 83.33333%;
        }

        .col-xs-push-11 {
        left: 91.66667%;
        }

        .col-xs-push-12 {
        left: 100%;
        }

        .col-xs-offset-0 {
        margin-left: 0%;
        }

        .col-xs-offset-1 {
        margin-left: 8.33333%;
        }

        .col-xs-offset-2 {
        margin-left: 16.66667%;
        }

        .col-xs-offset-3 {
        margin-left: 25%;
        }

        .col-xs-offset-4 {
        margin-left: 33.33333%;
        }

        .col-xs-offset-5 {
        margin-left: 41.66667%;
        }

        .col-xs-offset-6 {
        margin-left: 50%;
        }

        .col-xs-offset-7 {
        margin-left: 58.33333%;
        }

        .col-xs-offset-8 {
        margin-left: 66.66667%;
        }

        .col-xs-offset-9 {
        margin-left: 75%;
        }

        .col-xs-offset-10 {
        margin-left: 83.33333%;
        }

        .col-xs-offset-11 {
        margin-left: 91.66667%;
        }

        .col-xs-offset-12 {
        margin-left: 100%;
        }

        .table1 {
        width: 100%;
        max-width: 450px;
        min-width: 350px;
        border-collapse: collapse;
        }

        .table2 {
        width: 100%;
        max-width: 350px;
        min-width: 250px;
        border-collapse: collapse;
        }

        .table3 {
        width: 100%;
        max-width: 350px;
        min-width: 250px;
        border-collapse: collapse;
        }

        .text-center{
            text-align: center;
        }
        .center {
        text-align: center;
        }
        </style>
    </head>
    <body>
    
        <div class="row">
            <div class="col-xs-4">
                <!-- <img src="{{ public_path('media/pdf/header.png') }}" width="250" height="55"> -->
            </div>
            
            <div class="col-xs-8">
                <p style="font-weight: bold; font-size: 30px;">{{ Helper::capitalize($currentUser->name) }}</p>
                <p>{{$currentUser->address}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4" style="line-height: 0.5;">
            </div>
            <div class="col-xs-7" style="line-height: 0.5;">
            	<p class="center" style="font-size: 25px;">Faktur Penjualan</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5" style="line-height: 0.1;">
            	<hr style="height:2px;border-width:0;color:black;background-color:black">
            	<p style="line-height: 0.1;">Kepada :</p>
                <hr style="height:2px;border-width:0;color:black;background-color:black">
                <p style="font-weight: bold; line-height: 0.1;">PT. Zanna Inifiniti Fixindo</p>
            </div>
            
            <div class="col-xs-5" style="line-height: 0.1;">
                <table class="table1" style="margin-left: 30px">
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-left: solid; border-right: dashed; border-bottom: dashed;">
                            <p style="line-height: 0.1;">Tanggal</p>
                            <p style="font-weight: bold;">{{$tanggal}}</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: dashed;"> 
                            <p style="line-height: 0.1;">Nomor</p>
                            <p style="font-weight: bold;">SI.{{$year}}.{{$month}}.{{$nomor_urut}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: dashed; border-bottom: dashed;">
                            <p style="line-height: 0.1;">Syarat Pembayaran</p>
                            <p style="font-weight: bold;">C.O.D</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-right: solid; border-bottom: dashed;"> 
                            <p style="line-height: 0.1;">FOB</p>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: dashed; border-bottom: dashed;">
                            <p style="line-height: 0.1;">Ekspedisi</p>
                            <br>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-right: solid; border-bottom: dashed;"> 
                            <p style="line-height: 0.1;">Tanggal Pengiriman</p>
                            <p style="font-weight: bold;">{{$tanggal}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: dashed; border-bottom: solid;">
                            <p style="line-height: 0.1;">PO No</p>
                            <br>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-right: solid; border-bottom: solid;"> 
                            <p style="line-height: 0.1;">Mata Uang</p>
                            <p style="font-weight: bold;">Indonesian Rupiah</p>
                        </td>
                    </tr>
                </table>
            
            </div>
        </div>
        
        <br>
 		<table class="table1">
            <tr>
                <th style="border: 1px solid black;">
                    Kode Voucher
                </th>
                <th style="border: 1px solid black;">
                    Nama Barang
                </th>
                <th style="border: 1px solid black;">
                    Kts.
                </th>
                <th style="border: 1px solid black;">
                    @Harga
                </th>
                <th style="border: 1px solid black;">
                    Diskon
                </th>
                <th style="border: 1px solid black;">
                    Total Harga 
                </th>
            </tr>
            <tr>
                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
            <?php $sum_laptop_Price = 0 ?>
			@foreach ($process_selesai_laptop as $psl)
                {{$psl->vouchers->voucher_key}}<br><br>
            <?php $sum_laptop_Price += str_replace(".", "",$psl->price) ?>
            @endforeach
            
            <?php $sum_tv_Price = 0 ?>
            @foreach ($process_selesai_tv as $pst)
                {{$pst->vouchers->voucher_key}}<br><br>
            <?php $sum_tv_Price += str_replace(".", "",$pst->price) ?>
            @endforeach

            <?php $sum_ps_Price = 0 ?>
            @foreach ($process_selesai_ps as $psp)
                {{$psp->vouchers->voucher_key}}<br><br>
            <?php $sum_ps_Price += str_replace(".", "",$psp->price) ?>
            @endforeach

            <?php $sum_kulkas_Price = 0 ?>
            @foreach ($process_selesai_kulkas as $kulkas)
                {{$kulkas->vouchers->voucher_key}}<br><br>
            <?php $sum_kulkas_Price += str_replace(".", "",$kulkas->price) ?>
            @endforeach

            <?php $sum_mesin_cuci_Price = 0 ?>
            @foreach ($process_selesai_mesin_cuci as $psmc)
                {{$psmc->vouchers->voucher_key}}<br><br>
            <?php $sum_mesin_cuci_Price += str_replace(".", "",$psmc->price) ?>
            @endforeach
                </td>
                
                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
			@foreach ($process_selesai_laptop as $psl)
                Laptop {{$psl->brand}} {{$psl->memory}}/{{$psl->storages}} ({{$psl->brand}})<br><br>
            @endforeach
            
            @foreach ($process_selesai_tv as $pst)
                TV {{$pst->brand}} {{$pst->inch}} ({{$pst->addition}})<br><br>
            @endforeach

            @foreach ($process_selesai_ps as $psp)
                 {{$psp->jenis_ps}} {{$psp->type}} {{$psp->storages}} {{$psp->addition}}<br><br>
            @endforeach

            @foreach ($process_selesai_kulkas as $kulkas)
                Kulkas {{$kulkas->brand}} {{$kulkas->model}} <br><br>
            @endforeach

            @foreach ($process_selesai_mesin_cuci as $psmc)
               Mesin Cuci {{$psmc->brand}} {{$psmc->type}}<br><br>
            @endforeach
                </td>

                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
                @foreach ($process_selesai_laptop as $psl)
               1<br><br>
            @endforeach
            
            @foreach ($process_selesai_tv as $pst)
               1<br><br>
            @endforeach

            @foreach ($process_selesai_ps as $psp)
               1<br><br>
            @endforeach

            @foreach ($process_selesai_kulkas as $kulkas)
                1<br><br>
            @endforeach

            @foreach ($process_selesai_mesin_cuci as $psmc)
                1<br><br>
            @endforeach
                </td>

                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
            @foreach ($process_selesai_laptop as $psl)
                {{ Helper::moneyFormat($psl->price)}}<br><br>
            @endforeach
            
            @foreach ($process_selesai_tv as $pst)
              {{ Helper::moneyFormat($pst->price)}}<br><br>
            @endforeach

            @foreach ($process_selesai_ps as $psp)
                {{ Helper::moneyFormat($psp->price)}}<br><br>
            @endforeach

            @foreach ($process_selesai_kulkas as $kulkas)
               {{ Helper::moneyFormat($kulkas->price)}} <br><br>
            @endforeach

            @foreach ($process_selesai_mesin_cuci as $psmc)
              {{ Helper::moneyFormat($psmc->price)}}<br><br>
            @endforeach
                </td>
				
                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
                </td>
                
                <td class="text-center" style="border: 1px solid black; padding-bottom: 0px;">
            @foreach ($process_selesai_laptop as $psl)
                {{ Helper::moneyFormat($psl->price)}}<br><br>
            @endforeach
            
            @foreach ($process_selesai_tv as $pst)
              {{ Helper::moneyFormat($pst->price)}}<br><br>
            @endforeach

            @foreach ($process_selesai_ps as $psp)
                {{ Helper::moneyFormat($psp->price)}}<br><br>
            @endforeach

            @foreach ($process_selesai_kulkas as $kulkas)
               {{ Helper::moneyFormat($kulkas->price)}} <br><br>
            @endforeach

            @foreach ($process_selesai_mesin_cuci as $psmc)
              {{ Helper::moneyFormat($psmc->price)}}<br><br>
            @endforeach
                </td>
                

            </tr>
        </table>
        
        <hr style="height:2px;border-width:0;color:black;background-color:black">
        <table>
            <tr>
                <td style="line-height: 0.1;">Terbilang :</td>
                <td style="line-height: 0.1;">
                    <?php $total = $sum_laptop_Price + $sum_ps_Price + $sum_tv_Price + $sum_kulkas_Price + $sum_mesin_cuci_Price ?>     
                    <p style="font-weight: bold;">{{ Helper::capitalize(Terbilang::angka($total)) }}</p>
                </td>
            </tr>
        </table>
         <!-- <div class="row">
             <div class="col-xs-2">
               <p>Terbilang :</p>
             </div>

             <div class="col" style="border: 1px; "> 
             
             </div>
        </div> -->
        
        <div class="row">
             <div class="col-xs-7">
               <!-- <textarea rows="13" cols="60" placeholder="Keterangan"></textarea> -->
               <table class="table2">
                   <tr>
                       <td style="border: 1px solid; line-height: 11;">
                            <br>
                       </td>
                   </tr>
               </table>
             </div>
             

             <div class="col-xs-4">
                <table class="table3">
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; border-left: solid; line-height: 0.1;">
                            <p>Sub Total</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; line-height: 0.1; text-align: right;"> 
                            <?php $total = $sum_laptop_Price + $sum_ps_Price + $sum_tv_Price + $sum_kulkas_Price + $sum_mesin_cuci_Price ?>
                            <p> {{ Helper::moneyFormat($total)}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: solid; border-bottom: solid; border-left: solid; line-height: 0.1;">
                            <p>Diskon</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; line-height: 0.1; text-align: right;"> 
                            <p>0</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: solid; border-bottom: solid; border-left: solid; line-height: 0.1;">
                            <p>PPN(%)</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; line-height: 0.1; text-align: right;"> 
                            <p>0</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-left: solid; border-right: solid; border-bottom: solid; border-left: solid; line-height: 0.1;">
                            <p>Biaya Lain-lain</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; line-height: 0.1; text-align: right;"> 
                            <p>0</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; border-left: solid; line-height: 0.1; font-weight: bold;">
                            <p>Total</p>
                        </td>
                        <td style="padding-left: 15px; padding-right: 15px; padding-bottom: 0px; border: 1px; border-top: solid; border-right: solid; border-bottom: solid; line-height: 0.1; font-weight: bold; text-align: right; "> 
                        <?php $total = $sum_laptop_Price + $sum_ps_Price + $sum_tv_Price + $sum_kulkas_Price + $sum_mesin_cuci_Price ?>
                            <p style="font-weight: bold;"> {{ Helper::moneyFormat($total)}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
 <br>
        <div class="row center">
            <div class="col-xs-3">
                <p>Disiapkan Oleh</p>
                <br>
                <br>
                <br>
                <hr style="height:2px;border-width:0;color:black;background-color:black">
                <p style="text-align: left;">Tgl.</p>
            </div>

            <div class="col-xs-3">      
                <p>Disetujui Oleh</p>
                <br>
                <br>
                <br>
                <hr style="height:2px;border-width:0;color:black;background-color:black">
                <p style="text-align: left;">Tgl.</p>
            </div>
      </div>

    </body>
</html>