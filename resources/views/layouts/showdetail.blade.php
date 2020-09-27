@extends('layouts.main')

@section('title', 'One Product')

@section('content')
    <div class="container col-md-8">
        <h3 class="mt-5">Show Product Details</h3>
        <hr>
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        {{ $data->product_name }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Code:</strong>
                        {{ $data->product_code }}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Description:</strong>
                        {{ $data->details }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Image:</strong>
                        <img src="{{ URL::to($data->logo)}}" width="200px;" height="150px">
                    </div>
                </div>
                <hr>
                <a href="{{ route('product.index') }}" class="btn btn-sm bg-dark text-light float-right">Back</a>
            </div>
    </div>
@endsection