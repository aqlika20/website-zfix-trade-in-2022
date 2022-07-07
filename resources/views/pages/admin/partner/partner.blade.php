{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Register New Partner
                                            <div class="text-muted pt-2 font-size-sm">List of Register New Partner</div></h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Dropdown-->
                                            <!-- <div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="svg-icon svg-icon-md"> -->
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                        </g>
                                                    </svg> -->
                                                    <!--end::Svg Icon-->
                                                <!-- </span>Export</button> -->
                                                <!--begin::Dropdown Menu-->
                                                <!-- <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"> -->
                                                    <!--begin::Navigation-->
                                                    <!-- <ul class="navi flex-column navi-hover py-2">
                                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="la la-print"></i>
                                                                </span>
                                                                <span class="navi-text">Print</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="la la-copy"></i>
                                                                </span>
                                                                <span class="navi-text">Copy</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="la la-file-excel-o"></i>
                                                                </span>
                                                                <span class="navi-text">Excel</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="la la-file-text-o"></i>
                                                                </span>
                                                                <span class="navi-text">CSV</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="la la-file-pdf-o"></i>
                                                                </span>
                                                                <span class="navi-text">PDF</span>
                                                            </a>
                                                        </li>
                                                    </ul> -->
                                                    <!--end::Navigation-->
                                                <!-- </div> -->
                                                <!--end::Dropdown Menu-->
                                            <!-- </div> -->
                                            <!--end::Dropdown-->
                                            <!--begin::Button-->
                                            <button  href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#newDataModal">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>New Data</button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Search Form-->
                                        <!--begin::Search Form-->
                                        <div class="mb-7">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-4 my-2 my-md-0">
                                                            <div class="input-icon">
                                                                <input type="text" class="form-control" placeholder="Search Partner Key" id="register_new_partner_search_query" />
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
                                        <!--end: Search Form-->
                                        <!--begin: Datatable-->
                                        <table class="datatable datatable-borderless" id="register_new_partner">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>PIC</th>
                                                    <th>Contact PIC</th>
                                                    <th>Partner Key</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $num = 0
                                            @endphp
                                            @foreach ($partners as $partner)
                                                <tr>
                                                    <td>{{ $num+=1 }}</td>
                                                    <td>{{ $partner->users->name }}</td>
                                                    <td>{{ $partner->address }}</td>
                                                    <td>{{ $partner->pic }}</td>
                                                    <td>{{ $partner->contact }}</td>
                                                    <td>{{ $partner->partner_key }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('partner.delete',[$partner->id]) }}">
                                                            @csrf 
                                                            @method('DELETE')
                                                            
                                                            <a href="{{ route('partner.edit',[$partner->id]) }}" title="Edit" class="btn btn-icon btn-light btn-sm mx-1">
                                                                {{ Metronic::getSVG("media/svg/icons/Communication/Write.svg", "svg-icon-md svg-icon-primary") }}
                                                            </a>
                                                            <a href="{{ route('partner.tracking',[$partner->id]) }}" title="Tracking" class="btn btn-icon btn-light btn-sm mx-1">
                                                                {{ Metronic::getSVG("media/svg/icons/Map/Position.svg", "svg-icon-md svg-icon-primary") }}
                                                            </a>
                                                            <button type="submit" title="Delete" class="btn btn-icon btn-light btn-sm mx-1" onclick='return confirm("Are you sure?")'>
                                                                {{ Metronic::getSVG("media/svg/icons/General/Trash.svg", "svg-icon-md svg-icon-primary") }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <form method="POST" action="{{ route('partner.create') }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newDataModalLabel">New Data</h5>
                                            </div>
                                            <div class="modal-body">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('PIC') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="pic" type="text" class="form-control @error('pic') is-invalid @enderror" name="pic" required autocomplete="pic" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact PIC') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="contact" type="tel" pattern="[0-9]+" class="form-control @error('contact') is-invalid @enderror" name="contact" required autocomplete="contact" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                                    <div class="col-md-6">
                                                        <textarea id="address" rows="4" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="partner_key" class="col-md-4 col-form-label text-md-right">{{ __('Partner Key') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="partner_key" type="text" class="form-control @error('partner_key') is-invalid @enderror" name="partner_key" required autocomplete="partner_key" autofocus>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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
@endsection