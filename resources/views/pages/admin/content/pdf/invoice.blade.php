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
        padding-left: 15px;
        padding-right: 15px;
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

        table, td, th {
        border: 1px solid black;
        }

        table {
        width: 100%;
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
            <div class="col-xs-7">
                <img src="{{ public_path('media/pdf/header.png') }}" width="300" height="55">
            </div>
            
            <div class="col-xs-7">      
                <img src="{{ public_path('media/pdf/right_header.png') }}" width="200" height="50">
            </div>
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">

        <div style="margin-left:30px;">
            <p>Nama Partner : {{$currentUser->name}}</p>
            <p>Nomor HP Partner : {{$currentUser->contact}} </p>
            <p>Alamat Partner : {{$currentUser->address}}</p>
            <p>Nomor Invoice: {{$number}} </p>
        </div>
        <br>

        <table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
                <th>Jenis Trade</th>
				<th>Voucher Key</th>
                <th>Price</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            <?php $sum_laptop_Price = 0 ?>
			@foreach ($process_selesai_laptop as $psl)
            <tr>
                <td>{{ $i++}}</td>
                <td>Laptop</td>
                <td>{{$psl->vouchers->voucher_key}}</td>
                <td>Rp. {{ $psl->price }}</td>
            </tr>
            <?php $sum_laptop_Price += str_replace(".", "",$psl->price) ?>
            @endforeach

            <?php $sum_tv_Price = 0 ?>
            @foreach ($process_selesai_tv as $pst)
            <tr>
                <td>{{ $i++}}</td>
                <td>Televisi</td>
                <td>{{$pst->vouchers->voucher_key}}</td>
                <td>Rp. {{ $pst->price }}</td>
                
            </tr>
            <?php $sum_tv_Price += str_replace(".", "",$pst->price) ?>
            @endforeach

            <?php $sum_ps_Price = 0 ?>
            @foreach ($process_selesai_ps as $psp)
            <tr>
                <td>{{ $i++}}</td>
                <td>Playstation</td>
                <td>{{$psp->vouchers->voucher_key}}</td>
                <td>Rp. {{ $psp->price }}</td>
            </tr>
            <?php $sum_ps_Price += str_replace(".", "",$psp->price) ?>
            @endforeach

            <?php $sum_kulkas_Price = 0 ?>
            @foreach ($process_selesai_kulkas as $kulkas)
            <tr>
                <td>{{ $i++}}</td>
                <td>Kulkas</td>
                <td>{{$kulkas->vouchers->voucher_key}}</td>
                <td>Rp. {{ $kulkas->price }}</td>
            </tr>
            <?php $sum_kulkas_Price += str_replace(".", "",$kulkas->price) ?>
            @endforeach

            <?php $sum_mesin_cuci_Price = 0 ?>
            @foreach ($process_selesai_mesin_cuci as $psmc)
            <tr>
                <td>{{ $i++}}</td>
                <td>Playstation</td>
                <td>{{$psmc->vouchers->voucher_key}}</td>
                <td>Rp. {{ $psmc->price }}</td>
            </tr>
            <?php $sum_mesin_cuci_Price += str_replace(".", "",$psmc->price) ?>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <?php $total = $sum_laptop_Price + $sum_ps_Price + $sum_tv_Price + $sum_kulkas_Price + $sum_mesin_cuci_Price ?>
                <!-- <td>{{$sum_tv_Price}} + {{$sum_ps_Price}} + {{$sum_laptop_Price}} + {{$sum_kulkas_Price}} + {{$sum_mesin_cuci_Price}}</td> -->
                <td>Rp. {{number_format($total)}}</td>
            </tr>
		</tbody>
	</table>

    </body>
</html>