@extends('app')
@section('title') Admin Dashboard @stop
@section('sidemenu')
    <a href="{{url('logout')}}" class="btn btn-primary btn-lg">Logout</a>
    <br><br>
    {{--<a href="{{url('admin/newproduct')}}" class="btn btn-primary btn-lg">Add New Product</a>--}}
    <a href="{{url('/')}}" class="btn btn-primary btn-lg">Shop</a>
    <br><br>
    <a href="{{url('admin/products')}}" class="btn btn-primary btn-lg">Products</a>
@endsection
@section('content')
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
@endsection
