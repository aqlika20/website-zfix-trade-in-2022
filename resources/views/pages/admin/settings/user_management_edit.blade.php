{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">User Management
                                            <div class="text-muted pt-2 font-size-sm">Edit User Management</div></h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Search Form-->
                                        <!--begin::Search Form-->
                                        <div class="mb-7">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6 my-2 my-md-0">
                                                            <form method="POST" action="{{ route('user-management.edit',[$user->id]) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                
                                                                <div class="form-group row">
                                                                    <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="roles_id" class="col-md-6 col-form-label text-md-left">{{ __('Role') }}</label>

                                                                    <div class="col-md-12">
                                                                        <select id="roles_id" class="form-control" name="roles_id" required autofocus>
                                                                            <option value="">Choose</option>
                                                                            <option value="1" @if ($user->roles_id == 1) {{ 'selected' }} @endif>Admin</option>
                                                                            <option value="2" @if ($user->roles_id == 2) {{ 'selected' }} @endif>Staff</option>
                                                                            <option value="3" @if ($user->roles_id == 3) {{ 'selected' }} @endif>Viewer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <a href="/setting/user-management" class="btn btn-secondary">Back</a>
                                                                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Search Form-->
                                        <!--end: Search Form-->
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