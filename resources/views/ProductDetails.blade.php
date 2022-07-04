@extends('app')
@section('title',$product->title)

<div style="align-content: center">
    <div class="container-fluid">
        {{--<h1>{{$product->title}}</h1>--}}
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

        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('storage/uploads/products/'.$product->image)}}">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$product->title}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>category : {{$product->name}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Price : {{$product->price}} $ </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        description : {{$product->description}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::open(['url' => '/products/' . $product->id, 'method' => 'PUT']) }}
                        {{ Form::submit('Add to Cart', ['class' => 'btn btn-primary'])}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>