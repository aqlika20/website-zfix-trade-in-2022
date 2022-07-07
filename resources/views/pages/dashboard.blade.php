{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')


    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            @if ($currentUser->roles_id != 4 && $currentUser->roles_id != 5) 
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
                                <a href="phone" class="text-warning font-weight-bold font-size-h6">
                                    Phone
                                </a>
                                <h3><span id="hp" class="badge badge-warning mt-2">{{$count_hp}}</span><h3>
                            </div>
                            <div class="col bg-light-success px-6 py-8 rounded-xl mb-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/Laptop.svg", "svg-icon-3x svg-icon-success d-block my-2") }}
                                <a href="laptop" class="text-success font-weight-bold font-size-h6 mt-2">
                                    Laptop
                                </a>
                                <h3><span id="laptop" class="badge badge-success mt-2">{{$count_laptop}}</span><h3>
                            </div>
                        </div>
                        {{-- Row --}}
                        <div class="row m-0"> 
                            <div class="col bg-light-danger px-6 py-8 rounded-xl mb-7 mr-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/TV2.svg", "svg-icon-3x svg-icon-danger d-block my-2") }}
                                <a href="Televisi" class="text-danger font-weight-bold font-size-h6 mt-2">
                                    Televisi
                                </a>
                                <h3><span id="tv" class="badge badge-danger mt-2">{{$count_tv}}</span><h3>
                            </div>
                            <div class="col bg-light-secondary px-6 py-8 rounded-xl mb-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Devices/Gamepad2.svg", "svg-icon-3x svg-icon-secondary d-block my-2") }}
                                <a href="playstation" class="text-secondary font-weight-bold font-size-h6 mt-2">
                                    Playstation
                                </a>
                                <h3><span id="ps" class="badge badge-secondary mt-2">{{$count_ps}}</span><h3>
                            </div>
                        </div>
                        {{-- Row --}}
                        <div class="row m-0"> 
                            <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Home/Refrigerator.svg", "svg-icon-3x svg-icon-primary d-block my-2") }}
                                <a href="kulkas" class="text-primary font-weight-bold font-size-h6 mt-2">
                                    Kulkas
                                </a>
                                <h3><span id="kulkas" class="badge badge-primary mt-2">{{$count_kulkas}}</span><h3>
                            </div>
                            <div class="col bg-light-info px-6 py-8 rounded-xl mb-7 text-center">
                                {{ Metronic::getSVG("media/svg/icons/Home/Washing-machine.svg", "svg-icon-3x svg-icon-primary d-block my-2") }}
                                <a href="mesin-cuci" class="text-info font-weight-bold font-size-h6 mt-2">
                                    Mesin Cuci
                                </a>
                                <h3><span id="mesin_cuci" class="badge badge-info mt-2">{{$count_mesin_cuci}}</span><h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($currentUser->roles_id == 4) 
            <div class="card card-custom bg-gray-100 {{ @$class }}">
                {{-- Header --}}
                <div class="card-header border-0 py-5">
                    <h3 class="card-title font-weight-bolder">Welcome, Partner!</h3>
                </div>
                {{-- Body --}}
                <div class="card-body py-5 position-relative overflow-hidden">
                    <p>You can access the partner menu to access more feature.</p>
                </div>
            </div>
            @endif
            @if ($currentUser->roles_id == 5) 
            <div class="card card-custom bg-gray-100 {{ @$class }}">
                {{-- Header --}}
                <div class="card-header border-0 py-5">
                    <h3 class="card-title font-weight-bolder">Welcome, Customer!</h3>
                </div>
                {{-- Body --}}
                <div class="card-body py-5 position-relative overflow-hidden">
                    <p>You must use the ZFix Membership App to access more feature.</p>
                </div>
            </div>
            @endif
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

<script>
    $(document).ready(function (){

        setInterval(fetchCounting, 3000);

        function fetchCounting(){
            $.ajax({
                type: "GET",
                url: "/counting",
                dataType: "json",
                success: function (response) {
                        $('#kulkas').html(response.data.kulkas);
                        $('#laptop').html(response.data.laptop);
                        $('#ps').html(response.data.ps);
                        $('#hp').html(response.data.hp);
                        $('#mesin_cuci').html(response.data.mesin_cuci);
                        $('#tv').html(response.data.tv);

                }
            })
        }
    });
</script>
@endsection