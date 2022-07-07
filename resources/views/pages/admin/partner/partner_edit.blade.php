{{-- Extends layout --}}
@extends('layout.back_web')

{{-- Content --}}
@section('content')

                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label">Register New Partner
                                            <div class="text-muted pt-2 font-size-sm">Edit Register New Partner</div></h3>
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
                                                            <form method="POST" action="{{ route('partner.edit',[$partner->id]) }}">
                                                                @csrf
                                                                @method('PATCH')

                                                                <div class="form-group row">
                                                                    <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $partner->users->name }}" required autocomplete="name" autofocus>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $partner->users->email }}" required autocomplete="email" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="pic" class="col-md-6 col-form-label text-md-left">{{ __('PIC') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="pic" type="text" class="form-control @error('pic') is-invalid @enderror" name="pic" value="{{ $partner->pic }}" required autocomplete="pic" autofocus>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="contact" class="col-md-6 col-form-label text-md-left">{{ __('Contact PIC') }}</label>

                                                                    <div class="col-md-12">
                                                                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $partner->contact }}" required autocomplete="pic" autofocus>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="address" class="col-md-6 col-form-label text-md-left">{{ __('Address') }}</label>

                                                                    <div class="col-md-12">
                                                                        <textarea id="address" rows="4" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>{{ $partner->address }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <a href="/partner" class="btn btn-secondary">Back</a>
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