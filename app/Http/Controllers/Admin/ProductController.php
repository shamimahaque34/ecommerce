<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;                                                                              public function index()
    {
        return view('admin.product.add-product');
    }
    public function create(Request $request)
    {

        $product = Product::newProduct($request);
        if (!empty($request->file('other_image')))
        {
            OtherImage::newOtherImage($request, $product->id);
        }
        if (!empty($request->colors))
        {
            ProductColor::newProductColor($request, $product->id);
        }
        if (!empty($request->sizes))
        {
            ProductSize::newProductSize($request, $product->id);
        }
        return back()->with('message','A new product created succesfully');
    }
    public function manage()
    {
         $products = Product::latest()->get();
        //return $products->each->colors[0]->color->name;
        return view('admin.product.manage-product',[
            'products'=>$products,
        ]);
    }
    public function productDetail($id)
    {
        $this->product = Product::find($id);

        return view('admin.product.detail', [
            'product' => $this->product

        ]);

    }
    public function edit($id)
    {
       $this->product = Product::find($id);
//       return $this->product->productColors;
       return view('admin.product.edit-product',[
               'product' => $this->product
       ]);
    }
    public function update(Request $request, $id)
    {

        Product::updateProduct($request,$id);
        if ($request->file('other_image'))
        {
            OtherImage::updateOtherImage($request, $id);
        }
        if (!empty($request->colors))
        {
            ProductColor::updateProductColor($request, $id);
        }
        if (!empty($request->sizes))
        {
            ProductSize::updateProductSize($request, $id);
        }


        return redirect('/manage-product')->with('message','A regular product updated succesfully');
    }
    public function delete($id)
    {
        ProductColor::deleteProductColor($id);
        ProductSize::deleteProductSize($id);
        OtherImage::deleteOtherImage($id);
        Product::deleteProduct($id);

        return back()->with('message','Product Deleted Successfully');
    }

}
