{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">					
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!-- <img src="{{ asset('media/pdf/header.png') }}">  -->
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
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_approved">Approved</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_selesai">Selesai</a>
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
                                                        <th>Memory RAM</th>
                                                        <th>Storage</th>
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
                                                        <td>{{ $pb->memory }}</td>
                                                        <td>{{ $pb->storages }}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pb->price) }}</td>
                                                        <td>
                                                            <a href="{{route('laptop-trade.detail', ['id' => $pb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
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
                                                        <th>Memory RAM</th>
                                                        <th>Storage</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_laptop as $pl)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pl->users->name }}</td>
                                                        <td>{{ $pl->brand }}</td>
                                                        <td>{{ $pl->memory }}</td>
                                                        <td>{{ $pl->storages }}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pl->price) }}</td>
                                                        <td>
                                                            <a href="{{route('laptop-trade.detail', ['id' => $pl->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>

                                    <div class="tab-pane fade " id="tab_approved" role="tabpanel" aria-labelledby="tab_approved">
                                        <!--begin::Table-->
                                        <div class="mb-7">
                                            <div class="row align-items-center">
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_approveds" />
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
                                        <table class="datatable cell-border" id="tb_approved">
                                        <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Brand</th>
                                                        <th>Memory RAM</th>
                                                        <th>Storage</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $num = 0
                                                @endphp
                                                @foreach ($process_approve as $pa)
                                                    <tr>
                                                        <td>{{ $num+=1 }}</td>
                                                        <td>{{ $pa->users->name }}</td>
                                                        <td>{{ $pa->brand }}</td>
                                                        <td>{{ $pa->memory }}</td>
                                                        <td>{{ $pa->storages }}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pa->price) }}</td>
                                                        <td>
                                                            <a href="{{route('laptop-trade.detail', ['id' => $pa->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
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
                                                        <th>Memory RAM</th>
                                                        <th>Storage</th>
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
                                                        <td>{{ $pr->memory }}</td>
                                                        <td>{{ $pr->storages }}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pr->price) }}</td>
                                                        <td>
                                                            <a href="{{route('laptop-trade.detail', ['id' => $pr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>

                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade " id="tab_selesai" role="tabpanel" aria-labelledby="tab_selesai">
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
                                                            @if($currentUser->roles_id == 4)
                                                            <br>
                                                            <a href="{{ route('generate_laptop_partner') }}" class="btn btn-secondary">Surat Claim</a>
                                                            @endif
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
                                                        <th>Memory RAM</th>
                                                        <th>Storage</th>
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
                                                        <td>{{ $pt->memory }}</td>
                                                        <td>{{ $pt->storages }}</td>
                                                        <td>Rp. {{ Helper::moneyFormat($pt->price) }}</td>
                                                        <td>
                                                            <a href="{{route('laptop-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                            
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