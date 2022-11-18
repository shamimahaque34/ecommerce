<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($request,$subCategory=null)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            if (isset($subCategory->image))
            {
                if(file_exists($subCategory->image))
                {
                    unlink($subCategory->image);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'assets/img/sub-category-image/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else{
            self::$imageUrl = self::$subCategory->image;
        }

        return self::$imageUrl;

    }
    public static function newSubCategory($request)
    {
        self::$imageUrl = self::imageUpload($request);
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id =$request->category_id;
        self::$subCategory->name =$request->name;
        self::$subCategory->description =$request->description;
        self::$subCategory->image =self::$imageUrl;
        self::$subCategory->status =$request->status;
        self::$subCategory->save();

    }
    public static function updateSubCategory($request,$id)
    {
        self::$subCategory = SubCategory::find($id);
        self::$imageUrl = self::imageUpload($request,self::$subCategory);

        self::$subCategory->category_id =$request->category_id;
        self::$subCategory->name =$request->name;
        self::$subCategory->description =$request->description;
        self::$subCategory->image =self::$imageUrl;
        self::$subCategory->status =$request->status;
        self::$subCategory->save();
    }
    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


}
