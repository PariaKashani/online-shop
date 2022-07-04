@extends('app')
@section('title') Edit Product @stop
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
        <div class="addprod">
            {{--{{$prod = session('product')}}--}}
            <h2>Edit Product</h2>
            <form action="{{url('admin/product/'.$product->id .'/edit')}}" class="form form-horizontal" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" value="{{$product->title}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="price" value="{{$product->price}}">
                </div>

                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02" name="cat_id">
                        <option selected value="{{$product->category_id}}">{{$product->name}}</option>
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
                    <textarea class="form-control" aria-label="With textarea" name="description" >{{$product->description}}</textarea>
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" value>
                        <label class="custom-file-label" for="inputGroupFile02">Choose Image file</label>
                        {{--<br>--}}
                        {{--<br><br><br>--}}


                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>

