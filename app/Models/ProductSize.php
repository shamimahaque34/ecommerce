<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    private static $sizes;
    private static $productSize;
    private static $productSizes;

    public static function newProductSize($request, $productId)
    {
        self::$sizes = $request->sizes;
        foreach (self::$sizes as $size)
        {
            self::$productSize = new ProductSize();
            self::$productSize->product_id = $productId;
            self::$productSize->size_id = $size;
            self::$productSize->save();
        }

    }
    public static function updateProductSize($request, $id)
    {
        self::$productSizes = ProductSize::where('product_id', $id)->get();
        foreach (self::$productSizes as $productSize)
        {
            $productSize->delete();
        }
        self::newProductSize($request, $id);

    }
    public static function deleteProductSize($id)
    {
        self::$productSize = ProductSize::where('product_id', $id)->get();
        self::$productSize->each->delete();
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
