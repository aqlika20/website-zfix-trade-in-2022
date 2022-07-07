{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Detail Trade Kulkas
                                                <div class="text-muted pt-2 font-size-sm">Detail of Trade Kulkas</div></h3>
                                        </div>
                                        <h1><span><span class="badge  badge-warning">Kulkas</span></span></h1>
                                    </div>
                                    <div class="card-body">
                                    @if($currentUser->roles_id == 1)
                                    <form method="POST" action="{{  route('kulkas-notification', [$kulkas_detail->id]) }}">
                                    <a href="{{ route('generate_kulkas',  $kulkas_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
                                    <a href="{{ route('generate_kulkas-picker',  $kulkas_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
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
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $kulkas_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $kulkas_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>
                                                                                                                                                      
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">

                                                                        <div class="form-group row">
                                                                            <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $kulkas_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                                            </div>
                                                                        </div> 

                                                                        <div class="form-group row">
                                                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                                                            <div class="col-md-12">
                                                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $kulkas_detail->users->address }}</textarea>
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
                                                        <i class="flaticon2-shield"></i> About Kulkas
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
                                                                            <label for="brand" class="col-md-6 col-form-label text-md-left">{{ __('Brand') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $kulkas_detail->brand }}" required autocomplete="brand" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="model" class="col-md-6 col-form-label text-md-left">{{ __('Jenis Model Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $kulkas_detail->model }}" required autocomplete="model" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="type" class="col-md-6 col-form-label text-md-left">{{ __('Type Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $kulkas_detail->type }}" required autocomplete="type" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="condition" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $kulkas_detail->condition }}" required autocomplete="condition" readonly>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="kondisi_fisik" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Fisik Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="kondisi_fisik" type="text" class="form-control @error('kondisi_fisik') is-invalid @enderror" name="kondisi_fisik" value="{{ $kulkas_detail->kondisi_fisik }}" required autocomplete="kondisi_fisik" readonly>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                        <div class="form-group row">
                                                                            <label for="rubber" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Rubber Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="rubber" type="text" class="form-control @error('rubber') is-invalid @enderror" name="rubber" value="{{ $kulkas_detail->rubber }}" required autocomplete="rubber" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="tutup_freezer" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Tutup Freezer') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="tutup_freezer" type="text" class="form-control @error('tutup_freezer') is-invalid @enderror" name="tutup_freezer" value="{{ $kulkas_detail->tutup_freezer }}" required autocomplete="tutup_freezer" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="tray" class="col-md-6 col-form-label text-md-left">{{ __('Kelengkapan Tray Kulkas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="tray" type="text" class="form-control @error('tray') is-invalid @enderror" name="tray" value="{{ $kulkas_detail->tray }}" required autocomplete="tray" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="ice_maker" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Freezer/Ice Maker/Pendingin') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="ice_maker" type="text" class="form-control @error('ice_maker') is-invalid @enderror" name="ice_maker" value="{{ $kulkas_detail->ice_maker }}" required autocomplete="ice_maker" readonly>
                                                                            </div>
                                                                        </div>

                                                                        @if($kulkas_detail->status == 4 || $kulkas_detail->status == 3)
                                                                        <div class="form-group row">
                                                                            <label for="voucher_key" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>

                                                                            <div class="col-md-12">
                                                                                @if($kulkas_detail->voucher_id != null)
                                                                                <input id="voucher_key" type="text" class="form-control @error('voucher_key') is-invalid @enderror" name="voucher_key" value="{{ $voucher->voucher_key }}" required autocomplete="voucher_key" readonly>
                                                                                @elseif($kulkas_detail->voucher_id == null)
                                                                                <input id="voucher_key" type="text" class="form-control @error('voucher_key') is-invalid @enderror" name="voucher_key" value="-" required autocomplete="voucher_key" readonly>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif                                                                

                                                                        <form method="POST" action="{{ route('kulkas-trade.kulkas_proses',[$kulkas_detail->id]) }}">
                                                                            @csrf
                                                                            @if($kulkas_detail->status == 1 && $currentUser->roles_id == 1 || $kulkas_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $kulkas_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $kulkas_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if( $currentUser->roles_id == 1 && $kulkas_detail->status != 1 && $kulkas_detail->status != 2 )
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $kulkas_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($kulkas_detail->status == 1 && $currentUser->roles_id == 1 || $kulkas_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $kulkas_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $kulkas_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $kulkas_detail->status != 1 && $kulkas_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $kulkas_detail->note }}</textarea>
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
                                                <a href="{{ route('kulkas-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>

                                            @if($currentUser->roles_id == 1)
                                            @if($kulkas_detail->status == 1)
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

                                            @if($kulkas_detail->status == 2)
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

                                            @if($kulkas_detail->status == 4)
                                            <table>
                                                <th style="margin-right: 10px;">
                                                    @csrf 
                                                        <button type="submit" name="action" value="claim" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" >
                                                        claim
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