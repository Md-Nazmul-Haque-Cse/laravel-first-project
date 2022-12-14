<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image', 'status'];
    private static $brand;
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
            self::$directory = 'brand-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
        else
        {
            return '';
        }
    }

    Public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImageUrl($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if (empty(self::$brand->image))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            if (self::$image = $request->file('image'))
            {
                if (self::$image) {
                    if (file_exists(self::$brand->image))
                    {
                        unlink(self::$brand->image);
                    }
                    self::$imageUrl = self::getImageUrl($request);
                }
            }
            else
            {
                self::$imageUrl = self::$brand->image;
            }
        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageUrl;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->image))
        {
            if (self::$brand->image)
            {
                unlink(self::$brand->image);
            }
        }
        self::$brand->delete();
    }

    public function products()
    {
        $this->hasMany(Product::class);
    }
}
