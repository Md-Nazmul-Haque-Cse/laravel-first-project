<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    use HasFactory;
    protected $fillable=['product_id', 'image'];
    private static $subImage;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $extension;
    private static $imageUrl;

    public static function newSubImage($product, $request)
    {
        foreach ($request->sub_image as $sub_image)
        {
            self::$subImage = new SubImage();
            self::$subImage->product_id = $product->id;
            self::$subImage->image = self::uploadSubImage($sub_image);
            self::$subImage->save();
        }
    }

    public static function uploadSubImage($sub_image)
    {
        self::$extension = $sub_image->getClientOriginalExtension();
        self::$imageName = 'product-sub-image'.rand(1, 1000).time().'.'.self::$extension;
        self::$directory = 'product-sub-images/';
        $sub_image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

}
