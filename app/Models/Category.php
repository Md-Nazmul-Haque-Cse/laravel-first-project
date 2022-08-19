<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image', 'status'];
    private static $category;
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
            self::$directory = 'category-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
        else
        {
            return '';
        }
    }

    Public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        if (empty(self::$category->image))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            if (self::$image = $request->file('image'))
            {
                if (self::$image) {
                    if (file_exists(self::$category->image))
                    {
                        unlink(self::$category->image);
                    }
                    self::$imageUrl = self::getImageUrl($request);
                }
            }
            else
            {
                self::$imageUrl = self::$category->image;
            }
        }

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if(file_exists(self::$category->image))
        {
            if (self::$category->image)
            {
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }

    //one to many relationship//
    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
//        return $this->hasMany('App\Models\SubCategory');
    }

    public function categoryWiseProducts()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc')->take(10);
    }
}
