{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <div class="card card-custom bg-white-100 {{ @$class }}">
                {{-- Header --}}
                <div class="card-header border-0 bg-white py-5">
                    <h3 class="card-title font-weight-bolder text-black">All Process</h3>
                </div>
                {{-- Body --}}
                <div class="card-body p-0 position-relative overflow-hidden">
                    {{-- Chart --}}
                    <div class="card-rounded-bottom" ></div>

                    {{-- Stats --}}
                    <div class="card-spacer">
                        {{-- Row --}}
                        <div class="row">
                            <div class="col-lg-6 mb-7">
                                <div class="card rounded-xl text-center">
                                    <div class="card-header rounded-xl bg-danger border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label mb-0 text-white">
                                                Quarantine
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="separator separator-solid separator-white opacity-20"></div>
                                    <div class="card-body">
                                           <h2>300 Workers</h2>
                                    </div>
                                    <div class="card-footer rounded-xl d-flex justify-content-center align-text-middle">
                                        <h5 class="mb-0"><span class="label label-inline label-warning">30</span> Workers schedule end this week. </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7">
                                <div class="card rounded-xl text-center">
                                    <div class="card-header rounded-xl bg-primary border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label mb-0 text-white">
                                                On Site
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="separator separator-solid separator-white opacity-20"></div>
                                    <div class="card-body">
                                           <h2>300 Workers</h2>
                                    </div>
                                    <div class="card-footer rounded-xl d-flex justify-content-center">
                                        <h5 class="mb-0"><span class="label label-inline label-warning">30</span> Workers schedule end this week. </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Row --}}
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card rounded-xl text-center">
                                    <div class="card-header rounded-xl bg-success border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label mb-0 text-white">
                                                Rota Off
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="separator separator-solid separator-white opacity-20"></div>
                                    <div class="card-body">
                                           <h2>300 Workers</h2>
                                    </div>
                                    <div class="card-footer rounded-xl d-flex justify-content-center">
                                        <h5 class="mb-0"><span class="label label-inline label-warning">30</span> Workers schedule end this week. </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
