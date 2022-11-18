<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($request,$product=null)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            if (isset($product->image))
            {
                if(file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'assets/img/product-image/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else{
            self::$imageUrl = $product->image;

        }

        return self::$imageUrl;

    }
    public static function newProduct($request)
    {
        self::$imageUrl = self::imageUpload($request);
        self::$product = new Product();
        self::$product->category_id =$request->category_id;
        self::$product->sub_category_id =$request->sub_category_id;
        self::$product->child_category_id =$request->child_category_id;
        self::$product->brand_id =$request->brand_id;
        self::$product->unit_id =$request->unit_id;
        self::$product->name =$request->name;
        self::$product->code =$request->code;
        self::$product->short_description =$request->short_description;
        self::$product->long_description =$request->long_description;
        self::$product->image =self::$imageUrl;
        self::$product->meta_tag =$request->meta_tag;
        self::$product->meta_description =$request->meta_description;
        self::$product->status =$request->status;
        self::$product->save();
        return self::$product;

    }
    public static function updateProduct($request,$id)
    {
        self::$product =Product::find($id);
        self::$imageUrl = self::imageUpload($request, self::$product);

        self::$product->category_id =$request->category_id;
        self::$product->sub_category_id =$request->sub_category_id;
        self::$product->child_category_id =$request->child_category_id;
        self::$product->brand_id =$request->brand_id;
        self::$product->unit_id =$request->unit_id;
        self::$product->name =$request->name;
        self::$product->code =$request->code;
        self::$product->short_description =$request->short_description;
        self::$product->long_description =$request->long_description;
        self::$product->image = self::$imageUrl;
        self::$product->meta_tag =$request->meta_tag;
        self::$product->meta_description =$request->meta_description;
        self::$product->status =$request->status;
        self::$product->save();
        return self::$product;
    }
    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function ChildCategory()
    {
        return $this->belongsTo(ChildCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function color()
    {
        return $this->hasMany(Color::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

}
