{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom" id="field_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">field Management</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary  mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">

                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search By Name" id="field_table_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->

                <!--begin: Datatable-->
                <table class="datatable datatable-borderless" id="field_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
			        @foreach($fields as $field)
                            <tr>
                                <td>#</td>
                                <td>{{$field->name}}</td>
                                <td>Coming Soon..</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <div class="card-body">
                <form class="form" id="add_field_form" action="{{ route('managements.fields.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Full Name field" id="req_name" name="req_name" value="{{old('req_name')}}"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card card-custom mt-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">List of fields</h3>
                </div>
            </div>
            <div class="card-body">

                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search By Name" id="field_table_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->

                <!--begin: Datatable-->
                <table class="datatable datatable-borderless" id="field_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
			        @foreach($fields as $field)
                            <tr>
                                <td>#</td>
                                <td>{{$field->name}}</td>
                                <td>Coming Soon..</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
<script> 
    $(function(){
        var field_management_card = new KTCard('field_management_card');

        $('#add_field_form').validate({
            errorClass:"error-msg",
            errorElement: 'p',
            rules:{
                req_name: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })
    })
</script>
@endsection