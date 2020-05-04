@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login as') }}</div>

                <div class="card-body register">
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('user.login') }}>{{ __('Customer') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('support.login') }}>{{ __('Support') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('marketing.login') }}> {{ __('Marketing') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('admin.login') }}> {{ __('Super Admin') }}</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection