@extends('app')
@section('title') Add New Product @stop
@section('content')
    {{--<div class="col-lg-4 col-lg-offset-4">--}}
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
        {{--{!! Form::open(['url'=>'product.store']) !!}--}}
        <div class="addprod">
            <h2>Add Product</h2>
        <form action="{{route('admin.newproduct')}}" class="form form-horizontal" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="price">
            </div>

            <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="cat_id">
                    <option disabled selected value>Choose a category</option>
                    @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02">Category</label>
                </div>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">description</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" value="{{session('image')}}">
                    <label class="custom-file-label" for="inputGroupFile02">Choose Image file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
        </div>
    {{--</div>--}}
