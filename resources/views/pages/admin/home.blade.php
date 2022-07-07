{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')


    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <div class="card card-custom bg-gray-100 {{ @$class }}">
                {{-- Header --}}
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">All Process</h3>
                </div>
                {{-- Body --}}
                <div class="card-body p-0 position-relative overflow-hidden">
                    {{-- Chart --}}
                    <div class="card-rounded-bottom bg-danger" style="height: 50px"></div>

                    {{-- Stats --}}
                    <div class="card-spacer mt-n25">
                        {{-- Row --}}
                        <div class="row m-0">
                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7 mr-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/iPhone-X.svg", "svg-icon-3x svg-icon-warning d-block my-2") }}
                                <a href="" class="text-warning font-weight-bold font-size-h6">
                                    Phone
                                </a>
                                <h3><span class="badge badge-warning mt-2"></span><h3>
                            </div>
                            <div class="col bg-light-success px-6 py-8 rounded-xl mb-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/Laptop.svg", "svg-icon-3x svg-icon-success d-block my-2") }}
                                <a href="laptop" class="text-success font-weight-bold font-size-h6 mt-2">
                                    Laptop
                                </a>
                                <h3><span class="badge badge-success mt-2"></span><h3>
                            </div>
                        </div>
                        {{-- Row --}}
                        <div class="row m-0"> 
                            <div class="col bg-light-danger px-6 py-8 rounded-xl mb-7 mr-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/TV2.svg", "svg-icon-3x svg-icon-danger d-block my-2") }}
                                <a href="Televisi" class="text-danger font-weight-bold font-size-h6 mt-2">
                                    Televisi
                                </a>
                                <h3><span class="badge badge-danger mt-2"></span><h3>
                            </div>
                            <div class="col bg-light-secondary px-6 py-8 rounded-xl mb-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/Gamepad2.svg", "svg-icon-3x svg-icon-secondary d-block my-2") }}
                                <a href="playstation" class="text-secondary font-weight-bold font-size-h6 mt-2">
                                    Playstation
                                </a>
                                <h3><span class="badge badge-secondary mt-2"></span><h3>
                            </div>
                        </div>
                    </div>
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
<script>
    $('#available').tab('show')
</script>
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection