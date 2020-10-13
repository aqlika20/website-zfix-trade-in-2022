{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom" id="location_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Location Management</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form" id="add_location_form" action="{{ route('managements.locations.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Site</label>
                        <select class="form-control select2" id="req_site" name="req_site">
                            <option value="">Select...</option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-solid" placeholder="The Location Name..." id="req_name" name="req_name" value="{{old('req_name')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Person in Charge (PIC)</label>
                        <input type="text" class="form-control form-control-solid" placeholder="PIC..." id="req_pic" name="req_pic" value="{{old('req_pic')}}"/>
                    </div>
                    <div class="form-group">
                        <label>PIC Number</label>
                        <input type="text" class="form-control form-control-solid" placeholder="PIC Number..." id="req_pic_number" name="req_pic_number" value="{{old('req_pic_number')}}"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea type="text" class="form-control form-control-solid" placeholder="Location Address..." id="req_address" name="req_address">{{old('req_address')}}</textarea>
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
                    <h3 class="card-label">List of Locations</h3>
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
                                        <input type="text" class="form-control" placeholder="Search By Name" id="location_table_search_query" />
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
                <table class="datatable datatable-borderless" id="location_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Site Name</th>
                            <th>Location Name</th>
                            <th>PIC</th>
                            <th>PIC Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
			        @foreach($locations as $location)
                            <tr>
                                <td>#</td>
                                <td>{{ Helper::defineSiteBy('id', $location->sites_id)->name }}</td>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->pic }}</td>
                                <td>{{ $location->pic_number }}</td>
                                <td>{{ $location->address }}</td>
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
        var location_management_card = new KTCard('location_management_card');

        $('#add_location_form').validate({
            errorClass:"error-msg",
            errorElement: 'p',
            rules:{
                req_site: 'required',
                req_name: 'required',
                req_pic: 'required',
                req_pic_number: {
                    required: true,
                    number: true
                },
                req_address: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })

        $('.select2').select2({
            placeholder: 'Select...'
        });
    })
</script>
@endsection