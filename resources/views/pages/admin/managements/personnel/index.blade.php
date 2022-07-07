{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

        <div class="card card-custom" id="resource_management_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Personnel Management</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-circle btn-sm btn-hover-light-primary  mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            
            <div class="tab-preview">
                <ul class="nav nav-tabs" id="detailTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basic_infomation-tab" data-toggle="tab" href="#basic_infomation">
                            <span class="nav-text">Basic Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personnel-tab" data-toggle="tab" href="#personnel">
                            <span class="nav-text">Personnel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment">
                            <span class="nav-text">Employment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="document-tab" data-toggle="tab" href="#document">
                            <span class="nav-text">Document</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="medical_evaluation-tab" data-toggle="tab" href="#medical_evaluation" aria-controls="medical_evaluation">
                            <span class="nav-text">Medical Evaluation</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="detailTabContent">
                    {{-- basic information --}}
                    <div class="tab-pane fade p-7" id="basic_infomation" role="tabpanel" aria-labelledby="basic_infomation-tab">
                        <form class="form" id="basic_infomation_form" action="{{ route('managements.personnels.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Badge ID:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Badge ID" id="req_badge_id" name="req_badge_id" value="{{old('req_badge_id')}}" disabled/>
                                    <span class="form-text text-muted">Please enter your badge id</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Full Name" id="req_name" name="req_name" value="{{old('req_name')}}"/>
                                    <span class="form-text text-muted">Please enter your full name</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Mobilization Type:</label>
                                    <select class="form-control select2" id="req_mobilization_type" name="req_mobilization_type">
                                        <option value="">Choose</option>
                                        @foreach ($mobilizations as $mobilization)
                                            <option value="{{$mobilization->id}}" {{ old('req_mobilization_type') == $mobilization->id ? 'selected' : '' }}>{{$mobilization->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Manpower Source:</label>
                                    <select class="form-control select2" id="req_manpower_source" name="req_manpower_source">
                                        <option value="">Choose</option>
                                        @foreach ($manpowers as $manpower)
                                            <option value="{{$manpower->id}}" {{ old('req_manpower_source') == $manpower->id ? 'selected' : '' }}>{{$manpower->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Site:</label>
                                    <select class="form-control select2" id="req_site" name="req_site">
                                        <option value="">Choose</option>
                                        @foreach ($sites as $site)
                                            <option value="{{$site->id}}" {{ old('req_site') == $site->id ? 'selected' : '' }}>{{$site->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Location:</label>
                                    <select class="form-control select2" id="req_location" name="req_location" disabled>
                                        <option value="">Choose</option>
                                        @foreach ($locations as $location)
                                            <option value="{{$location->id}}" {{ old('req_location') == $location->id ? 'selected' : '' }}>{{$location->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Job Title:</label>
                                    <select class="form-control select2" id="req_job_title" name="req_job_title" disabled>
                                        <option value="">Choose</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" {{ old('req_job_title') == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Point of Hire:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Point of Hire" id="req_point_of_hire" name="req_point_of_hire" value="{{old('req_point_of_hire')}}"/>
                                    <span class="form-text text-muted">Please enter your point of hire</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Skill Level:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Skill Level" id="req_skill_level" name="req_skill_level" value="{{old('req_skill_level')}}"/>
                                    <span class="form-text text-muted">Please enter your skill level</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label>Direct / Indirect:</label>
                                    <textarea type="text" class="form-control form-control-solid" placeholder="Enter Direct / Indirect" id="req_direct" name="req_direct">{{old('req_direct')}}</textarea>
                                    <span class="form-text text-muted">Please enter direct / indirect</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Company Contract:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Company Contract" id="req_company_contract" name="req_company_contract" value="{{old('req_company_contract')}}"/>
                                    <span class="form-text text-muted">Please enter your company contract</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Status:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Status" id="req_status" name="req_status" value="{{old('req_status')}}"/>
                                    <span class="form-text text-muted">Please enter your status</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                    {{-- personnel --}}
                    <div class="tab-pane fade p-7" id="personnel" role="tabpanel" aria-labelledby="personnel-tab">
                        <form class="form" id="personnel_form" action="{{ route('managements.personnels.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Gender:</label>
                                    <select class="form-control select2" id="req_gender" name="req_gender">
                                        <option value="">Choose</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{$gender->identifier}}">{{$gender->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Birth Place:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Birth of Place" id="req_birth_place" name="req_birth_place" value="{{old('req_birth_place')}}"/>
                                    <span class="form-text text-muted">Please enter your birth of place</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Date of Birth:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_birth_date" data-toggle="datetimepicker" data-target="#req_birth_date" placeholder="Select Date" id="req_birth_date" value="{{ old('req_birth_date') }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label>Address:</label>
                                    <textarea type="text" class="form-control form-control-solid" placeholder="Enter Your Address" id="req_address" name="req_address">{{old('req_address')}}</textarea>
                                    <span class="form-text text-muted">Please enter your address</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Kabupaten:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your Kabupaten" id="req_kabupaten" name="req_kabupaten" value="{{old('req_kabupaten')}}"/>
                                    <span class="form-text text-muted">Please enter your kabupaten</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Kecamatan:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your Kecamatan" id="req_kecamatan" name="req_kecamatan" value="{{old('req_kecamatan')}}"/>
                                    <span class="form-text text-muted">Please enter your kecamatan</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>KTP / Passport:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your KTP / Passport" id="req_ktp" name="req_ktp" value="{{old('req_ktp')}}"/>
                                    <span class="form-text text-muted">Please enter your KTP / Passport</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>NPWP:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your NPWP" id="req_npwp" name="req_npwp" value="{{old('req_npwp')}}"/>
                                    <span class="form-text text-muted">Please enter your NPWP</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Blood Type:</label>
                                    <select class="form-control select2" id="req_blood_type" name="req_blood_type">
                                        <option value="">Choose</option>
                                        @foreach ($bloods as $blood)
                                            <option value="{{$blood->id}}" {{ old('req_blood_type') == $blood->id ? 'selected' : '' }}>{{$blood->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Rhesus:</label>
                                    <select class="form-control select2" id="req_rhesus" name="req_rhesus">
                                        <option value="">Choose</option>
                                        <option value="plus">+</option>
                                        <option value="minus">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Emergency Contact Person:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Emergency Contact Person" id="req_emergency_contact_person" name="req_emergency_contact_person" value="{{old('req_emergency_contact_person')}}"/>
                                    <span class="form-text text-muted">Please enter your emergency Contact person</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Emergency Contact Number:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Emergency Contact Number" id="req_emergency_contact_number" name="req_emergency_contact_number" value="{{old('req_emergency_contact_number')}}"/>
                                    <span class="form-text text-muted">Please enter your Emergency Contact Number</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Religion:</label>
                                    <select class="form-control select2" id="req_religion" name="req_religion">
                                        <option value="">Choose</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{$religion->id}}" {{ old('req_religion') == $religion->id ? 'selected' : '' }}>{{$religion->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Nationality / Country:</label>
                                    <select class="form-control select2" id="req_nationality" name="req_nationality">
                                        <option value="">Choose</option>
                                        @foreach ($nationalities as $nationality)
                                        <option value="{{$nationality->id}}" {{ old('req_nationality') == $nationality->id ? 'selected' : '' }}>{{$nationality->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                    {{-- employment --}}
                    <div class="tab-pane fade p-7" id="employment" role="tabpanel" aria-labelledby="employment-tab">
                        <form class="form" id="employment_form" action="{{ route('managements.personnels.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Education:</label>
                                    <select class="form-control select2" id="req_education" name="req_education">
                                        <option value="">Choose</option>
                                        @foreach ($educations as $education)
                                            <option value="{{$education->id}}" {{ old('req_education') == $education->id ? 'selected' : '' }}>{{$education->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Work Experience:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Work Experience" id="req_work_experience" name="req_work_experience" value="{{old('req_work_experience')}}"/>
                                    <span class="form-text text-muted">Please enter your Work Experience</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Related Work Experience:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Related Work Experience" id="req_related_work_experience" name="req_related_work_experience" value="{{old('req_related_work_experience')}}"/>
                                    <span class="form-text text-muted">Please enter your Related Work Experience</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Employment Status:</label>
                                    <select class="form-control select2" id="req_employment_status" name="req_employment_status">
                                        <option value="">Choose</option>
                                        @foreach ($employment_statuses as $employment_status)
                                            <option value="{{$employment_status->id}}" {{ old('req_employment_status') == $employment_status->id ? 'selected' : '' }}>{{$employment_status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Employment Agreement #:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your Emplotment Agreement" id="req_employment_agreement" name="req_employment_agreement" value="{{old('req_employment_agreement')}}"/>
                                    <span class="form-text text-muted">Please enter your Emplotment Agreement</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Contract Start:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Contract End:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Discipline:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your Discipline" id="req_discipline" name="req_discipline" value="{{old('req_discipline')}}"/>
                                    <span class="form-text text-muted">Please enter your discipline</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Salary:</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Your Salary" id="req_salary" name="req_salary" value="{{old('req_salary')}}" disabled/>
                                    <span class="form-text text-muted">Please enter your salary</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>BPJS Class:</label>
                                    <select class="form-control select2" id="req_bpjs_class" name="req_bpjs_class">
                                        <option value="">Choose</option>
                                        @foreach ($bpjs_classes as $bpjs_class)
                                            <option value="{{$bpjs_class->id}}" {{ old('req_bpjs_class') == $bpjs_class->id ? 'selected' : '' }}>{{$bpjs_class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    
                    {{-- document --}}
                    <div class="tab-pane fade p-7" id="document" role="tabpanel" aria-labelledby="document-tab">
                        <!--begin: Datatable-->
                        <form class="form" id="add_site_form" action="{{ route('managements.personnels.store') }}" method="POST">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="mr-4 col-form-label text-lg-right">Pass Photo:</label>
                                    <input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/>
                                    <span class="form-text text-muted">Max file size is 2,5MB and max number of files is 1.</span>
                                </div>
                            </div>
                        </form>
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h4 class="card-label">Compulsory Document</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="datatable datatable-borderless" id="resource_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Document</th>
                                        <th>Attach</th>
                                        <th>Issue Date</th>
                                        <th>Expire Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td><label>CV</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>KTP / Passport</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>Assesment</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>HSE Training</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>Site ID</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>SKCK</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>Employment Contract</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td><label>Pre-Employment Induction</label></td>
                                            <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                            <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                            <td>Coming Soon...</td>
                                        </tr>
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>

                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h4 class="card-label">Compulsory Document</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="datatable datatable-borderless" id="four_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Document</th>
                                        <th>Attach</th>
                                        <th>Issue Date</th>
                                        <th>Expire Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td><label>- MMP</label></td>
                                        <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                        <td>Coming Soon...</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td><label>- MMR</label></td>
                                        <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                        <td>Coming Soon...</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td><label>- TSVA</label></td>
                                        <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                        <td>Coming Soon...</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td><label>- TASR</label></td>
                                        <td><input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/></td>
                                        <td><input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/></td>
                                        <td>Coming Soon...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                    {{-- Medical Evaluation --}}
                    <div class="tab-pane fade p-7" id="medical_evaluation" role="tabpanel" aria-labelledby="medical_evaluation-tab">
                        <form class="form" id="add_site_form" action="{{ route('managements.personnels.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="mr-4 col-form-label text-lg-right">Attach MCU Result:</label>
                                    <input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/>
                                    <span class="form-text text-muted">Max file size is 2,5MB and max number of files is 1.</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Attach MCU Result Issue Date:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Attach MCU Result Expire Date:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="mr-4 col-form-label text-lg-right">Attach Questionnaire:</label>
                                    <input id="req_file" name="req_file" type="file" class="file" data-show-preview="false"/>
                                    <span class="form-text text-muted">Max file size is 2,5MB and max number of files is 1.</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Attach Questionnaire Issue Date:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_start" data-toggle="datetimepicker" data-target="#req_contract_start" placeholder="Select Date" id="req_contract_start" value="{{ old('req_contract_start') }}"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Attach Questionnaire Expire Date:</label>
                                    <input type="text" class="form-control datetimepicker-input my-datepicker" name="req_contract_end" data-toggle="datetimepicker" data-target="#req_contract_end" placeholder="Select Date" id="req_contract_end" value="{{ old('req_contract_end') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
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
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
<script> 
    $(function(){
        var resource_management_card = new KTCard('resource_management_card');
        $('#basic_infomation_form').validate({
            errorClass:"error-msg",
            errorElement:"p",
            rules:{
                req_badge_id: 'required',
                req_name: 'required',
                req_mobilization_type: 'required',
                req_manpower_source: 'required',
                req_site: 'required',
                req_location: 'required',
                req_job_title: 'required',
                req_point_of_hire: 'required',
                req_skill_level: 'required',
                req_direct: 'required',
                req_company_contract: 'required',
                req_status: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })

        $('#personnel_form').validate({
            errorClass:"error-msg",
            errorElement:"p",
            rules:{
                req_gender: 'required',
                req_birth_place: 'required',
                req_birth_date: 'required',
                req_address: 'required',
                req_kabupaten: 'required',
                req_kecamatan: 'required',
                req_ktp: {
                    required:true,
                    number:true
                },
                req_npwp:{
                    number:true
                },
                req_blood_type: 'required',
                req_rhesus: 'required',
                req_emergency_contact_person: 'required',
                req_emergency_contact_number: {
                    required:true,
                    number:true
                },
                req_religion: 'required',
                req_nationality: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })

        $('#employment_form').validate({
            errorClass:"error-msg",
            errorElement:"p",
            rules:{
                req_education: 'required',
                req_work_experience: {
                    required:true,
                    number:true
                },
                req_related_work_experience:{
                    required:true,
                    number:true
                },
                req_employment_status: 'required',
                req_employment_agreement: 'required',
                req_contract_start: 'required',
                req_contract_end: 'required',
                req_discipline: 'required',                
                req_bpjs_class: 'required'
            },
            submitHandler:function(form){
                form.submit();
            }
        })

        $('#basic_information').tab('show')

        $('#req_site').change(function(){
            var site_id = $.trim($(this).val());
            $('#req_location').find('option').remove().end();
            $('#req_job_title').find('option').remove().end();
            $('#req_location').prop('disabled', true);
            $('#req_job_title').prop('disabled', true);
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

        $('#req_location').change(function(){
            var site_id = $.trim($('#req_site').val());
            var location_id = $.trim($(this).val());
            $('#req_job_title').find('option').remove().end();       
            $('#req_job_title').prop('disabled', true);
            if(site_id && location_id){
                $.ajax({
                    url: '/managements/roles/site/' + site_id + '/location/' + location_id,
                    method: 'GET',
                    success: function(res){
                        console.log(res);
                        $('#req_job_title').append('<option value="">Choose Job Title...</option>')
                        if(res.data.length > 0){
                            console.log('Berisi');
                            $.each(res.data, function(index, value){
                                $('#req_job_title').append('<option value="'+ value.id +'">'+ value.name +'</option>')
                            })
                        }
                        $('#req_job_title').prop('disabled', false);
                    },
                    error: function(err){
                        $('#req_job_title').prop('disabled', true);
                        console.error(err)
                    }
                })
            }
        });

        $('.select2').select2({
            placeholder: "Choose..."
        })

        $('.my-datepicker').datetimepicker({
            useCurrent:false,
            format: 'YYYY-MM-DD'
        })

        $('.my-datepicker').keydown(function(e){
            e.preventDefault();
        })

    })
</script>

@endsection