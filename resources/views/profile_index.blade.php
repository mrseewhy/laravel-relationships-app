@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }} > <a href="{{route('profile.create')}}">Create new Profile</a>
                    @foreach ($profiles as $profile)
                        <a href="/profile/{{$profile->id}}"><p>{{$profile->nickname}}</p></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
