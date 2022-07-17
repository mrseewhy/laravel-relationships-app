@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }} >  <a href="/profile"> Go back </a>
                   
                        <p>{{$profile->nickname}}</p>
                        <p>{{$profile->gender}}</p>
                        <p>{{$profile->cartype}}</p>
                        <p>{!!$profile->bio!!}</p>
                  <a href="{{route('profile.edit', ['profile' => $profile->id])}}">edit</a>
                  <form action="{{route('profile.destroy', ['profile' => $profile->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn">delete</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
