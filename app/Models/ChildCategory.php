<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;
    private static $childCategory;
    private static $image;
    private static $imageName;
    private static $imageDirectory;
    private static $imageUrl;

    public static function imageUpload($request,$childCategory=null)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            if (isset($childCategory->image))
            {
                if(file_exists($childCategory->image))
                {
                    unlink($childCategory->image);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'assets/img/child-category-image/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else{
            self::$imageUrl = self::$childCategory->image;
        }

        return self::$imageUrl;

    }
    public static function newChildCategory($request)
    {
        self::$imageUrl = self::imageUpload($request);
        self::$childCategory = new ChildCategory();
        self::$childCategory->category_id =$request->category_id;
        self::$childCategory->sub_category_id =$request->sub_category_id;
        self::$childCategory->name =$request->name;
        self::$childCategory->description =$request->description;
        self::$childCategory->image =self::$imageUrl;
        self::$childCategory->status =$request->status;
        self::$childCategory->save();

    }
    public static function updateChildCategory($request,$id)
    {
        self::$childCategory = ChildCategory::find($id);
        self::$imageUrl = self::imageUpload($request,self::$childCategory);

        self::$childCategory->category_id =$request->category_id;
        self::$childCategory->sub_category_id =$request->sub_category_id;
        self::$childCategory->name =$request->name;
        self::$childCategory->description =$request->description;
        self::$childCategory->image =self::$imageUrl;
        self::$childCategory->status =$request->status;
        self::$childCategory->save();
    }
    public static function deleteChildCategory($id)
    {
        self::$childCategory = ChildCategory::find($id);
        if (file_exists(self::$childCategory->image))
        {
            unlink(self::$childCategory->image);
        }
        self::$childCategory->delete();
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
