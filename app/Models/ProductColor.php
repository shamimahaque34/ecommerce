<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    private static $colors;
    private static $productColor;
    private static $productColors;

    public static function newProductColor($request, $productId)
    {
        self::$colors = $request->colors;
        foreach (self::$colors as $color)
        {
            self::$productColor = new ProductColor();
            self::$productColor->product_id = $productId;
            self::$productColor->color_id = $color;
            self::$productColor->save();
        }

    }
    public static function updateProductColor($request, $id)
    {
        self::$productColors = ProductColor::where('product_id', $id)->get();
        foreach (self::$productColors as $productColor)
        {
            $productColor->delete();
        }
        self::newProductColor($request, $id);

    }
    public static function deleteProductColor($id)
    {
        self::$productColor = ProductColor::where('product_id', $id)->get();
        self::$productColor->each->delete();
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }


    public function product ()
    {
        return $this->belongsTo(Product::class);
    }
}
