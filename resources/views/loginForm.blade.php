@extends('app')
@section('title') Login @stop
{{--@section('content')--}}
    @if(session()->has('user'))
        <div class="alert alert-info">
            <li>you are logged in now!</li>
        </div>
        <a href="{{url('logout')}}" class="btn btn-primary btn-lg">Logout</a>
    @else
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

    <div class="signin-form" style="align-content: center">
        <form action="{{route('login')}}" method="post">
            {{csrf_field()}}
            <h2>Login</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>
        {{--to do :link to login page--}}
        <div class="text-center">Dont have an account? <a href="{{url('signup')}}">Sign Up here</a></div>
    </div>
@endif
{{--@endsection--}}