@extends('app')
@section('title')Shop Product @stop
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

        <h1> Products Administration
            <a href="/logout" class="btn btn-default pull-right">Logout</a>
            <a href="/admin" class="btn btn-default pull-right">Dashboard</a>
        </h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>category</th>
                    <th>price</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                            {{ Form::open(['url' => 'admin/product/' . $product->id, 'method' => 'DELETE']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <a href="/admin/newproduct" class="btn btn-success">Add Product</a>

    </div>
    </div>
    <div class="col-md-2">

    </div>
</div>
{{--@stop--}}