@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <h4>Create a new profile</h4>
                   <form action="{{route('profile.update', ['profile' => $profile->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-4">
                      <label for="nickname">Nickname: </label>
                      <input type="text" class="form-control" name="nickname" id="nickname" placeholder="enter your nickname" value="{{$profile->nickname}}">
                    </div>
                    @error('nickname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mt-5">
                        Select your gender
                
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="gender" value="Male" name="gender" class="custom-control-input" {{$profile->gender == 'Male' ? "checked" : ""}}>
                        <label class="custom-control-label" for="gender">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" value="Female" name="gender" class="custom-control-input" {{$profile->gender == 'Female' ? "checked" : ""}}>
                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" value="I dont know" name="gender" class="custom-control-input" {{$profile->gender == 'I dont know' ? "checked" : ""}}>
                        <label class="custom-control-label" for="customRadioInline2">I dont know</label>
                      </div>
                   {{$profile->gender }}
                      @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group mt-5">
                      @php
                          $cars = ["", 'Mercedes Benz', 'BMW', 'Toyota', 'Honda', 'Tata', 'Subaru', 'Hyundai']
                      @endphp
                        <label for="cartype">Select A Car</label>
                        <select id="cartype" class="form-control" name="cartype">
                          @foreach ($cars as $car)
                          @if ($car == $profile->cartype)
                          <option selected value="{{$profile->cartype}}">{{$profile->cartype}}</option>
                          @else
                          <option value="{{$car}}">{{$car}}</option>
                          @endif
                          @endforeach
                        </select>
                        @error('cartype')
                        <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                    <div class="form-group mt-5">
                      <label for="bio">Enter a short bio: </label>
                      <textarea class="form-control tinymce-editor" name="bio" id="bio" rows="3">{!!$profile->bio!!}</textarea>
                    </div>
                    @error('bio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
