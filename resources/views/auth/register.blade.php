@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register as') }}</div>

                <div class="card-body register">
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('user.register') }}>{{ __('Customer') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('support.register') }}>{{ __('Support') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('marketing.register') }}> {{ __('Marketing') }}</a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <a class="btn-primary" href={{ route('admin.register') }}> {{ __('Super Admin') }}</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection