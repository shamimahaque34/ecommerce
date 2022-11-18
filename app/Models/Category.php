<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($request,$category=null)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            if (isset($category->image))
            {
                if(file_exists($category->image))
                {
                    unlink($category->image);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'assets/img/category-image/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else{
            self::$imageUrl = self::$category->image;
        }

        return self::$imageUrl;

    }
    public static function newCategory($request)
    {
        self::$imageUrl = self::imageUpload($request);
        self::$category = new Category();
        self::$category->name =$request->name;
        self::$category->description =$request->description;
        self::$category->image =self::$imageUrl;
        self::$category->status =$request->status;
        self::$category->save();

    }
    public static function updateCategory($request,$id)
    {
        self::$category = Category::find($id);
        self::$imageUrl = self::imageUpload($request,self::$category);

        self::$category->name =$request->name;
        self::$category->description =$request->description;
        self::$category->image =self::$imageUrl;
        self::$category->status =$request->status;
        self::$category->save();
    }
    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
