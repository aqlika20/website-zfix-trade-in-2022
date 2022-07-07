{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Handphone/Tablet Price
                                            <div class="text-muted pt-2 font-size-sm">List of Handphone/Tablet</div></h3>
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Search Form-->
                                        <!--begin::Search Form-->
                                        <div class="mb-7">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search Brand" id="harga_ps_search_query" />
                                                                <span>
                                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                            <form method='post'  action="{{ route('import.price_handphone') }}" enctype='multipart/form-data' >
                                                                {{ csrf_field() }}
                                                                <input type='file' name='file' >
                                                                <input type='submit' name='submit' value='Import'>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Search Form-->
                                        <!--end: Search Form-->
                                        <!--begin: Datatable-->
                                        <table class="datatable datatable-borderless" id="harga_ps">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Brand</th>
                                                    <th>Storage</th>
                                                    <th>RAM</th>
                                                    <th>Price Grade A</th>
                                                    <th>Price Grade B</th>
                                                    <th>Price Grade C</th>
                                                    <!--<th>Action</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $num = 0
                                            @endphp
                                            @foreach ($handphone_price as $hp)
                                            <tr>
                                                <td>{{ $num+=1 }}</td>
                                                <td>{{ $hp->brand }}</td>
                                                <td>{{ $hp->storage }}</td>
                                                <td>{{ $hp->ram }}</td>
                                                <td>Rp. {{ Helper::moneyFormat($hp->priceGradeA) }}</td>
                                                <td>Rp. {{ Helper::moneyFormat($hp->priceGradeB) }}</td>
                                                <td>Rp. {{ Helper::moneyFormat($hp->priceGradeC) }}</td>
                                                <!--<td>Coming Soon</td>-->

                                            </tr>

                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <form method="POST" action="{{ route('create.price_handphone') }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newDataModalLabel">New Data</h5>
                                            </div>
                                            <div class="modal-body">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" required autocomplete="name" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="storage" class="col-md-4 col-form-label text-md-right">{{ __('Storage') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="storage" type="text" class="form-control @error('storage') is-invalid @enderror" name="storage" required autocomplete="storage" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="ram" class="col-md-4 col-form-label text-md-right">{{ __('RAM') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="ram" type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" required autocomplete="ram" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="priceGradeA" class="col-md-4 col-form-label text-md-right">{{ __('Price Grade A') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="priceGradeA" type="text" class="form-control" name="priceGradeA" required autocomplete="priceGradeA" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="priceGradeB" class="col-md-4 col-form-label text-md-right">{{ __('Price Grade B') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="priceGradeB" type="text" class="form-control" name="priceGradeB" required autocomplete="priceGradeB" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="priceGradeC" class="col-md-4 col-form-label text-md-right">{{ __('Price Grade C') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="priceGradeC" type="text" class="form-control" name="priceGradeC" required autocomplete="priceGradeC" autofocus>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                            </div>
                                        </form>
                                        </div>
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