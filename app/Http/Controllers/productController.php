<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        //$products = Product::all();
        $products = DB::table('products')->latest()->paginate(3);
        return view('layouts.show',compact('products'));
    }

    public function create()
    {
        return view('layouts.create');
    }

    public function store(Request $request){
        $data = array();

        $data['product_name'] = $request->name;
        $data['product_code'] = $request->code;
        $data['details'] = $request->details;
    
        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['logo'] = $image_url;

            $product = DB::table('products')->insert($data);

            return redirect()->route('product.index')
                                ->with('success','Product Created successfully');

        }
    }

    public function edit($id){

        $products = DB::table('products')->whereId($id)->first();
        return \view('layouts.edit',compact('products'));

    }

    public function update(Request $request, $id){

        $oldlogo = $request->old_logo;
        $data = array();

        $data['product_name'] = $request->name;
        $data['product_code'] = $request->code;
        $data['details'] = $request->details;
    
        $image = $request->file('logo');
        if($image){
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['logo'] = $image_url;

            $product = DB::table('products')->whereId($id)->update($data);

            return redirect()->route('product.index')
                                ->with('success','Product Updated successfully');

    }
}

    public function delete($id){
        $data = DB::table('products')->whereId($id)->first();
        $image = $data->logo;
        unlink($image);

        $product = DB::table('products')->whereId($id)->delete();
        return redirect()->route('product.index')
                                ->with('success','Product Deleted successfully');
    }

    public function show($id){
        $data = DB::table('products')->whereId($id)->first();
        return \view('layouts.showdetail',compact('data'));
    }
}
