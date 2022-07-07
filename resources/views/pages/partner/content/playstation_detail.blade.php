{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Detail Trade Playstation
                                                <div class="text-muted pt-2 font-size-sm">Detail of Trade Playstation</div></h3>
                                        </div>
                                        <h1><span><span class="badge  badge-warning">Playstation</span></span></h1>
                                    </div>
                                    <div class="card-body">
                                    <a href="{{ route('generate_ps',  $ps_detail->id) }}" class="btn btn-secondary">Generate</a><br><br>
                                        <div class="accordion accordion-solid accordion-toggle-plus">
                                            <div class="card">
                                                <div class="card-header" id="headingOne6">
                                                    <div class="card-title" data-toggle="collapse" data-target="#general">
                                                        <i class="flaticon2-file"></i> General
                                                    </div>
                                                </div>
                                                <div id="general" class="collapse show">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Name') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $ps_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $ps_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>
                                                                                                                                                      
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">

                                                                    <div class="form-group row">
                                                                                <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $ps_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                                                </div>
                                                                            </div> 

                                                                        <div class="form-group row">
                                                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                                                            <div class="col-md-12">
                                                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $ps_detail->users->address }}</textarea>
                                                                            </div>
                                                                        </div> 

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo6">
                                                    <div class="card-title" data-toggle="collapse" data-target="#about-device">
                                                        <i class="flaticon2-shield"></i> About Playstation
                                                    </div>
                                                </div>
                                                <div id="about-device" class="collapse show">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                            <div class="form-group row">
                                                                                <label for="brand" class="col-md-6 col-form-label text-md-left">{{ __('Brand') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $ps_detail->brand }}" required autocomplete="brand">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="type" class="col-md-6 col-form-label text-md-left">{{ __('Type') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $ps_detail->type }}" required autocomplete="type" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="inch" class="col-md-6 col-form-label text-md-left">{{ __('Storage') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="inch" type="text" class="form-control @error('inch') is-invalid @enderror" name="inch" value="{{ $ps_detail->storages }}" required autocomplete="inch" readonly>
                                                                                </div>
                                                                            </div>                                                                            

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Penampilan Fisik') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($ps_detail->condition == 1)
                                                                                <input type="text" class="form-control" value="Mulus, tidak ada goresan atau penyok/dent" readonly/>
                                                                                @endif
                                                                                @if($ps_detail->condition == 2)
                                                                                <input type="text" class="form-control" value="Ada sedikit goresan atau penyok/dent" readonly/>
                                                                                @endif
                                                                                @if($ps_detail->condition == 3)
                                                                                <input type="text" class="form-control" value="Ada banyak goresan atau penyok/dent" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Pilihan Tambahan') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($ps_detail->addition == 1)
                                                                                <input type="text" class="form-control" value="Full Set" readonly/>
                                                                                @endif
                                                                                @if($ps_detail->addition == 2)
                                                                                <input type="text" class="form-control" value="Hanya Box" readonly/>
                                                                                @endif
                                                                                @if($ps_detail->addition == 3)
                                                                                <input type="text" class="form-control" value="Hanya aksesoris" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                            <div class="form-group row">
                                                                                <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Lokasi Trade') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $lokasi->name }}" required autocomplete="lokasi_trade" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $voucher->voucher_key }}" required autocomplete="lokasi_trade" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <form method="POST" action="{{ route('ps-trade.ps_proses',[$ps_detail->id]) }}">
                                                                            @csrf
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $ps_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>

                                                                            @if($ps_detail->status == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($ps_detail->status != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $ps_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <!-- </form> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-5 pt-10">
                                            <div class="mr-2">
                                                <a href="{{ route('ps-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>

                                            @if($ps_detail->status == 1)
                                            <table>
                                                <th style="margin-right: 10px;">
                                                @csrf
                                                <button type="submit" name="action" value="process" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                                                Proses
                                                </button>
                                                </th>

                                                <th style="margin-right: 10px;">
                                                    @csrf 
                                                        <button type="submit" name="action" value="rejected" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                                                        Rejected
                                                        </button>
                                                    </form>
                                                </th>
                                                
                                            </table>
                                            @endif
                                        </div>
                                    </div>

                                </div>
        <!--end::Content-->



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