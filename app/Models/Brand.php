<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($request,$brand=null)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            if (isset($brand->image))
            {
                if(file_exists($brand->image))
                {
                    unlink($brand->image);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'assets/img/brand-image/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else{
            self::$imageUrl = self::$brand->image;
        }

        return self::$imageUrl;

    }
    public static function newBrand($request)
    {
        self::$imageUrl = self::imageUpload($request);
        self::$brand = new Brand();
        self::$brand->name =$request->name;
        self::$brand->description =$request->description;
        self::$brand->image =self::$imageUrl;
        self::$brand->status =$request->status;
        self::$brand->save();

    }
    public static function updateBrand($request,$id)
    {
        self::$brand = Brand::find($id);
        self::$imageUrl = self::imageUpload($request,self::$brand);

        self::$brand->name =$request->name;
        self::$brand->description =$request->description;
        self::$brand->image =self::$imageUrl;
        self::$brand->status =$request->status;
        self::$brand->save();
    }
    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
