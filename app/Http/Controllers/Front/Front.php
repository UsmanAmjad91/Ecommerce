<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin\category;
use App\Models\Admin\Brand;
use App\Models\Admin\Banner;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class Front extends Controller
{
    public  function index()
    {
        
        $title="Home";

        $result['home_categories']=DB::table('categories')
        ->where(['status'=>1])
        ->where(['is_home'=>1])
        ->where(['cat_parent_id'=> Null])
        ->get();

        
foreach($result['home_categories'] as $list){
    $result['home_categories_product'][$list->cat_id]=
        DB::table('products')
        ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
        ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
        ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
        ->select('products.*','productattrs.*','sizes.*','colors.*')
        ->where(['product_status'=> 1])
        ->where(['category'=>$list->cat_id])
        ->get();

    
}
    // dd($pro);
    $brand = Brand::select('brand_id','brand','brand_image','is_home','brand_status')
        ->where(['brand_status'=>1])
        ->where(['is_home'=>1])
        ->get();

       $featured = DB::table('products')
        ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
        ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
        ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
        ->select('products.*','productattrs.*','sizes.*','colors.*')
        ->where(['product_status'=> 1])
        ->where(['is_featured'=> 'ON'])
        ->get();

        $tranding = DB::table('products')
        ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
        ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
        ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
        ->select('products.*','productattrs.*','sizes.*','colors.*')
        ->where(['product_status'=> 1])
        ->where(['is_tranding'=> 'ON'])
        ->get();


        $discounted = DB::table('products')
        ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
        ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
        ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
        ->select('products.*','productattrs.*','sizes.*','colors.*')
        ->where(['product_status'=> 1])
        ->where(['is_discounted'=> 'ON'])
        ->get();

        // dd($featured);

        $banner = Banner::select('banner_id', 'banner_image1', 'banner_image2','btn_text', 'btn_link', 'banner_status')
        ->where(['banner_status'=> 1])
        ->get();
            // dd($banner);
           
        return view('front.index',$result,compact('title','brand','featured','tranding','discounted','banner'));
    }

    public  function product(Request $request,$slug)
    {
    // $title="Product";
    //    $slug = $slug;
    $product_view = DB::table('products')
    ->leftJoin('categories', 'products.category', '=', 'categories.cat_id')
    ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
    ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
    ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
    ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
    ->select('products.*', 'categories.*','brands.*','productattrs.*','sizes.*','colors.*')
    ->where(['product_status'=> 1])
    ->where(['product_slug'=> $slug])
    ->get();

    foreach($product_view as $list){
        $catr = $list->cat_id;
        $title=" $list->product_name";
        $product_relate =
        DB::table('products')
        ->leftJoin('categories', 'products.category', '=', 'categories.cat_id')
        ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
        ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
        ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
        ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
        ->select('products.*', 'categories.*','brands.*','productattrs.*','sizes.*','colors.*')
        ->where(['product_status'=> 1])
        // ->where(['product_slug','!=',$slug])
        ->where(['category'=>  $catr])
        ->take(3)
        ->get();
        
    }

       return view('front.product',compact('title','product_view','product_relate'));
    }
    
}
