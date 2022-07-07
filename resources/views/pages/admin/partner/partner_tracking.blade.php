{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin card-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#hp_collapse">
                                <h3 class="card-label">Handphone/Tablet
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_hp_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_hp_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_hp_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_hp_selesai">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_hp_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="laptop_collapse" class="collapse show">
                            <div class="card-body">
                                <!--begin::Body-->
                                <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_hp_baru" role="tabpanel" aria-labelledby="tab_hp_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_barus" />
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
                                                <table class="datatable cell-border" id="tb_hp_baru">
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
                                                    @foreach ($hp_baru as $hb)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $hb->users->name }}</td>
                                                            <td>{{ $hb->brand }}</td>
                                                            <td>{{ $hb->ram }}</td>
                                                            <td>{{ $hb->storages }}</td>
                                                            <td>Rp. {{ $hb->price }}</td>
                                                            <td>
                                                                <a href="{{route('handphone-trade.detail', ['id' => $hb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_hp_proses" role="tabpanel" aria-labelledby="tab_hp_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_proseses" />
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
                                            <table class="datatable cell-border" id="tb_hp_proses">
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
                                                    @foreach ($hp_process as $hp)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $hp->users->name }}</td>
                                                            <td>{{ $hp->brand }}</td>
                                                            <td>{{ $hp->ram }}</td>
                                                            <td>{{ $hp->storages }}</td>
                                                            <td>Rp. {{ $hp->price }}</td>
                                                            <td>
                                                                <a href="{{route('handphone-trade.detail', ['id' => $hp->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <div class="tab-pane fade " id="tab_hp_rejected" role="tabpanel" aria-labelledby="tab_hp_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_rejects" />
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
                                            <table class="datatable cell-border" id="tb_hp_reject">
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
                                                    @foreach ($hp_rejected as $hr)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $hr->users->name }}</td>
                                                            <td>{{ $hr->brand }}</td>
                                                            <td>{{ $hr->ram }}</td>
                                                            <td>{{ $hr->storages }}</td>
                                                            <td>Rp. {{ $hr->price }}</td>
                                                            <td>
                                                                <a href="{{route('handphone-trade.detail', ['id' => $hr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_hp_selesai" role="tabpanel" aria-labelledby="tab_hp_selesai">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_selesais" />
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
                                            <form method="POST" action="{{ route('handphone-trade.handphone_update') }}">
                                            <table class="datatable cell-border" id="tb_hp_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Memory RAM</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($hp_tolak as $ht)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $ht->users->name }}</td>
                                                            <td>{{ $ht->brand }}</td>
                                                            <td>{{ $ht->ram }}</td>
                                                            <td>{{ $ht->storages }}</td>
                                                            <td>{{$ht->vouchers->voucher_key}}</td>
                                                            <td>Rp. {{ $ht->price }}</td>
                                                            <td>
                                                                <a href="{{route('handphone-trade.detail', ['id' => $ht->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>

                                                            <td>
                                                                <label class="form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="id[]" value="{{$ht->id}}">
                                                                </label>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>
                                        
                                        <div class="tab-pane fade " id="tab_hp_claimed" role="tabpanel" aria-labelledby="tab_hp_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_selesais" />
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
                                            <table class="datatable cell-border" id="tb_hp_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Memory RAM</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($hp_partner_claimed as $hpc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $hpc->users->name }}</td>
                                                            <td>{{ $hpc->brand }}</td>
                                                            <td>{{ $hpc->ram }}</td>
                                                            <td>{{ $hpc->storages }}</td>
                                                            <td>{{$hpc->vouchers->voucher_key}}</td>
                                                            <td>Rp. {{ $hpc->price }}</td>
                                                            <td>
                                                                <a href="{{route('handphone-trade.detail', ['id' => $hpc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>

                    <!--begin card-->
                    <div class="card card-custom" style="margin-top:40px;"gatau>
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#laptop_collapse">
                                <h3 class="card-label">Laptop 
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_laptop_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_laptop_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_laptop_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_laptop_selesai">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_laptop_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="laptop_collapse" class="collapse show">
                            <div class="card-body">
                                <!--begin::Body-->
                                <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_laptop_baru" role="tabpanel" aria-labelledby="tab_laptop_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_barus" />
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
                                                <table class="datatable cell-border" id="tb_laptop_baru">
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
                                                    @foreach ($laptop_baru as $pb)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pb->users->name }}</td>
                                                            <td>{{ $pb->brand }}</td>
                                                            <td>{{ $pb->memory }}</td>
                                                            <td>{{ $pb->storages }}</td>
                                                            <td>Rp. {{ $pb->price }}</td>
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
                                        <div class="tab-pane fade " id="tab_laptop_proses" role="tabpanel" aria-labelledby="tab_laptop_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_proseses" />
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
                                            <table class="datatable cell-border" id="tb_laptop_proses">
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
                                                    @foreach ($laptop_process as $pl)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pl->users->name }}</td>
                                                            <td>{{ $pl->brand }}</td>
                                                            <td>{{ $pl->memory }}</td>
                                                            <td>{{ $pl->storages }}</td>
                                                            <td>Rp. {{ $pl->price }}</td>
                                                            <td>
                                                                <a href="{{route('laptop-trade.detail', ['id' => $pl->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <div class="tab-pane fade " id="tab_laptop_rejected" role="tabpanel" aria-labelledby="tab_laptop_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_rejects" />
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
                                            <table class="datatable cell-border" id="tb_laptop_reject">
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
                                                    @foreach ($laptop_rejected as $pr)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pr->users->name }}</td>
                                                            <td>{{ $pr->brand }}</td>
                                                            <td>{{ $pr->memory }}</td>
                                                            <td>{{ $pr->storages }}</td>
                                                            <td>Rp. {{ $pr->price }}</td>
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
                                        <div class="tab-pane fade " id="tab_laptop_selesai" role="tabpanel" aria-labelledby="tab_laptop_selesai">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_selesais" />
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
                                            <form method="POST" action="{{ route('laptop-trade.laptop_update') }}">
                                            <table class="datatable cell-border" id="tb_laptop_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Memory RAM</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($laptop_tolak as $pt)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pt->users->name }}</td>
                                                            <td>{{ $pt->brand }}</td>
                                                            <td>{{ $pt->memory }}</td>
                                                            <td>{{ $pt->storages }}</td>
                                                            <td>{{$pt->vouchers->voucher_key}}</td>
                                                            <td>Rp. {{ $pt->price }}</td>
                                                            <td>
                                                                <a href="{{route('laptop-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>

                                                            <td>
                                                                <label class="form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="id[]" value="{{$pt->id}}">
                                                                </label>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>
                                        
                                        <div class="tab-pane fade " id="tab_laptop_claimed" role="tabpanel" aria-labelledby="tab_laptop_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_laptop_selesais" />
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
                                            <table class="datatable cell-border" id="tb_laptop_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Memory RAM</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($laptop_partner_claimed as $lpc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $lpc->users->name }}</td>
                                                            <td>{{ $lpc->brand }}</td>
                                                            <td>{{ $lpc->memory }}</td>
                                                            <td>{{ $lpc->storages }}</td>
                                                            <td>{{$lpc->vouchers->voucher_key}}</td>
                                                            <td>Rp. {{ $lpc->price }}</td>
                                                            <td>
                                                                <a href="{{route('laptop-trade.detail', ['id' => $lpc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>
                    <!--end card-->

                    <!--begin card-->
                    <div class="card card-custom" style="margin-top:40px;">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#tv_collapse">
                                <h3 class="card-label">Televisi 
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_tv_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_tv_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_tv_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_tv_tolak">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_tv_partner_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="tv_collapse" class="collapse show">
                            <div class="card-body">
                                <!--begin::Body-->
                                <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_tv_baru" role="tabpanel" aria-labelledby="tab_tv_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_barus" />
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
                                                <table class="datatable cell-border" id="tb_tv_baru">
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
                                                    @foreach ($tv_baru as $pb)
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
                                        <div class="tab-pane fade " id="tab_tv_proses" role="tabpanel" aria-labelledby="tab_tv_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_proseses" />
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
                                            <table class="datatable cell-border" id="tb_tv_proses">
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
                                                    @foreach ($tv_process as $pte)
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
                                        <div class="tab-pane fade " id="tab_tv_tolak" role="tabpanel" aria-labelledby="tab_tv_tolak">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_selesais" />
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
                                            <form method="POST" action="{{ route('tv-trade.tv_update') }}">
                                            <table class="datatable cell-border" id="tb_tv_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Jenis Tv</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($tv_tolak as $pt)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pt->users->name }}</td>
                                                            <td>{{ $pt->brand }}</td>
                                                            <td>{{ $pt->jenis_tv }}</td>
                                                            <td>{{ $pt->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $pt->price }}</td>
                                                            <td>
                                                                <a href="{{route('tv-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>
                                                            <td>
                                                                <label class="form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="id[]" value="{{$pt->id}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            <th style="margin-right: 10px;">
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>
                                        <div class="tab-pane fade " id="tab_tv_rejected" role="tabpanel" aria-labelledby="tab_tv_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_rejects" />
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
                                            <table class="datatable cell-border" id="tb_tv_reject">
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
                                                    @foreach ($tv_rejected as $pr)
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

                                        <div class="tab-pane fade " id="tab_tv_partner_claimed" role="tabpanel" aria-labelledby="tab_tv_partner_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_proseses" />
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
                                            <table class="datatable cell-border" id="tb_tv_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Jenis Tv</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($tv_partner_claimed as $tpc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $tpc->users->name }}</td>
                                                            <td>{{ $tpc->brand }}</td>
                                                            <td>{{ $tpc->jenis_tv }}</td>
                                                            <td>{{ $tpc->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $tpc->price }}</td>
                                                            <td>
                                                                <a href="{{route('tv-trade.detail', ['id' => $tpc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>
                    <!--end card-->

                    <!--begin card-->
                    <div class="card card-custom" style="margin-top:40px;">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#ps_collapse">
                                <h3 class="card-label">Playstation 
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_ps_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_ps_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_ps_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_ps_selesai">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_ps_partner_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="ps_collapse" class="collapse show">
                            <div class="card-body">
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_ps_baru" role="tabpanel" aria-labelledby="tab_tv_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_barus" />
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
                                                <table class="datatable cell-border" id="tb_ps_baru">
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($ps_baru as $pb)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pb->users->name }}</td>
                                                            <td>{{ $pb->brand }}</td>
                                                            <td>{{ $pb->type }}</td>
                                                            <td>{{ $pb->storages }}</td>
                                                            <td>Rp. {{ $pb->price }}</td>
                                                            <td>
                                                                <a href="{{route('ps-trade.detail', ['id' => $pb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>                                                    
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_ps_proses" role="tabpanel" aria-labelledby="tab_ps_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_proseses" />
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
                                            <table class="datatable cell-border" id="tb_ps_proses">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($ps_process as $pp)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pp->users->name }}</td>
                                                            <td>{{ $pp->brand }}</td>
                                                            <td>{{ $pp->type }}</td>
                                                            <td>{{ $pp->storages }}</td>
                                                            <td>Rp. {{ $pp->price }}</td>
                                                            <td><a href="{{route('ps-trade.detail', ['id' => $pp->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <div class="tab-pane fade " id="tab_ps_rejected" role="tabpanel" aria-labelledby="tab_ps_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_rejects" />
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
                                            <table class="datatable cell-border" id="tb_ps_reject">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($ps_rejected as $pr)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pr->users->name }}</td>
                                                            <td>{{ $pr->brand }}</td>
                                                            <td>{{ $pr->type }}</td>
                                                            <td>{{ $pr->storages }}</td>
                                                            <td>Rp. {{ $pr->price }}</td>
                                                            <td><a href="{{route('ps-trade.detail', ['id' => $pr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_ps_selesai" role="tabpanel" aria-labelledby="tab_ps_selesai">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_tv_selesais" />
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
                                            <form method="POST" action="{{ route('ps-trade.ps_update') }}">
                                            <table class="datatable cell-border" id="tb_ps_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($ps_tolak as $pt)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pt->users->name }}</td>
                                                            <td>{{ $pt->brand }}</td>
                                                            <td>{{ $pt->type }}</td>
                                                            <td>{{ $pt->storages }}</td>
                                                            <td>{{ $pt->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $pt->price }}</td>
                                                            <td><a href="{{route('ps-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                            <td>
                                                            <label class="form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="id[]" value="{{$pt->id}}">
                                                            </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            <th style="margin-right: 10px;">
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>                    
                                        
                                        <div class="tab-pane fade " id="tab_ps_partner_claimed" role="tabpanel" aria-labelledby="tab_ps_partner_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_ps_proseses" />
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
                                            <table class="datatable cell-border" id="tb_ps_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($ps_partner_claimed as $ppc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $ppc->users->name }}</td>
                                                            <td>{{ $ppc->brand }}</td>
                                                            <td>{{ $ppc->type }}</td>
                                                            <td>{{ $ppc->storages }}</td>
                                                            <td>{{ $ppc->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $ppc->price }}</td>
                                                            <td>
                                                                <a href="{{route('tv-trade.detail', ['id' => $ppc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>
                    <!--end card-->

                    <div class="card card-custom" style="margin-top:40px;">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#kulkas_collapse">
                                <h3 class="card-label">Kulkas 
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_kulkas_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_kulkas_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_kulkas_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_kulkas_selesai">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_kulkas_partner_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="kulkas_collapse" class="collapse show">
                            <div class="card-body">
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_kulkas_baru" role="tabpanel" aria-labelledby="tab_kulkas_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_kulkas_barus" />
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
                                                <table class="datatable cell-border" id="tb_kulkas_baru">
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($kulkas_baru as $pb)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pb->users->name }}</td>
                                                            <td>{{ $pb->brand }}</td>
                                                            <td>{{ $pb->type }}</td>
                                                            <td>{{ $pb->storages }}</td>
                                                            <td>Rp. {{ $pb->price }}</td>
                                                            <td>
                                                                <a href="{{route('kulkas-trade.detail', ['id' => $pb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>                                                    
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_kulkas_proses" role="tabpanel" aria-labelledby="tab_kulkas_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_kulkas_proseses" />
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
                                            <table class="datatable cell-border" id="tb_kulkas_proses">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($kulkas_process as $pp)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pp->users->name }}</td>
                                                            <td>{{ $pp->brand }}</td>
                                                            <td>{{ $pp->type }}</td>
                                                            <td>{{ $pp->storages }}</td>
                                                            <td>Rp. {{ $pp->price }}</td>
                                                            <td><a href="{{route('kulkas-trade.detail', ['id' => $pp->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <div class="tab-pane fade " id="tab_kulkas_rejected" role="tabpanel" aria-labelledby="tab_kulkas_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_kulkas_rejects" />
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
                                            <table class="datatable cell-border" id="tb_kulkas_reject">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($kulkas_rejected as $pr)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pr->users->name }}</td>
                                                            <td>{{ $pr->brand }}</td>
                                                            <td>{{ $pr->type }}</td>
                                                            <td>{{ $pr->storages }}</td>
                                                            <td>Rp. {{ $pr->price }}</td>
                                                            <td><a href="{{route('kulkas-trade.detail', ['id' => $pr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_kulkas_selesai" role="tabpanel" aria-labelledby="tab_kulkas_selesai">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_kulkas_selesais" />
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
                                            <form method="POST" action="{{ route('kulkas-trade.kulkas_update') }}">
                                            <table class="datatable cell-border" id="tb_kulkas_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($kulkas_tolak as $pt)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pt->users->name }}</td>
                                                            <td>{{ $pt->brand }}</td>
                                                            <td>{{ $pt->type }}</td>
                                                            <td>{{ $pt->storages }}</td>
                                                            <td>{{ $pt->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $pt->price }}</td>
                                                            <td><a href="{{route('kulkas-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                            <td>
                                                            <label class="form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="id[]" value="{{$pt->id}}">
                                                            </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            <th style="margin-right: 10px;">
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>                    
                                        
                                        <div class="tab-pane fade " id="tab_kulkas_partner_claimed" role="tabpanel" aria-labelledby="tab_kulkas_partner_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_kulkas_proseses" />
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
                                            <table class="datatable cell-border" id="tb_kulkas_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($kulkas_partner_claimed as $ppc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $ppc->users->name }}</td>
                                                            <td>{{ $ppc->brand }}</td>
                                                            <td>{{ $ppc->type }}</td>
                                                            <td>{{ $ppc->storages }}</td>
                                                            <td>{{ $ppc->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $ppc->price }}</td>
                                                            <td>
                                                                <a href="{{route('kulkas-trade.detail', ['id' => $ppc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>


                    <div class="card card-custom" style="margin-top:40px;">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title" data-toggle="collapse" data-target="#mesin_cuci_collapse">
                                <h3 class="card-label">Mesin Cuci 
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#tab_mesin_cuci_baru">Baru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_mesin_cuci_proses">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_mesin_cuci_rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_mesin_cuci_selesai">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#tab_mesin_cuci_partner_claimed">Partner Claimed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="mesin_cuci_collapse" class="collapse show">
                            <div class="card-body">
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables11">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="tab_mesin_cuci_baru" role="tabpanel" aria-labelledby="tab_mesin_cuci_baru">
                                            <!--begin::Table-->
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="input-icon">
                                                                        <p></p>
                                                                        <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_mesin_cuci_barus" />
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
                                                <table class="datatable cell-border" id="tb_mesin_cuci_baru">
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($mesin_cuci_baru as $pb)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pb->users->name }}</td>
                                                            <td>{{ $pb->brand }}</td>
                                                            <td>{{ $pb->type }}</td>
                                                            <td>{{ $pb->storages }}</td>
                                                            <td>Rp. {{ $pb->price }}</td>
                                                            <td>
                                                                <a href="{{route('mesin-cuci-trade.detail', ['id' => $pb->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
                                                            </td>                                                    
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_mesin_cuci_proses" role="tabpanel" aria-labelledby="tab_mesin_cuci_proses">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_mesin_cuci_proseses" />
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
                                            <table class="datatable cell-border" id="tb_mesin_cuci_proses">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($mesin_cuci_process as $pp)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pp->users->name }}</td>
                                                            <td>{{ $pp->brand }}</td>
                                                            <td>{{ $pp->type }}</td>
                                                            <td>{{ $pp->storages }}</td>
                                                            <td>Rp. {{ $pp->price }}</td>
                                                            <td><a href="{{route('mesin-cuci-trade.detail', ['id' => $pp->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <div class="tab-pane fade " id="tab_mesin_cuci_rejected" role="tabpanel" aria-labelledby="tab_mesin_cuci_rejected">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_mesin_cuci_rejects" />
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
                                            <table class="datatable cell-border" id="tb_mesin_cuci_reject">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($mesin_cuci_rejected as $pr)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pr->users->name }}</td>
                                                            <td>{{ $pr->brand }}</td>
                                                            <td>{{ $pr->type }}</td>
                                                            <td>{{ $pr->storages }}</td>
                                                            <td>Rp. {{ $pr->price }}</td>
                                                            <td><a href="{{route('mesin-cuci-trade.detail', ['id' => $pr->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>

                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="tab_mesin_cuci_selesai" role="tabpanel" aria-labelledby="tab_mesin_cuci_selesai">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_mesin_cuci_selesais" />
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
                                            <form method="POST" action="{{ route('mesin-cuci-trade.mesin_cuci_update') }}">
                                            <table class="datatable cell-border" id="tb_mesin_cuci_selesai">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($mesin_cuci_tolak as $pt)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $pt->users->name }}</td>
                                                            <td>{{ $pt->brand }}</td>
                                                            <td>{{ $pt->type }}</td>
                                                            <td>{{ $pt->storages }}</td>
                                                            <td>{{ $pt->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $pt->price }}</td>
                                                            <td><a href="{{route('mesin-cuci-trade.detail', ['id' => $pt->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a></td>
                                                            <td>
                                                            <label class="form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="id[]" value="{{$pt->id}}">
                                                            </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                            </table>
                                            <br>
                                            <th style="margin-right: 10px;">
                                            @csrf
                                            <button type="submit" name="action" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                            Accepted
                                            </button>
                                            </th>
                                            </form>
                                            <!--end::Table-->
                                        </div>                    
                                        
                                        <div class="tab-pane fade " id="tab_mesin_cuci_partner_claimed" role="tabpanel" aria-labelledby="tab_mesin_cuci_partner_claimed">
                                            <!--begin::Table-->
                                            <div class="mb-7">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4 my-2 my-md-0">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" placeholder="Search By Customer Name" id="tb_mesin_cuci_proseses" />
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
                                            <table class="datatable cell-border" id="tb_mesin_cuci_partner_claimed">
                                            <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Brand</th>
                                                            <th>Type</th>
                                                            <th>Storage</th>
                                                            <th>Voucher</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $num = 0
                                                    @endphp
                                                    @foreach ($mesin_cuci_partner_claimed as $ppc)
                                                        <tr>
                                                            <td>{{ $num+=1 }}</td>
                                                            <td>{{ $ppc->users->name }}</td>
                                                            <td>{{ $ppc->brand }}</td>
                                                            <td>{{ $ppc->type }}</td>
                                                            <td>{{ $ppc->storages }}</td>
                                                            <td>{{ $ppc->vouchers->voucher_key }}</td>
                                                            <td>Rp. {{ $ppc->price }}</td>
                                                            <td>
                                                                <a href="{{route('mesin-cuci-trade.detail', ['id' => $ppc->id])}}"><i class="fa fa-pencil-alt text-success mr-2"></i></a>
                                                                
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
                    </div>


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection