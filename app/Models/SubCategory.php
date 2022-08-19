<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','description','image', 'status'];
    private static $SubCategory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $extension;
    private static $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            self::$extension = self::$image->getClientOriginalExtension();
            self::$imageName = time().'.'.self::$extension;
            self::$directory = 'Sub-Category-image/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
        else
        {
            return '';
        }
    }

    Public static function newSubCategory($request)
    {
        self::$SubCategory              = new SubCategory();
        self::$SubCategory->category_id = $request->category_id;
        self::$SubCategory->name        = $request->name;
        self::$SubCategory->description = $request->description;
        self::$SubCategory->image       = self::getImageUrl($request);
        self::$SubCategory->status      = $request->status;
        self::$SubCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$SubCategory = SubCategory::find($id);

        if (empty(self::$SubCategory->image))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            if (self::$image = $request->file('image'))
            {
                if (self::$image) {
                    if (file_exists(self::$SubCategory->image))
                    {
                        unlink(self::$SubCategory->image);
                    }
                    self::$imageUrl = self::getImageUrl($request);
                }
            }
            else
            {
                self::$imageUrl = self::$SubCategory->image;
            }
        }

        self::$SubCategory->category_id = $request->category_id;
        self::$SubCategory->name = $request->name;
        self::$SubCategory->description = $request->description;
        self::$SubCategory->image = self::$imageUrl;
        self::$SubCategory->status = $request->status;
        self::$SubCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$SubCategory = SubCategory::find($id);
        if(file_exists(self::$SubCategory->image))
        {
            if (self::$SubCategory->image)
            {
                unlink(self::$SubCategory->image);
            }
        }
        self::$SubCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
//        return $this->belongsTo('App\models\Category');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
