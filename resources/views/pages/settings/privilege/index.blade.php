{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom" id="privilege_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Privilege Management</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary  mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form" id="add_privilege_form" action="{{ route('settings.privileges.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Full Name" id="req_name" name="req_name" value="{{old('req_name')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Enter Email" id="req_email" name="req_email" value="{{old('req_email')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control form-control-solid" placeholder="Enter Password" id="req_password" name="req_password"/>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control form-control-solid" placeholder="Enter Confirm Password" id="req_confirm_password" name="req_confirm_password"/>
                    </div>
                    <div class="form-group">
                        <label>Privilege</label>
                        <div>
                            <select class="form-control select2" id="req_privilege" name="req_privilege">
                                <option value="">Pilih</option>
                                @foreach ($privileges as $privilege)
                                    <option value="{{$privilege->id}}">{{$privilege->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card card-custom mt-3">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">List of privilege</h3>
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
                                        <input type="text" class="form-control" placeholder="Search Email" id="privilege_table_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">privilege:</label>
                                        <select class="form-control" id="privilege_table_search_privilege">
                                            <option value="">All</option>
                                            @foreach($privileges as $privilege)
                                                <option value="{{$privilege->name}}">{{$privilege->name}}</option>
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
                {{-- {{$users}} --}}
                <table class="datatable datatable-borderless" id="privilege_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Privilege</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>#</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->privileges_id }}</td> --}}
                            <td>{{ Helper::definePrivilegeBy('id', $user->privileges_id)->name }}</td>
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
        var privilege_management_card = new KTCard('privilege_management_card');

        $('#add_privilege_form').validate({
            errorClass:"error-msg",
            errorElement:"p",
            rules:{
                req_name: 'required',
                req_email: {
                    required:true,
                    email:true
                },
                req_password: 'required',
                req_confirm_password:{
                    required:true,
                    equalTo: "#req_password"
                },
                req_privilege: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })
        $('#req_privilege').select2({
            placeholder: "Choose Privilege..."
        });
    })
</script>
@endsection