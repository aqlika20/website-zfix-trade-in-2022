{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')


    <div class="row">
        <div class="col-lg-12 col-xxl-12">
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