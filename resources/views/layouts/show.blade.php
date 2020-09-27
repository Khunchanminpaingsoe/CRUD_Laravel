@extends('layouts.main')

@section('title', 'All Product')

@section('content')
    
        
        <h2 class="text-center"><i class="fas fa-list-alt"></i> Products List</h2>

        @if($msg = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $msg }}</p>
        </div>            
        @endif

        <a href="{{ route('product.create') }}" class="btn btn-primary btn-md">
            Create Product
        </a>
        
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th width="400px">Details</th>
                <th>Product Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ Str_limit($product->details , $limit=100) }}</td>
                        <td><img src="{{ URL::to($product->logo )}}" width="80px;" height="80px;"></td>
                        <td>
                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</a>
                        </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    {!! $products->links() !!}

    
@endsection