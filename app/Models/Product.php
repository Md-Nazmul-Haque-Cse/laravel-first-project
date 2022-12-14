<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','sub_category_id','brand_id','unit_id','name','code','regular_price','selling_price','short_description','long_description','image', 'status'];

    private static $product;
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
            self::$directory = 'product-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
        else
        {
            return '';
        }
    }

    Public static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::getImageUrl($request);
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if (empty(self::$product->image))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            if (self::$image = $request->file('image'))
            {
                if (self::$image) {
                    if (file_exists(self::$product->image))
                    {
                        unlink(self::$product->image);
                    }
                    self::$imageUrl = self::getImageUrl($request);
                }
            }
            else
            {
                self::$imageUrl = self::$product->image;
            }
        }

        self::$product->name = $request->name;
        self::$product->description = $request->description;
        self::$product->image = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if(file_exists(self::$product->image))
        {
            if (self::$product->image)
            {
                unlink(self::$product->image);
            }
        }
        self::$product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subImages()
    {
        return $this->hasMany(SubImage::class);
    }


}
