
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Tahoma, Geneva, sans-serif; color: #4f4e4e}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: #000000 !important;} .bootstrap-iso .btn-custom{background: #bbf3ef} .bootstrap-iso .btn-custom:hover{background: #a7dfdb;} .asteriskField{color: red;}</style>


<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post" action="{{route('search'}}">
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
                            <button class="btn btn-custom " name="submit" type="submit">
                                search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

{{--<form method="get" action="{{\Illuminate\Support\Facades\URL::current()}}">--}}
{{--<div>--}}
{{--<label for="">Price Range</label>--}}
{{--<br>--}}
{{--min_price<input type="text" name="min_price" value="{{session('min_price')}}">--}}
{{--<br>--}}
{{--max_price<input type="text" name="max_price" value="{{session('max_price')}}">--}}
{{--</div>--}}
{{--<div>--}}
{{--<label for="">Categories</label>--}}
{{--<br>--}}
{{--<?php $category_name = old('category_name');--}}
{{--$category_name = isset($category_name) ? $category_name : [];--}}
{{--?>--}}
{{--@foreach($categories as $category)--}}
{{--<input type="checkbox" name="category_name" value="{{$category->id}}{{in_array($category->id,$category_name)? 'checked' : ''}}"> {{$category->name}}--}}
{{--<br>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--<button>ok</button>--}}
{{--</form>--}}