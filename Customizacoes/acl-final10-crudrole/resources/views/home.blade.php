@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            @include('includes.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">{{ __('Access Denied to this area') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
