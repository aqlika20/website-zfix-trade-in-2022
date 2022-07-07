{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Detail Trade Televisi
                <div class="text-muted pt-2 font-size-sm">Detail of Trade Televisi</div></h3>
        </div>
        <h1><span><span class="badge  badge-warning">Televisi</span></span></h1>
    </div>
    <div class="card-body">
        @if($currentUser->roles_id == 1)
        <form method="POST" action="{{  route('tv-notification', [$tv_detail->id]) }}">
        <a href="{{ route('generate_tv',  $tv_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
        <a href="{{ route('generate_tv-picker',  $tv_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
        @csrf 
        <button type="submit" class="btn btn-secondary" >
        Notif
        </button>                         
        </form><br><br>
        @endif
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
                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $tv_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>

                                                <div class="col-md-12">
                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $tv_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                </div>
                                            </div>
                                                                                                                        
                                    </div>
                                    <div class="col-md-6 my-2 my-md-0">

                                    <div class="form-group row">
                                                <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>

                                                <div class="col-md-12">
                                                    <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $tv_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                </div>
                                            </div> 

                                        <div class="form-group row">
                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                            <div class="col-md-12">
                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $tv_detail->users->address }}</textarea>
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
                        <i class="flaticon2-shield"></i> About Televisi
                    </div>
                </div>
                <div id="about-device" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6 my-2 my-md-0">
                                        <div class="form-group row">
                                            <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Tempat anda melakukan Trade In') }}</label>

                                            <div class="col-md-12">
                                                <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $lokasi->name }}" required autocomplete="lokasi_trade" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="brand" class="col-md-6 col-form-label text-md-left">{{ __('Merk') }}</label>

                                            <div class="col-md-12">
                                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $tv_detail->brand }}" required autocomplete="brand">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="jenis_tv" class="col-md-6 col-form-label text-md-left">{{ __('Jenis TV') }}</label>

                                            <div class="col-md-12">
                                                <input id="jenis_tv" type="text" class="form-control @error('jenis_tv') is-invalid @enderror" name="jenis_tv" value="{{ $tv_detail->jenis_tv }}" required autocomplete="jenis_tv" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inch" class="col-md-6 col-form-label text-md-left">{{ __('Ukuran Televisi ') }}</label>

                                            <div class="col-md-12">
                                                <input id="inch" type="text" class="form-control @error('inch') is-invalid @enderror" name="inch" value="{{ $tv_detail->inch }}" required autocomplete="inch" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="kondisi_tv" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi TV') }}</label>

                                            <div class="col-md-12">
                                                <input id="kondisi_tv" type="text" class="form-control @error('kondisi_tv') is-invalid @enderror" name="kondisi_tv" value="{{ $tv_detail->kondisi_tv }}" required autocomplete="kondisi_tv" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="kondisi_layar" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar TV') }}</label>

                                            <div class="col-md-12">
                                                <input id="kondisi_layar" type="text" class="form-control @error('kondisi_layar') is-invalid @enderror" name="kondisi_layar" value="{{ $tv_detail->kondisi_layar }}" required autocomplete="kondisi_layar" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inner_screen" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar Dalam') }}</label>

                                            <div class="col-md-12">
                                                <input id="inner_screen" type="text" class="form-control @error('inner_screen') is-invalid @enderror" name="inner_screen" value="{{ $tv_detail->inner_screen }}" required autocomplete="inner_screen" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="outer_screen" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar Luar') }}</label>

                                            <div class="col-md-12">
                                                <input id="outer_screen" type="text" class="form-control @error('outer_screen') is-invalid @enderror" name="outer_screen" value="{{ $tv_detail->outer_screen }}" required autocomplete="outer_screen" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 my-2 my-md-0">

                                        <div class="form-group row">
                                            <label for="condition" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Body') }}</label>

                                            <div class="col-md-12">
                                                <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $tv_detail->condition }}" required autocomplete="condition" readonly>
                                            </div>
                                        </div>
                                        

                                        @if($tv_detail->jenis_tv == 'LED')
                                            <div class="form-group row">
                                                <label for="port" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Tombol/Port (HDMI,Antenna) Pada TV LED') }}</label>

                                                <div class="col-md-12">
                                                    <input id="port" type="text" class="form-control @error('port') is-invalid @enderror" name="port" value="{{ $tv_detail->port }}" required autocomplete="port" readonly>
                                                </div>
                                            </div>
                                        @endif

                                        @if($tv_detail->jenis_tv == 'Smart TV')
                                            <div class="form-group row">
                                                <label for="port" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Tombol/Port (HDMI,Antenna) Pada Smart TV') }}</label>

                                                <div class="col-md-12">
                                                    <input id="port" type="text" class="form-control @error('port') is-invalid @enderror" name="port" value="{{ $tv_detail->port }}" required autocomplete="port" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="wifi" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Wifi Pada Smart TV') }}</label>

                                                <div class="col-md-12">
                                                    <input id="wifi" type="text" class="form-control @error('wifi') is-invalid @enderror" name="wifi" value="{{ $tv_detail->wifi }}" required autocomplete="wifi" readonly>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group row">
                                            <label for="jenis_tv" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Suara pada TV') }}</label>

                                            <div class="col-md-12">
                                                <input id="jenis_tv" type="text" class="form-control @error('jenis_tv') is-invalid @enderror" name="jenis_tv" value="{{ $tv_detail->jenis_tv }}" required autocomplete="jenis_tv" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="addition" class="col-md-6 col-form-label text-md-left">{{ __('Kelengkapan') }}</label>

                                            <div class="col-md-12">
                                                <input id="addition" type="text" class="form-control @error('addition') is-invalid @enderror" name="addition" value="{{ $tv_detail->addition }}" required autocomplete="addition" readonly>
                                            </div>
                                        </div>

                                        @if($tv_detail->status == 4 || $tv_detail->status == 3)
                                        <div class="form-group row">
                                            <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
                                            
                                            <div class="col-md-12">
                                                <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $voucher->voucher_key }}" required autocomplete="lokasi_trade" readonly>
                                            </div>
                                        </div>
                                        @endif

                                        <form method="POST" action="{{ route('tv-trade.tv_proses',[$tv_detail->id]) }}">
                                            @csrf
                                            @if($currentUser->roles_id == 1 && $tv_detail->status == 1 || $currentUser->roles_id == 1 && $tv_detail->status == 2)
                                            <div class="form-group row">
                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>

                                                <div class="col-md-12">
                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $tv_detail->price }}" required autocomplete="price">
                                                </div>
                                            </div>
                                            @endif

                                            @if($currentUser->roles_id != 1)
                                            <div class="form-group row">
                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>

                                                <div class="col-md-12">
                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $tv_detail->price }}" required autocomplete="price" readonly>
                                                </div>
                                            </div>
                                            @endif

                                            @if($currentUser->roles_id == 1 && $tv_detail->status != 1 && $tv_detail->status != 2)
                                            <div class="form-group row">
                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>

                                                <div class="col-md-12">
                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $tv_detail->price }}" required autocomplete="price" readonly>
                                                </div>
                                            </div>
                                            @endif

                                            @if($currentUser->roles_id == 1 && $tv_detail->status == 1 || $currentUser->roles_id == 1 && $tv_detail->status == 2)
                                            <div class="form-group row">
                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                <div class="col-md-12">
                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $tv_detail->note }}</textarea>
                                                </div>
                                            </div>
                                            @endif

                                            @if($currentUser->roles_id != 1)
                                            <div class="form-group row">
                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                <div class="col-md-12">
                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $tv_detail->note }}</textarea>
                                                </div>
                                            </div>
                                            @endif

                                            @if($currentUser->roles_id == 1 && $tv_detail->status != 1 && $tv_detail->status != 2)
                                            <div class="form-group row">
                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                <div class="col-md-12">
                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $tv_detail->note }}</textarea>
                                                </div>
                                            </div>
                                            @endif
                                            
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
                <a href="{{ route('tv-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
            </div>
            @if($currentUser->roles_id == 1)
            @if($tv_detail->status == 1)
            <table>

                <th style="margin-right: 10px;">
                @csrf
                <button type="submit" name="action" value="process" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                Process
                </button>
                </th>

                <th style="margin-right: 10px;">
                @csrf
                <button type="submit" name="action" value="approve" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" >
                Approve
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

            @if($tv_detail->status == 2)
            <table>

            <th style="margin-right: 10px;">
                @csrf
                <button type="submit" name="action" value="process" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                Simpan
                </button>
            </th>

            <th style="margin-right: 10px;">
                @csrf
                <button type="submit" name="action" value="approve" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" >
                Approve
                </button>
                </th>
                
            </table>
            @endif

            @if($tv_detail->status == 4)
            <table>
               <th style="margin-right: 10px;">
                    @csrf 
                        <button type="submit" name="action" value="claim" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4" >
                        Claim
                        </button>
                    </form>
                </th>
                
            </table>
            @endif
            @endif
        </div>
    </div>
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