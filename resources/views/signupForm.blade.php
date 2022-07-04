@extends('app')
@section('title') Sign Up @stop
{{--@section('content')--}}

    <div class="signup-form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('signup_r')}}" method="post">
            {{csrf_field()}}
            <h2>Sign Up</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        {{--to do :link to login page--}}
        <div class="text-center">Already have an account? <a href="{{url('signin')}}">Login here</a></div>
    </div>

{{--@endsection--}}