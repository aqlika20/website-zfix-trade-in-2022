{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Detail Trade Laptop
                                                <div class="text-muted pt-2 font-size-sm">Detail of Trade Laptop</div></h3>
                                        </div>
                                        <h1><span><span class="badge  badge-warning">Laptop</span></span></h1>
                                    </div>
                                    <div class="card-body">
                                        @if($currentUser->roles_id == 1)
                                        <form method="POST" action="{{  route('laptop-notification', [$laptop_detail->id]) }}">
                                        <a href="{{ route('generate_laptop',  $laptop_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
                                        <a href="{{ route('generate-picker-laptop',  $laptop_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
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
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $laptop_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $laptop_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>
                                                                                                                                                      
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">

                                                                    <div class="form-group row">
                                                                                <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $laptop_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                                                </div>
                                                                            </div> 

                                                                        <div class="form-group row">
                                                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                                                            <div class="col-md-12">
                                                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $laptop_detail->users->address }}</textarea>
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
                                                        <i class="flaticon2-shield"></i> About Laptop
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
                                                                                <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $laptop_detail->lokasi_trade }}" required autocomplete="lokasi_trade">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="brand" class="col-md-6 col-form-label text-md-left">{{ __('Merk') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $laptop_detail->brand }}" required autocomplete="brand">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="ram" class="col-md-6 col-form-label text-md-left">{{ __('RAM') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="ram" type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" value="{{ $laptop_detail->memory }}" required autocomplete="ram" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="jenis_storage" class="col-md-6 col-form-label text-md-left">{{ __('Jenis Storage') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="jenis_storage" type="text" class="form-control @error('jenis_storage') is-invalid @enderror" name="jenis_storage" value="{{ $laptop_detail->jenis_storage }}" required autocomplete="jenis_storage" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="processor" class="col-md-6 col-form-label text-md-left">{{ __('Processor') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="processor" type="text" class="form-control @error('processor') is-invalid @enderror" name="processor" value="{{ $laptop_detail->processor }}" required autocomplete="processor" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="ukuran_laptop" class="col-md-6 col-form-label text-md-left">{{ __('Ukuran Laptop') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="ukuran_laptop" type="text" class="form-control @error('ukuran_laptop') is-invalid @enderror" name="ukuran_laptop" value="{{ $laptop_detail->ukuran_laptop }}" required autocomplete="ukuran_laptop" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="os" class="col-md-6 col-form-label text-md-left">{{ __('Operating System') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="os" type="text" class="form-control @error('os') is-invalid @enderror" name="os" value="{{ $laptop_detail->os }}" required autocomplete="os" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="kondisi_laptop" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Laptop') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="kondisi_laptop" type="text" class="form-control @error('kondisi_laptop') is-invalid @enderror" name="kondisi_laptop" value="{{ $laptop_detail->kondisi_laptop }}" required autocomplete="kondisi_laptop" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="condition" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Fisik Laptop') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $laptop_detail->condition }}" required autocomplete="condition" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="jenis_layar" class="col-md-6 col-form-label text-md-left">{{ __('Jenis Layar Laptop') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="jenis_layar" type="text" class="form-control @error('jenis_layar') is-invalid @enderror" name="jenis_layar" value="{{ $laptop_detail->jenis_layar }}" required autocomplete="jenis_layar" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="kondisi_layar" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar Laptop') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="kondisi_layar" type="text" class="form-control @error('kondisi_layar') is-invalid @enderror" name="kondisi_layar" value="{{ $laptop_detail->kondisi_layar }}" required autocomplete="kondisi_layar" readonly>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                        <div class="form-group row">
                                                                            <label for="inner_screen" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar Dalam') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="inner_screen" type="text" class="form-control @error('inner_screen') is-invalid @enderror" name="inner_screen" value="{{ $laptop_detail->inner_screen }}" required autocomplete="inner_screen" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="outer_screen" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Layar Luar') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="outer_screen" type="text" class="form-control @error('outer_screen') is-invalid @enderror" name="outer_screen" value="{{ $laptop_detail->outer_screen }}" required autocomplete="outer_screen" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="baterai" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Battery') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="baterai" type="text" class="form-control @error('baterai') is-invalid @enderror" name="baterai" value="{{ $laptop_detail->baterai }}" required autocomplete="baterai" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="keyboard" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Tombol Keyboard') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="keyboard" type="text" class="form-control @error('keyboard') is-invalid @enderror" name="keyboard" value="{{ $laptop_detail->keyboard }}" required autocomplete="keyboard" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="trackpad" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Trackpad') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="trackpad" type="text" class="form-control @error('trackpad') is-invalid @enderror" name="trackpad" value="{{ $laptop_detail->trackpad }}" required autocomplete="trackpad" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="port" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Port USB/HDMI/LAN/DVI') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="port" type="text" class="form-control @error('port') is-invalid @enderror" name="port" value="{{ $laptop_detail->port }}" required autocomplete="port" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="wifi" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Wifi / Bluetooth') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="wifi" type="text" class="form-control @error('wifi') is-invalid @enderror" name="wifi" value="{{ $laptop_detail->wifi }}" required autocomplete="wifi" readonly>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="camera" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Front Camera') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="camera" type="text" class="form-control @error('camera') is-invalid @enderror" name="camera" value="{{ $laptop_detail->camera }}" required autocomplete="camera" readonly>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="speaker" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Speaker') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="speaker" type="text" class="form-control @error('speaker') is-invalid @enderror" name="speaker" value="{{ $laptop_detail->speaker }}" required autocomplete="speaker" readonly>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="addition" class="col-md-6 col-form-label text-md-left">{{ __('Kelengkapan') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="addition" type="text" class="form-control @error('addition') is-invalid @enderror" name="addition" value="{{ $laptop_detail->addition }}" required autocomplete="addition" readonly>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="more_additional" class="col-md-6 col-form-label text-md-left">{{ __('Kelengkapan Tambahan') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="more_additional" type="text" class="form-control @error('more_additional') is-invalid @enderror" name="more_additional" value="{{ $laptop_detail->more_addition }}" required autocomplete="more_additional" readonly>
                                                                            </div>
                                                                        </div>

                                                                        @if($laptop_detail->status == 4 || $laptop_detail->status == 3)
                                                                            <div class="form-group row">
                                                                                <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $voucher->voucher_key }}" required autocomplete="lokasi_trade" readonly>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <form method="POST" action="{{ route('laptop-trade.laptop_proses',[$laptop_detail->id]) }}">
                                                                            @csrf
                                                                            @if($laptop_detail->status == 1 && $currentUser->roles_id == 1 || $laptop_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $laptop_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $laptop_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $laptop_detail->status != 1 && $laptop_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $laptop_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            
                                                                            @if($laptop_detail->status == 1 && $currentUser->roles_id == 1 || $laptop_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{$laptop_detail->note}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{$laptop_detail->note}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $laptop_detail->status != 1 && $laptop_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{$laptop_detail->note}}</textarea>
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
                                                <a href="{{ route('laptop-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>

                                            @if($currentUser->roles_id == 1)
                                            @if($laptop_detail->status == 1)
                                            <table>
                                                <th style="margin-right: 10px;">
                                                @csrf
                                                <button type="submit" name="action" value="process" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                                                Proses
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

                                            @if($laptop_detail->status == 2)
                                            <table>
                                            <th style="margin-right: 10px;">
                                                @csrf
                                                <button type="submit" name="action" value="process" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                                                Proses
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

                                            @if($laptop_detail->status == 4)
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