{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">					
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Dashboard-->
                    <!--begin card-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Inbox 
                            </div>
                            <div class="card-toolbar">
                                <!-- <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_tolak">Selesai</a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                        
                        <div class="card-body">
                             <!--begin::Body-->
                             <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables11">
                                    <!--begin::Tap pane-->
                                    
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <!-- <div class="tab-pane fade " id="tab_tolak" role="tabpanel" aria-labelledby="tab_tolak"> -->
                                        <!--begin::Table-->
                                        <div class="mb-7">
                                            <div class="row align-items-center">
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_selesais" />
                                                                <span>
                                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <form action="invoice" method="POST" enctype="multipart/form-data" id="filter_form">
                                                            @csrf
                                                            @if($currentUser->roles_id == 4)
                                                            <br>
                                                            <div class="form-group row">
                                                                <div class="col-md-10">
                                                                    <div class="input-group from_date" data-target-input="nearest">
                                                                        <input type="text" class="form-control datetimepicker-input" id="from_date" placeholder="From date" data-target="#date" name="from_date" readonly/>
                                                                        <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                                                                            <span class="input-group-text">
                                                                                <i class="ki ki-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                           
                                                                <div class="col-md-10" >
                                                                    <div class="input-group to_date" data-target-input="nearest">
                                                                        <input type="text" class="form-control datetimepicker-input" id="to_date" placeholder="To date" data-target="#date" name="to_date" readonly/>
                                                                        <div class="input-group-append" data-target="#to_date" data-toggle="datetimepicker">
                                                                            <span class="input-group-text">
                                                                                <i class="ki ki-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <a href="{{ route('generateInvoices') }}" class="btn btn-secondary">Cetak Invoice</a> --}}
                                                            <button type="submit" class="btn btn-primary btn-sm" name="exportPDF">Export</button>
                                                            @endif
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Search Form-->
                                        <!--begin: Datatable-->
                                        <table class="datatable cell-border" id="tb_selesai">
                                        <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Jenis Trade</th>
                                                        <th>Voucher</th>
                                                        <th>Price</th>
                                                        <th>Tanggal</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_selesai_laptop as $psl)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $psl->users->name }}</td>
                                                        <td>Laptop</td>
                                                        <td>{{$psl->vouchers->voucher_key}}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($psl->price) }}</td>
                                                        <td>{{$psl->created_at->isoFormat('Y-M-D')}}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $psl->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($process_selesai_tv as $pst)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pst->users->name }}</td>
                                                        <td>Televisi</td>
                                                        <td>{{$pst->vouchers->voucher_key}}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pst->price) }}</td>
                                                        <td>{{$pst->created_at->isoFormat('Y-M-D')}}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $pst->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($process_selesai_ps as $psp)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $psp->users->name }}</td>
                                                        <td>Playstation</td>
                                                        <td>{{$psp->vouchers->voucher_key}}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($psp->price) }}</td>
                                                        <td>{{$psp->created_at->isoFormat('Y-M-D')}}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $psp->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                                @foreach ($process_selesai_kulkas as $kulkas)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $kulkas->users->name }}</td>
                                                        <td>Kulkas</td>
                                                        <td>{{$kulkas->vouchers->voucher_key}}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($kulkas->price) }}</td>
                                                        <td>{{$kulkas->created_at->isoFormat('Y-M-D')}}</td>
                                                        <td>
                                                            <a href="{{route('kulkas-trade.detail', ['id' => $kulkas->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($process_selesai_mesin_cuci as $psmc)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $psmc->users->name }}</td>
                                                        <td>Mesin Cuci</td>
                                                        <td>{{$psmc->vouchers->voucher_key}}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($psmc->price) }}</td>
                                                        <td>{{$psmc->created_at->isoFormat('Y-M-D')}}</td>
                                                        <td>
                                                            <a href="{{route('mesin-cuci-trade.detail', ['id' => $psmc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    <!-- </div> -->
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end: Body-->   
                        </div>
                    </div>
                    <!--end card-->
                    <!--begin::Row-->
                    
                    <!--end::Row-->
                    <!--end::Dashboard-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    $('#available').tab('show')

    $('#filter').click(function() {
        if ($('#from_date').val() == "" || $('#to_date').val() == "") {
            return alert("Fill date filter.");
        }
        $('#filter_form').submit();
        
    });

    $('#from_date').datepicker({
        format: 'yyyy-mm-dd', 
        orientation: "bottom left"
    });
    $('#to_date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left"

    });
</script>
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection