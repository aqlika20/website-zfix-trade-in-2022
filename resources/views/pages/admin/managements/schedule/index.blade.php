{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom" id="schedule_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Schedule Management</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary  mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <form class="form" id="add_schedule_form" action="{{ route('managements.schedules.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label>ID Worker</label>
                            <div>
                                <select class="form-control select2" id="req_workers" name="req_workers[]" multiple="multiple">
                                    <option value="">Pilih</option>
                                    {{-- @foreach ($workers as $worker)
                                        <option value="{{$worker->badge_id}}">{{$worker->badge_id}} | {{$worker->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Site Name</label>
                            <div>
                                <select class="form-control select2" id="req_site" name="req_site">
                                    <option value="">Pilih</option>
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

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Quarantine Start:</label> 
                            <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_quarantine_start" data-toggle="datetimepicker" data-target="#req_quarantine_start" placeholder="Select Date" id="req_quarantine_start" value="{{ old('req_quarantine_start') }}"/>
                            <span class="form-text text-muted">Please input the date from start.</span>
       
                        </div>
                        <div class="col-lg-6">
                            <label>Quarantine End:</label>
                            <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_quarantine_end" data-toggle="datetimepicker" data-target="#req_quarantine_end" placeholder="Select Date" id="req_quarantine_end" value="{{ old('req_quarantine_end') }}"/>
                        </div>      
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>On Site Start:</label>
                            <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_on_site_start" data-toggle="datetimepicker" data-target="#req_on_site_start" placeholder="Select Date" id="req_on_site_start" value="{{ old('req_on_site_start') }}"/>
                            <span class="form-text text-muted">Please input the date from start.</span>
                        </div>
                        <div class="col-lg-6">
                            <label>On Site End:</label>
                            <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_on_site_end" data-toggle="datetimepicker" data-target="#req_on_site_end" placeholder="Select Date" id="req_on_site_end" value="{{ old('req_on_site_end') }}"/>
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
                    <h3 class="card-label">List of schedule</h3>
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
                                        <input type="text" class="form-control" placeholder="Search Name" id="schedule_table_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Site:</label>
                                        <select class="form-control" id="schedule_table_search_site">
                                            <option value="">All</option>
                                            @foreach($sites as $site)
                                                <option value="{{$site->name}}">{{$site->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--begin: Datatable-->

                <table class="datatable datatable-borderless" id="schedule_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Site</th>
                            <th>Location</th>
                            <th>Quarantine Start</th>
                            <th>Quarantine End</th>
                            <th>On Site Start</th>
                            <th>On Site End</th>
                            <th>Rota Off Start</th>
                            <th>Rota Off End</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>#</td>
                            <td>{{ Helper::defineBadgeIDBy('badge_id', $schedule->workers_id)->name }}</td>
                            <td>{{ Helper::defineSiteBy('id', $schedule->sites_id)->name }}</td>
                            <td>{{ Helper::defineLocationBy('id', $schedule->locations_id)->name }}</td>
                            <td>{{ Helper::convertDate($schedule->quarantine_start) }}</td>
                            <td>{{ Helper::convertDate($schedule->quarantine_end) }}</td>
                            <td>{{ Helper::convertDate($schedule->on_site_start) }}</td>
                            <td>{{ Helper::convertDate($schedule->on_site_end) }}</td>
                            <td>{{ Helper::convertDate($schedule->rota_off_start) }}</td>
                            <td>{{ Helper::convertDate($schedule->rota_off_end) }}</td>
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
        var schedule_management_card = new KTCard('schedule_management_card');

        $('#req_site').select2({
            placeholder: "Select Site..."
        });
        $('#req_location').select2({
            placeholder: "Select Site..."
        });
        $('#req_workers').select2({
            placeholder: "Select Worker",
        });

        $('.my-datepicker').datetimepicker({
            useCurrent:false,
            format: 'YYYY-MM-DD'
        })

        $('.my-datepicker').keydown(function(e){
            e.preventDefault();
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
        
        function applyTimePicker(type, id, date){
            switch(type){
                case 'min':
                    $(id).datetimepicker('minDate', date);
                    break;
                case 'max':
                    $(id).datetimepicker('maxDate', date);
                    break;
            }
        }

        function renewDate(type, date){
            var new_date = null;
            switch(type){
                case 'min':
                    new_date = moment(date).add(1, "days");
                    break;
                case 'max':
                    new_date = moment(date).subtract(1, "days");
                    break;
            }

            return new_date;
        }



        $('#req_quarantine_start').on('change.datetimepicker', function(e) {
            if(e.date){
                var min_date = renewDate('min', e.date);
                applyTimePicker('min', '#req_quarantine_end', min_date);
                applyTimePicker('min', '#req_on_site_start', min_date);
                applyTimePicker('min', '#req_on_site_end', min_date);

                if($('#req_on_site_start').val()){
                    $('#req_on_site_start').val(min_date.format('YYYY-MM-DD'));     
                }
            }
        });

        $('#req_quarantine_end').on('change.datetimepicker', function(e) {
            if(e.date){
                
                var max_date = renewDate('max', e.date);
                var min_date = renewDate('min', e.date);
                
                applyTimePicker('max', '#req_quarantine_start', max_date); 
                applyTimePicker('min', '#req_on_site_start', min_date); 

                if($('#req_on_site_start').val()){
                    $('#req_on_site_start').val(min_date.format('YYYY-MM-DD'));
                }
            }
        });

        $('#req_on_site_start').on('change.datetimepicker', function(e) {
            if(e.date){
                     
                var max_date = renewDate('max', e.date);
                var min_date = renewDate('min', e.date);

                applyTimePicker('min', '#req_on_site_end', min_date);
            }
        });

        $('#req_on_site_end').on('change.datetimepicker', function(e) {
            if(e.date){
         
                var max_date = renewDate('max', e.date);
                var min_date = renewDate('min', e.date);

                applyTimePicker('max', '#req_quarantine_start', max_date);
                applyTimePicker('max', '#req_quarantine_end', max_date);
                applyTimePicker('max', '#req_on_site_start', max_date); 
            }
        });

        $('#add_schedule_form').validate({
            errorClass:"error-msg",
            errorElement:"p",
            rules:{
                "req_workers[]": 'required',
                req_site: 'required',
                req_location: 'required',
                req_on_site_start: 'required',
                req_on_site_end: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })
    })
</script>
@endsection