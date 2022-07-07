{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom"  id="role_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Create New Role's</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary  mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form" id="add_role_form" action="{{ route('managements.roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Site Name</label>
                            <div>
                                <select class="form-control select2" id="req_site" name="req_site">
                                    <option value="">Choose Site...</option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Location</label>
                            <div>
                                <select class="form-control select2" id="req_location" name="req_location" disabled>
                                    <option value="">Choose Location...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Role Name:</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Role Name" id="req_name" name="req_name" value="{{old('req_name')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Rate/Hours:</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Rate/Hours" id="req_rate" name="req_rate" value="{{old('req_rate')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Overtime/Hours:</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Overtime/Hours" id="req_overtime" name="req_overtime" value="{{old('req_overtime')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Quarantine/Days:</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Quarantuine/Hours" id="req_quarantine" name="req_quarantine" value="{{old('req_quarantine')}}"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" form="add_role_form" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card card-custom mt-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">List of roles</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search Name" id="role_table_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Rate:</label>
                                        <select class="form-control" id="role_table_search_role">
                                            <option value="">All</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-borderless" id="role_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Site Name</th>
                            <th>Location</th>
                            <th>Role Name</th>
                            <th>Rate/Hours</th>
                            <th>Overtime/Hours</th>
                            <th>Quarantine/Days</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>#</td>
                            <td>{{ Helper::defineSiteBy('id', $role->sites_id)->name }}</td>
                            <td>{{ Helper::defineLocationBy('id', $role->locations_id)->name }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ Helper::convertToRupiah($role->rate_hour) }}</td>
                            <td>{{ Helper::convertToRupiah($role->rate_overtime) }}</td>
                            <td>{{ Helper::convertToRupiah($role->rate_quarantine) }}</td>
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
        var role_management_card = new KTCard('role_management_card');
        $('#add_role_form').validate({
            errorClass:"error-msg",
            errorElement: 'p',
            rules:{
                req_site: 'required',
                req_location: 'required',
                req_name: 'required',
                req_rate: {
                    required:true,
                    number:true
                },
                req_overtime:{
                    required:true,
                    number:true
                },
                req_quarantine:{
                    required:true,
                    number:true
                }
            },
            submitHandler:function(form){
                form.submit();
            }
        })

        $('#req_site').select2({
            placeholder: "Choose Site..."
        })

        $('#req_location').select2({
            placeholder: "Choose Location..."
        })

        $('#req_site').change(function(){
            var site_id = $.trim($(this).val());
            $('#req_location').find('option').remove().end();
            $('#req_location').prop('disabled', true);
            if(site_id){
                $.ajax({
                    url: '/managements/locations/site/' + site_id,
                    method: 'GET',
                    success: function(res){
                        $('#req_location').append('<option value="">Choose Location...</option>')
                        if(res.data.length > 0){
                            $.each(res.data, function(index, value){
                                $('#req_location').append('<option value="'+ value.id +'">'+ value.name +'</option>')
                            })
                        }
                        $('#req_location').prop('disabled', false);
                    },
                    error: function(err){
                        $('#req_location').prop('disabled', true);
                        console.error(err)
                    }
                })
            }
        });
    })
</script>
@endsection