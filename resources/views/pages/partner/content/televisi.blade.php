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
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
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
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_tolak">Selesai</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="card-body">
                             <!--begin::Body-->
                             <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables11">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="tab_baru" role="tabpanel" aria-labelledby="tab_baru">
                                        <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <p></p>
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_barus" />
                                                                    <span>
                                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Search Form-->
                                            <!--begin: Datatable-->
                                            <table class="datatable cell-border" id="tb_baru">
                                                <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Brand</th>
                                                        <th>Jenis Tv</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_baru as $pb)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pb->users->name }}</td>
                                                        <td>{{ $pb->brand }}</td>
                                                        <td>{{ $pb->jenis_tv }}</td>
                                                        <td>Rp. {{ $pb->price }}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $pb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>                                                    
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="tab_proses" role="tabpanel" aria-labelledby="tab_proses">
                                        <!--begin::Table-->
                                        <div class="mb-7">
                                            <div class="row align-items-center">
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_proseses" />
                                                                <span>
                                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <!--end::Search Form-->
                                        <!--begin: Datatable-->
                                        <table class="datatable cell-border" id="tb_proses">
                                        <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Brand</th>
                                                        <th>Jenis Tv</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_tv as $pte)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pte->users->name }}</td>
                                                        <td>{{ $pte->brand }}</td>
                                                        <td>{{ $pte->jenis_tv }}</td>
                                                        <td>Rp. {{ $pte->price }}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $pte->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="tab_tolak" role="tabpanel" aria-labelledby="tab_tolak">
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
                                                        <th>Brand</th>
                                                        <th>Jenis Tv</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_tolak as $pt)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pt->users->name }}</td>
                                                        <td>{{ $pt->brand }}</td>
                                                        <td>{{ $pt->jenis_tv }}</td>
                                                        <td>Rp. {{ $pt->price }}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <div class="tab-pane fade " id="tab_rejected" role="tabpanel" aria-labelledby="tab_rejected">
                                        <!--begin::Table-->
                                        <div class="mb-7">
                                            <div class="row align-items-center">
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_rejects" />
                                                                <span>
                                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <!--end::Search Form-->
                                        <!--begin: Datatable-->
                                        <table class="datatable cell-border" id="tb_reject">
                                        <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Brand</th>
                                                        <th>Jenis Tv</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_rejected as $pr)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pr->users->name }}</td>
                                                        <td>{{ $pr->brand }}</td>
                                                        <td>{{ $pr->jenis_tv }}</td>
                                                        <td>Rp. {{ $pr->price }}</td>
                                                        <td>
                                                            <a href="{{route('tv-trade.detail', ['id' => $pr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
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
</script>
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection