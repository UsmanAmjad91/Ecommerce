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
    public function index()
    {
        $title="Home";
        $result['home_categories']=DB::table('categories')
        ->where(['status'=>1])
        ->where(['is_home'=>1])
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

   
    
}
