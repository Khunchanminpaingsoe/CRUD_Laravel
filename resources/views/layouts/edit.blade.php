@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')
<div class="container col-md-8">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="text-center">Edit Product</h2>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $products->product_name }}">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="code">Product Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $products->product_code }}">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                    <label for="details">Product Details</label>
            <textarea class="form-control" id="details" name="details" rows="3">{{ $products->details }}</textarea>
            </div>

            <div class="form-group">
                <label for="logo">Product Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
            </div>
            <div class="form-group">
                <img src="{{ URL::to($products->logo )}}" width="80px;" height="80px;">
                <input type="hidden" name="old_logo" value="{{ $products->logo }}">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Update</button>
            <a href="{{ route('product.index') }}" class="btn btn-sm bg-dark text-light float-right">Back</a>

        </form>
    </div>
</div> 
@endsection