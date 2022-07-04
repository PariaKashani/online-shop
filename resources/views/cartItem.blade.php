@extends('app')
@section('title')Cart @stop
{{--@section('content')--}}
<div class="row">
    <div class="col-md-2">

    </div>

    <div class="col-lg-4 col-lg-offset-4">
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
    </div>
    <div class="col-md-8" style="align-self: center; margin-left: 23%">
        <div class="col-lg-10 col-lg-offset-1">

            <h1> Cart Items
                <a href="/logout" class="btn btn-default pull-right">Logout</a>
                <a href="/" class="btn btn-default pull-right">shop</a>
            </h1>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>id</th>
                        <th>product</th>
                        <th>count</th>
                        <th>price</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($cart_items as $cart_item)
                        <tr>
                            <td>{{ $cart_item->id }}</td>
                            <td>{{ $cart_item->title}}</td>
                            <td>{{ $cart_item->count }}</td>
                            <td>{{ $cart_item->price }}</td>
                            <td>
                                {{--<a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>--}}
                                {{ Form::open(['url' => 'user/'.session('user').'/cartItems/' . $cart_item->id, 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {{ Form::close() }}
                                {{--{{ Form::open(['url' => 'user/'.session('user').'/cartItems/' . $cart_item->id, 'method' => 'PUT']) }}--}}
                                {{--{{ Form::submit('Plus', ['class' => 'btn btn-primary'])}}--}}
                                {{--{{ Form::close() }}--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            {{--<a href="/admin/newproduct" class="btn btn-success">Add Product</a>--}}

        </div>
    </div>
    <div class="col-md-2">

    </div>
</div>
{{--@stop--}}