{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Detail Trade Mesin Cuci
                                                <div class="text-muted pt-2 font-size-sm">Detail of Trade Mesin Cuci</div></h3>
                                        </div>
                                        <h1><span><span class="badge  badge-warning">Mesin Cuci</span></span></h1>
                                    </div>
                                    <div class="card-body">
                                    @if($currentUser->roles_id == 1)
                                    <form method="POST" action="{{  route('mesin-cuci-notification', [$mesin_cuci_detail->id]) }}">
                                    <a href="{{ route('generate_mesin_cuci',  $mesin_cuci_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
                                    <a href="{{ route('generate_mesin_cuci-picker',  $mesin_cuci_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
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
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $mesin_cuci_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $mesin_cuci_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>
                                                                                                                                                      
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">

                                                                        <div class="form-group row">
                                                                            <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $mesin_cuci_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                                            </div>
                                                                        </div> 

                                                                        <div class="form-group row">
                                                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                                                            <div class="col-md-12">
                                                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $mesin_cuci_detail->users->address }}</textarea>
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
                                                        <i class="flaticon2-shield"></i> About Mesin Cuci
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
                                                                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $mesin_cuci_detail->brand }}" required autocomplete="brand" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="type" class="col-md-6 col-form-label text-md-left">{{ __('Type Mesin Cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $mesin_cuci_detail->type }}" required autocomplete="type" readonly>
                                                                            </div>
                                                                        </div>                                                                      

                                                                        <div class="form-group row">
                                                                            <label for="condition" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Mesin Cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $mesin_cuci_detail->condition }}" required autocomplete="condition" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="kondisi_fisik" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Fisik Mesin Cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="kondisi_fisik" type="text" class="form-control @error('kondisi_fisik') is-invalid @enderror" name="kondisi_fisik" value="{{ $mesin_cuci_detail->kondisi_fisik }}" required autocomplete="kondisi_fisik" readonly>
                                                                            </div>
                                                                        </div>  

                                                                        <div class="form-group row">
                                                                            <label for="rubber" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Rubber Pada Kaki mesin cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="rubber" type="text" class="form-control @error('rubber') is-invalid @enderror" name="rubber" value="{{ $mesin_cuci_detail->rubber }}" required autocomplete="rubber" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="tutup" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Tutup pada Mesin Cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="tutup" type="text" class="form-control @error('tutup') is-invalid @enderror" name="tutup" value="{{ $mesin_cuci_detail->tutup }}" required autocomplete="tutup" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                        <div class="form-group row">
                                                                            <label for="tombol" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Tombol pada mesin cuci') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="tombol" type="text" class="form-control @error('tombol') is-invalid @enderror" name="tombol" value="{{ $mesin_cuci_detail->tombol }}" required autocomplete="tombol" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="pembuangan" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi pembuangan air') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="pembuangan" type="text" class="form-control @error('pembuangan') is-invalid @enderror" name="pembuangan" value="{{ $mesin_cuci_detail->pembuangan }}" required autocomplete="pembuangan" readonly>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
                                                                            <label for="pengering" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Spinner/ Pengering') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="pengering" type="text" class="form-control @error('pengering') is-invalid @enderror" name="pengering" value="{{ $mesin_cuci_detail->pengering }}" required autocomplete="pengering" readonly>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
                                                                            <label for="air_otomatis" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Air Otomatis') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="air_otomatis" type="text" class="form-control @error('air_otomatis') is-invalid @enderror" name="air_otomatis" value="{{ $mesin_cuci_detail->air_otomatis }}" required autocomplete="air_otomatis" readonly>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
                                                                            <label for="pemanas" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Pemanas') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="pemanas" type="text" class="form-control @error('pemanas') is-invalid @enderror" name="pemanas" value="{{ $mesin_cuci_detail->pemanas }}" required autocomplete="pemanas" readonly>
                                                                            </div>
                                                                        </div>

                                                                        @if($mesin_cuci_detail->status == 4 || $mesin_cuci_detail->status == 3)
                                                                        <div class="form-group row">
                                                                            <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                @if($mesin_cuci_detail->voucher_id != null)
                                                                                <input id="voucher_key" type="text" class="form-control @error('voucher_key') is-invalid @enderror" name="voucher_key" value="{{ $voucher->voucher_key }}" required autocomplete="voucher_key" readonly>
                                                                                @elseif($mesin_cuci_detail->voucher_id == null)
                                                                                <input id="voucher_key" type="text" class="form-control @error('voucher_key') is-invalid @enderror" name="voucher_key" value="-" required autocomplete="voucher_key" readonly>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                        <form method="POST" action="{{ route('mesin-cuci-trade.mesin_cuci_proses',[$mesin_cuci_detail->id]) }}">
                                                                            @csrf
                                                                            @if($mesin_cuci_detail->status == 1 && $currentUser->roles_id == 1 || $mesin_cuci_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $mesin_cuci_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $mesin_cuci_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $mesin_cuci_detail->status != 1 && $mesin_cuci_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $mesin_cuci_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($mesin_cuci_detail->status == 1 && $currentUser->roles_id == 1 || $mesin_cuci_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $mesin_cuci_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $mesin_cuci_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $mesin_cuci_detail->status != 1 && $mesin_cuci_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $mesin_cuci_detail->note }}</textarea>
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
                                                <a href="{{ route('mesin-cuci-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>

                                            @if($mesin_cuci_detail->status == 1)
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

                                            @if($mesin_cuci_detail->status == 2)
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

                                            @if($mesin_cuci_detail->status == 4)
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