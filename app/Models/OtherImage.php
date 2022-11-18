<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage;
    private static $otherImages;
    private static $images;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($image)
    {
        self::$imageName = time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        self::$imageDirectory = 'assets/img/other-image/';
        $image->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newOtherImage($request, $productId)
    {
        self::$images = $request->file('other_image');
        foreach (self::$images as $image)
        {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $productId;
            self::$otherImage->image = self::imageUpload($image);
            self::$otherImage->save();
        }

    }
    public static function updateOtherImage($request, $id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImages as $otherImage)
        {
            if (isset($otherImage->image))
            {
                if(file_exists($otherImage->image))
                {
                    unlink($otherImage->image);
                }
            }
            $otherImage->delete();
        }
        self::newOtherImage($request, $id);
    }
    public static function deleteOtherImage($id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        if (file_exists($otherImage->image))
        {
            unlink($otherImage->image);
        }
        self::$otherImages->each->delete();
    }
}
