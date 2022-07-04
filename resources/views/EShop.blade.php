
@extends('app')
@section('title') Main Page
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Tahoma, Geneva, sans-serif; color: #4f4e4e}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: #000000 !important;} .bootstrap-iso .btn-custom{background: #bbf3ef} .bootstrap-iso .btn-custom:hover{background: #a7dfdb;} .asteriskField{color: red;}</style>
@stop
@section('sidebar')
    @parent
@endsection

@section('sidemenu')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
    @if(session()->has('user'))
        <div class="alert alert-info">
            <li>user : {{session('user')}}</li>
        </div>
            <a href="{{url('logout')}}" class="btn btn-primary btn-lg">Logout</a>
            <a href="{{url('/user/'.session('user').'/cartItems')}}" class="btn btn-primary btn-lg" style="margin-top: 10px">Cart</a>
        @if(session('type')==='admin')
                    <a href="{{url('admin')}}" class="btn btn-primary btn-lg" style="margin-top: 10px">Dashboard</a>
                @endif
        @else
        <a href="{{url('signin')}}" class="btn btn-primary btn-lg">Login</a>
        <a href="{{url('signup')}}" class="btn btn-primary btn-lg" style="margin-top: 10px">Sign Up</a>
    @endif
    </div></div></div>

    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form method="get" action="{{route('searchProd')}}">
                        <div class="form-group ">
                            <label class="control-label ">
                                Select a Category
                            </label>
                            <div class="">
                                @foreach($categories as $category)
                                    <div class="radio">
                                        <label class="radio">
                                            <input name="category" type="radio" value="{{$category->id}}"/>
                                            {{$category->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label ">
                                Order method
                            </label>
                            <div class="">
                                <div class="radio">
                                    <label class="radio">
                                        <input name="order" type="radio" value="date_c"/>
                                        Date
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="radio">
                                        <input name="order" type="radio" value="alpha"/>
                                        Alphabetically
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="radio">
                                        <input name="order" type="radio" value="price"/>
                                        Price
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="min_price">
                                Minimum Price
                            </label>
                            <input class="form-control" id="min_price" name="min_price" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="max_price">
                                Maximum Price
                            </label>
                            <input class="form-control" id="max_price" name="max_price" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="date">
                                Date
                            </label>
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-custom "  type="submit">
                                    search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--@foreach($products as $product)--}}
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
    <div class="row">
    <h3>products</h3>
    </div>
    <div class="row">
    @foreach($products as $product)
        <div class="card " style="width: 18rem;margin-right: 20px;margin-bottom: 20px">
            <img class="card-img-top" src="{{asset('storage/uploads/products/'.$product->image)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                {{--<h5 class="card-title">{{$product->image}}</h5>--}}
                <h6 class="card-subtitle">price : {{$product->price}}</h6>
                {{--<p class="card-text">{{$product->description}}</p>--}}
                <a href="{{url('/products/'.$product->id)}}" class="btn btn-primary" style="">Show Product</a>
            </div>
        </div>
    @endforeach
    </div>


    {{--@endforeach--}}
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
