@extends('layouts.main')

@section('title', 'Create Product')

@section('content')
    <div class="container col-md-8">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <h2 class="text-center">Create New Product</h2>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name...">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="code">Product Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Product Code...">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                        <label for="details">Product Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="logo">Product Logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Create</button>
                <a href="{{ route('product.index') }}" class="btn btn-sm bg-dark text-light float-right">Back</a>

            </form>
        </div>
    </div> 
@endsection