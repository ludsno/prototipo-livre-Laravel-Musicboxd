@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @component('components.alert')
                            @slot('type', 'success')
                            {{ session('status') }}
                        @endcomponent
                    @endif

                    <div class="profile-info">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->email }}</p>
                    </div>

                    <div class="profile-actions">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('Edit Profile') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection