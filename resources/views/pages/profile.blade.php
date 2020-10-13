{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Profile
                                            <div class="text-muted pt-2 font-size-sm">About Your Profile</div></h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordion-preview">
                                            <div class="card">
                                                <div class="card-header" id="headingOne6">
                                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#data">
                                                        <i class="flaticon2-file"></i> Data
                                                    </div>
                                                </div>
                                                <div id="data" class="collapse" data-parent="#accordion-preview">
                                                    <div class="card-body">
                                                        <form method="POST" action="{{ route('profile.edit',[$currentUser->id]) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            
                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>

                                                                <div class="col-md-12">
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $currentUser->name }}" required autocomplete="name" autofocus>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                                                <div class="col-md-12">
                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $currentUser->email }}" required autocomplete="email" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo6">
                                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#password">
                                                        <i class="flaticon2-shield"></i> Password
                                                    </div>
                                                </div>
                                                <div id="password" class="collapse" data-parent="#accordion-preview">
                                                    <div class="card-body">
                                                        <form method="POST" action="{{ route('profile.change-password',[$currentUser->id]) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            
                                                            <div class="form-group row">
                                                                <label for="new-password" class="col-md-6 col-form-label text-md-left">{{ __('New Password') }}</label>

                                                                <div class="col-md-12">
                                                                    <input id="new-password" type="password" minlength="8" class="form-control @error('new-password') is-invalid @enderror" name="new_password" required autocomplete="new-password" autofocus>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="new-password" class="col-md-6 col-form-label text-md-left">{{ __('Confirm New Password') }}</label>

                                                                <div class="col-md-12">
                                                                    <input id="new-password-confirm" type="password" minlength="8" class="form-control" name="new_password_confirmation" required autocomplete="new-password" autofocus>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary">{{ __('Change') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
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