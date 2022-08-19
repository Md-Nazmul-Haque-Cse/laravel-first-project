<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubImage;
use Illuminate\Http\Request;
use Cart;

class MollaController extends Controller
{
    private $categories;
    private $products;
    private $elcProducts;
    private $id;
    public function index()
    {
        $this->products = Product::orderBy('id', 'desc')->take(10)->get();
        return view('front.home.home', [
            'categories' => Category::all(),
            'products'  => $this->products,
//            'feature_products' => Product::orderBy('id', 'desc')->skip(10)->take(10)->get(),
            'feature_products' => Product::where('selling_price', '<', '5000')->take(20)->get(),
            'best_Seller_products' => Product::where('selling_price', '>', '3000')->take(20)->get(),
            'brands'    => Brand::all(),
            'cart_products' => Cart::content(),
//           'shorting_categories'=> Category::find(92)
            'shorting_categories'=> Category::orderBy('id', 'asc')->take(4)->get(),



        ]);
    }

    //'categories' => Category::all() send to app service provider to view any page//

    public function categoryProduct($id)
    {
        $this->id = base64_decode($id);
        $this->products = Product::where('category_id', $this->id)->orderBy('id','desc')->get();
        return view('front.category.category',[
//            'categories' => Category::all(),
                'products'      => $this->products,
                'category' => Category::find($this->id),

            ]);
    }

    public function contact()
    {
        return view('front.contact.contact');
    }

    public function productDetail($id)
    {
        $this->id = base64_decode($id);
        return view('front.product.detail',[
            'product'=>Product::find($this->id),
            'sub_images' =>SubImage::where('product_id', $this->id)->get(),
            'products' => Product::all()
        ]);
    }

    public function allCategoryProduct()
    {
        return view('front.product.all-category-product',[
            'products'=>Product::orderBy('id','desc')->get(),
            'categories'=>Category::all()
        ]);
    }

    public function shopByBrand($id)
    {
        $this->id = base64_decode($id);
        return view('front.product.shop-by-brand',[
            'brand_products' => Product::where('brand_id', $this->id)->get()
        ]);
    }
}
