{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

<!--begin::Content-->
<div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Detail Trade Handphone/Tablet
                                                <div class="text-muted pt-2 font-size-sm">Detail of Trade Handphone/Tablet</div></h3>
                                        </div>
                                        <h1><span><span class="badge  badge-warning">Handphone/Tablet</span></span></h1>
                                    </div>
                                    <div class="card-body">
                                    @if($currentUser->roles_id == 1)
                                    <form method="POST" action="{{  route('handphone-notification', [$hp_detail->id]) }}">
                                    <a href="{{ route('generate_hp',  $hp_detail->id) }}" class="btn btn-secondary">Surat Jalan Checker</a>
                                    <a href="{{ route('generate_hp-picker',  $hp_detail->id) }}" class="btn btn-secondary">Surat Jalan Picker</a>
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
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $hp_detail->users->name }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="customer-name" class="col-md-6 col-form-label text-md-left">{{ __('Customer Email') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-name" type="text" class="form-control @error('customer-name') is-invalid @enderror" name="customer-name" value="{{ $hp_detail->users->email }}" required autocomplete="customer-name" readonly>
                                                                                </div>
                                                                            </div>
                                                                                                                                                      
                                                                    </div>
                                                                    <div class="col-md-6 my-2 my-md-0">

                                                                    <div class="form-group row">
                                                                                <label for="customer-identity" class="col-md-6 col-form-label text-md-left">{{ __('No. Telphone') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="customer-identity" type="text" class="form-control @error('customer-identity') is-invalid @enderror" name="customer-identity" value="{{ $hp_detail->users->contact }}" required autocomplete="customer-identity" readonly>
                                                                                </div>
                                                                            </div> 

                                                                        <div class="form-group row">
                                                                            <label for="customer-address" class="col-md-6 col-form-label text-md-left">{{ __('Customer Address') }}</label>
                                                                            <div class="col-md-12">
                                                                                <textarea id="customer-address" rows="4" class="form-control @error('customer-address') is-invalid @enderror" name="customer-address" required autocomplete="customer-address" readonly>{{ $hp_detail->users->address }}</textarea>
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
                                                        <i class="flaticon2-shield"></i> About Handphone/Tablet
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
                                                                                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $hp_detail->brand }}" required autocomplete="brand">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="ram" class="col-md-6 col-form-label text-md-left">{{ __('Ram') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="ram" type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" value="{{ $hp_detail->ram }}" required autocomplete="ram" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="inch" class="col-md-6 col-form-label text-md-left">{{ __('Storage') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="inch" type="text" class="form-control @error('inch') is-invalid @enderror" name="inch" value="{{ $hp_detail->storages }}" required autocomplete="inch" readonly>
                                                                                </div>
                                                                            </div>                                                                            

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Screen') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->screen_has_problem == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->screen_has_problem == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Camera') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->camera_has_problem == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->camera_has_problem == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('WIFI') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->wifi_has_problem == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->wifi_has_problem == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Button') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->button_has_problem == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->button_has_problem == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Vibration') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->vibration == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->vibration == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
                                                                                @endif
                                                                                </div>
                                                                            </div>

                                                                            
                                                                            <div class="form-group row">
                                                                                <label for="device-model" class="col-md-6 col-form-label text-md-left">{{ __('Finger') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                @if($hp_detail->finger == 0)
                                                                                <input type="text" class="form-control" value="Normal" readonly/>
                                                                                @endif
                                                                                @if($hp_detail->finger == 1)
                                                                                <input type="text" class="form-control" value="Has Problem" readonly/>
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

                                                                            @if($hp_detail->status == 4 || $hp_detail->status == 3)
                                                                            <div class="form-group row">
                                                                                <label for="lokasi_trade" class="col-md-6 col-form-label text-md-left">{{ __('Voucher Key') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="lokasi_trade" type="text" class="form-control @error('lokasi_trade') is-invalid @enderror" name="lokasi_trade" value="{{ $voucher->voucher_key }}" required autocomplete="lokasi_trade" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <form method="POST" action="{{ route('handphone-trade.handphone_proses',[$hp_detail->id]) }}">
                                                                            @csrf
                                                                            @if($hp_detail->status == 1 && $currentUser->roles_id == 1 || $hp_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $hp_detail->price }}" required autocomplete="price">
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $hp_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id == 1 && $hp_detail->status != 1 && $hp_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Price') }}</label>
                
                                                                                <div class="col-md-12">
                                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $hp_detail->price }}" required autocomplete="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($hp_detail->status == 1 && $currentUser->roles_id == 1 || $hp_detail->status == 2 && $currentUser->roles_id == 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $hp_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if($currentUser->roles_id != 1)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">{{ $hp_detail->note }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @endif

                                                                            @if( $currentUser->roles_id == 1 && $hp_detail->status != 1 && $hp_detail->status != 2)
                                                                            <div class="form-group row">
                                                                                <label for="note" class="col-md-6 col-form-label text-md-left">{{ __('Note') }}</label>
                                                                                <div class="col-md-12">
                                                                                    <textarea id="note" rows="4" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note" readonly>{{ $hp_detail->note }}</textarea>
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
                                                <a href="{{ route('phone-trade') }}" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Kembali</a>
                                            </div>

                                            @if($hp_detail->status == 1)
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

                                            @if($hp_detail->status == 2)
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

                                            @if($hp_detail->status == 4)
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