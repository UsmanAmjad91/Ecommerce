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

        $title = "Home";

        $result['home_categories'] = DB::table('categories')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->where(['cat_parent_id' => Null])
            ->get();


        foreach ($result['home_categories'] as $list) {
            $result['home_categories_product'][$list->cat_id] =
                DB::table('products')
                ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
                ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
                ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
                ->select('products.*', 'productattrs.*', 'sizes.*', 'colors.*')
                ->where(['product_status' => 1])
                ->where(['category' => $list->cat_id])
                ->get();
        }
        // dd($pro);
        $brand = Brand::select('brand_id', 'brand', 'brand_image', 'is_home', 'brand_status')
            ->where(['brand_status' => 1])
            ->where(['is_home' => 1])
            ->get();

        $featured = DB::table('products')
            ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
            ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
            ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
            ->select('products.*', 'productattrs.*', 'sizes.*', 'colors.*')
            ->where(['product_status' => 1])
            ->where(['is_featured' => 'ON'])
            ->get();

        $tranding = DB::table('products')
            ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
            ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
            ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
            ->select('products.*', 'productattrs.*', 'sizes.*', 'colors.*')
            ->where(['product_status' => 1])
            ->where(['is_tranding' => 'ON'])
            ->get();


        $discounted = DB::table('products')
            ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
            ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
            ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
            ->select('products.*', 'productattrs.*', 'sizes.*', 'colors.*')
            ->where(['product_status' => 1])
            ->where(['is_discounted' => 'ON'])
            ->get();

        // dd($featured);

        $banner = Banner::select('banner_id', 'banner_image1', 'banner_image2', 'btn_text', 'btn_link', 'banner_status')
            ->where(['banner_status' => 1])
            ->get();
        // dd($banner);

        return view('front.index', $result, compact('title', 'brand', 'featured', 'tranding', 'discounted', 'banner'));
    }

    public  function product(Request $request, $slug)
    {
        // $title="Product";
        //    $slug = $slug;
        $product_view = DB::table('products')
            ->leftJoin('categories', 'products.category', '=', 'categories.cat_id')
            ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
            ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
            ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
            ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
            ->select('products.*', 'categories.*', 'brands.*', 'productattrs.*', 'sizes.*', 'colors.*')
            ->where(['product_status' => 1])
            ->where(['product_slug' => $slug])
            ->get();

        foreach ($product_view as $list) {
            $catr = $list->cat_id;
            $title = " $list->product_name";
            $product_relate =
                DB::table('products')
                ->leftJoin('categories', 'products.category', '=', 'categories.cat_id')
                ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
                ->leftJoin('productattrs', 'products.product_id', '=', 'productattrs.products_id')
                ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
                ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
                ->select('products.*', 'categories.*', 'brands.*', 'productattrs.*', 'sizes.*', 'colors.*')
                ->where(['product_status' => 1])
                // ->where(['product_slug','!=',$slug])
                ->where(['category' =>  $catr])
                ->take(3)
                ->get();
        }

        return view('front.product_detail.product', compact('title', 'product_view', 'product_relate'));
    }

    public function addto_cart(Request $request)
    {
        //   dd($request->all());
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'pa_id'  => 'required',
            'qty'   => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        $product_id = $request->product_id;
        $qty = $request->qty;
        $pa_id = $request->pa_id;
        // $p_attr =  DB::table('productattrs')->where('patrr_id', $pa_id)->get();
        // dd($p_attr);
        if ($request->session()->has('Front_User')) {
            $uid = $request->session()->get('Front_User');
            $user_type = 'Reg';
        } else {
            $uid = getUserTempid();
            $user_type = 'Not-Reg';
        }
       
        $check = DB::table('carts')
            ->where('user_id', $uid)
            ->where('user_type', $user_type)
            ->where('product_id', $product_id)
            ->where('productattr_id', $pa_id)
            ->get();
             
         if(isset($check[0])){
            $update_id=$check[0]->cart_id;
                   if($qty==0){
                    $is_delete =  DB::table('carts')
                    ->where('cart_id',$update_id)->delete();
                    if ($is_delete) {
                        session()->flash('msgcart', 'Succsessfuly Deleted');
                        return json_encode(array('message' => 'Succsessfuly Deleted', 'status' => 200));
                    } else {
                        return json_encode(array('message' => 'Not Deleted', 'status' => 500));
                    }
                   }else {
                    $is_update = DB::table('carts')
                    ->where('cart_id', $update_id)
                    ->update([
                        'qty_cart' => $request->qty,     
                    ]);
                    if ($is_update) {
                        session()->flash('msgcart', 'Succsessfuly Update Cart');
                        return json_encode(array('message' => 'Succsessfuly Update Cart', 'status' => 200));
                    } else {
                        return json_encode(array('message' => 'Not Update Cart', 'status' => 500));
                    }
                   }
           }else{
            
            $cart = DB::table('carts')->insert([
              'user_id' => $uid,
               'user_type' => $user_type,
                'qty_cart' => $qty,
                'product_id'  => $product_id,
               'productattr_id' => $pa_id,
            ]);
            
            if ($cart) {
                session()->flash('msgcart', 'Succsessfuly Added Cart');
                return json_encode(array('message' => 'Succsessfuly Added Cart', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Added Cart', 'status' => 500));
            }

        }

        
    }

    public function cart(Request $request){
        $title = "Cart";

        if ($request->session()->has('Front_User')) {
            $uid = $request->session()->get('Front_User');
            $user_type = 'Reg';
        } else {
            $uid = getUserTempid();
            $user_type = 'Not-Reg';
        }
      
        // dd($uid);
        $check = DB::table('carts')
        ->where('user_id', $uid)
        ->where('user_type', $user_type)
        ->get();
         
     if(isset($check[0])){
        $update_id=$check[0]->user_id;
       
        // if(!empty($update_id)){
            // dd($update_id);
        $cart = DB::table('carts')
        ->Join('products', 'carts.product_id', '=', 'products.product_id')
        ->Join('sizes', 'products.size', '=', 'sizes.size_id')
        ->Join('colors', 'products.color', '=', 'colors.color_id')
        ->Join('productattrs', 'carts.productattr_id', '=', 'productattrs.patrr_id')
        ->select( 'carts.*','products.*', 'productattrs.*' ,'sizes.*' , 'colors.*')
        ->where('user_id', $update_id)
        ->get();
        // }
    } else{
        $cart = DB::table('carts')
        ->Join('products', 'carts.product_id', '=', 'products.product_id')
        ->Join('sizes', 'products.size', '=', 'sizes.size_id')
        ->Join('colors', 'products.color', '=', 'colors.color_id')
        ->Join('productattrs', 'carts.productattr_id', '=', 'productattrs.patrr_id')
        ->select( 'carts.*','products.*', 'productattrs.*' ,'sizes.*' , 'colors.*')
        ->where('user_id', $uid)
        ->where('user_type', $user_type)
        ->get();
    }
    return view('front.cart.cart', compact('title','cart'));
    }

    public function checkout(){
        $title = "Checkout";


        return view('front.checkout.checkout', compact('title')); 
    }
}
