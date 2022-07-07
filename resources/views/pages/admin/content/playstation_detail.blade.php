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
                                    @if($currentUser->roles_id == 1)
                                    <form method="POST" action="{{  route('ps-notification', [$ps_detail->id]) }}">
                                    <a href="{{ route('generate_ps',  $ps_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
                                    <a href="{{ route('generate_ps-picker',  $ps_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
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
                                                                            <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Tempat anda melakukan Trade In') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $lokasi->name }}" required autocomplete="lokasi_trade" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="jenis_ps" class="col-md-6 col-form-label text-md-left">{{ __('Jenis Playstation') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="jenis_ps" type="text" class="form-control @error('jenis_ps') is-invalid @enderror" name="jenis_ps" value="{{ $ps_detail->jenis_ps }}" required autocomplete="jenis_ps" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="type" class="col-md-6 col-form-label text-md-left">{{ __('Model Playstation') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $ps_detail->type }}" required autocomplete="type" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="storage" class="col-md-6 col-form-label text-md-left">{{ __('Storage') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="storage" type="text" class="form-control @error('storage') is-invalid @enderror" name="storage" value="{{ $ps_detail->storages }}" required autocomplete="storage" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="kondisi_ps" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Playstation') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="kondisi_ps" type="text" class="form-control @error('kondisi_ps') is-invalid @enderror" name="kondisi_ps" value="{{ $ps_detail->kondisi_ps }}" required autocomplete="kondisi_ps" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 my-2 my-md-0">
                                                                        <div class="form-group row">
                                                                            <label for="condition" class="col-md-6 col-form-label text-md-left">{{ __('Kondisi Fisik Playstation') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $ps_detail->condition }}" required autocomplete="condition" readonly>
                                                                            </div>
                                                                        </div>  

                                                                        <div class="form-group row">
                                                                            <label for="console" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi stick/Console Playstation') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="console" type="text" class="form-control @error('console') is-invalid @enderror" name="console" value="{{ $ps_detail->console }}" required autocomplete="console" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="port" class="col-md-6 col-form-label text-md-left">{{ __('Fungsi Port USB') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="port" type="text" class="form-control @error('port') is-invalid @enderror" name="port" value="{{ $ps_detail->port }}" required autocomplete="port" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="add_games" class="col-md-6 col-form-label text-md-left">{{ __('Add On Games') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="add_games" type="text" class="form-control @error('add_games') is-invalid @enderror" name="add_games" value="{{ $ps_detail->add_games }}" required autocomplete="add_games" readonly>
                                                                            </div>
                                                                        </div>                                                                            

                                                                        <div class="form-group row">
                                                                            <label for="addition" class="col-md-6 col-form-label text-md-left">{{ __('Kelengkapan') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="addition" type="text" class="form-control @error('addition') is-invalid @enderror" name="addition" value="{{ $ps_detail->addition }}" required autocomplete="addition" readonly>
                                                                            </div>
                                                                        </div>

                                                                        @if($ps_detail->status == 4 || $ps_detail->status == 3)
                                                                        <div class="form-group row">
                                                                            <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
            
                                                                            <div class="col-md-12">
                                                                                <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $voucher->voucher_key }}" required autocomplete="lokasi_trade" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                        <form method="POST" action="{{ route('ps-trade.ps_proses',[$ps_detail->id]) }}">
                                                                            @csrf

                                                                            @if($ps_detail->status == 1 && $currentUser->roles_id == 1 || $ps_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $ps_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $ps_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if( $currentUser->roles_id == 1 && $ps_detail->status != 1 && $ps_detail->status != 2 )
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $ps_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($ps_detail->status == 1 && $currentUser->roles_id == 1 || $ps_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $ps_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $ps_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $ps_detail->status != 1 && $ps_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $ps_detail->note }}</textarea>
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
                                                <a href="{{ route('ps-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>
                                            @if($currentUser->roles_id == 1)
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
                                            
                                            @if($ps_detail->status == 2)
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

                                            @if($ps_detail->status == 4)
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