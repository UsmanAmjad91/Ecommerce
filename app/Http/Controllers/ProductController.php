<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Brand;
use App\Models\category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Myear;
use App\Models\Size;
use App\Models\Productattr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{

    public function index()
    {
        $title = "Product";

        return view('admin.products.products', compact('title'));
    }

    public function  manage_product()
    {
        $title = "Add Product";
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $color = DB::table('colors')->get();
        $coupon = DB::table('coupons')->get();
        $myear = DB::table('myears')->get();
        $size = DB::table('sizes')->get();

        return view('admin.products.manage_products', compact('title', 'category', 'brand', 'color', 'coupon', 'myear', 'size'));
    }

    public function insert_product(Request $request)
    {
        //  dd($request->all());  
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'product_slug' => 'required|unique:products',
            'cat_id' => 'required',
            'brand_id' => 'required',
            'year_id' => 'required',
            'warranty' => 'required',
            'uses' => 'required',
            'keyword' => 'required',
            'short_desc' => 'required',
            'image1' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image4' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'imageatrr' => 'required',
            'sku' => 'required',
            'mrp' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'product_status' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(array('msgpro' => $validator->errors()->all()));
        }

        $file = $request->image1;
        $filename1 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/product_images'), $filename1);


        $file = $request->image2;
        $filename2 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/product_images'), $filename2);


        $file = $request->image3;
        $filename3 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/product_images'), $filename3);

        $file = $request->image4;
        $filename4 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/product_images'), $filename4);
        $count = 1;
        $count++;
        $insert_pro = new Product;
        $insert_pro->product_name = $request->post('product');
        $insert_pro->coupon = $request->post('coupon_id');
        $insert_pro->category = $request->post('cat_id');
        $cls = 'color_id' . $count;
        if ($request->cls) {
            $color = $request->cls;
        } else {
            $color = $request->color_id;
        }
        $string = '';
        foreach ($color as $b => $c) {
            $string .= $c . ',';
        }

        $solution = substr($string, 0, -1);
        $insert_pro->color = $solution;
        // print_r($solution);
        // dd($solution);
        $siz = 'size_id' . $count;
        if ($request->siz) {
            $size = $request->siz;
        } else {
            $size = $request->size_id;
        }
        $string = '';
        foreach ($size as $b => $c) {
            $string .= $c . ',';
        }
        $solution = substr($string, 0, -1);
        $insert_pro->size = $solution;

        $insert_pro->model = $request->post('year_id');
        $insert_pro->brand = $request->post('brand_id');
        $insert_pro->warranty = $request->post('warranty');
        $insert_pro->uses = $request->post('uses');
        $insert_pro->keywords = $request->post('keyword');
        $insert_pro->short_desc = $request->post('short_desc');
        $insert_pro->technical_specification = $request->post('technical_specification');
        $insert_pro->desc = $request->post('desc');
        $insert_pro->product_slug = $request->post('product_slug');
        $insert_pro->product_status = $request->post('product_status');
        $insert_pro->image1 = $filename1;
        $insert_pro->image2 = $filename2;
        $insert_pro->image3 = $filename3;
        $insert_pro->image4 = $filename4;
        $insert_pro->save();
        $pid = $insert_pro->id;



        if ($file = $request->imageatrr1) {
            $file = $request->imageatrr1;
            $atrrimage = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('admin_assets/product_images'), $atrrimage);
        } else if ($file = $request->imageatrr2) {

            $file = $request->imageatrr2;
            $atrrimage = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('admin_assets/product_images'), $atrrimage);
        } else {
            // dd($file=$request->imageatrr);
            if ($file = $request->imageatrr) {
                foreach ($file as $key => $file) {
                    $extension = $file->getClientOriginalName();
                    $fileName = time() . '-' . $request->name . '.' . $extension;
                    $file->move(public_path('admin_assets/product_images'), $fileName);
                }
            }
        }

        $skut = 'sku' . $count;
        $mprr = 'mrp' . $count;
        $pric = 'price' . $count;
        $qt = 'qty' . $count;
        // dd($pid);
        $productattr['products_id'] = $pid;
        $productattr['name'] = $request->post('product');
        if ($request->skut) {
            $skuArr = $request->skut;
        } else {
            $skuArr = $request->sku;
        }
        $string = '';
        foreach ($skuArr as $b => $c) {
            $string .= $c . ',';
        }

        $solution = substr($string, 0, -1);
        $productattr['sku'] = $solution;
        if ($request->mprr) {
            $mrp = $request->mprr;
        } else {
            $mrp = $request->mrp;
        }
        $string = '';
        foreach ($mrp as $b => $c) {
            $string .= $c . ',';
        }

        $solution = substr($string, 0, -1);
        $productattr['mrp'] = $solution;

        if ($request->pric) {
            $price = $request->pric;
        } else {
            $price = $request->price;
        }
        $string = '';
        foreach ($price as $b => $c) {
            $string .= $c . ',';
        }

        $solution = substr($string, 0, -1);
        $productattr['price'] = $solution;
        if ($request->qt) {
            $qty = $request->qt;
        } else {
            $qty = $request->qty;
        }
        $string = '';
        foreach ($qty as $b => $c) {
            $string .= $c . ',';
        }

        $solution = substr($string, 0, -1);
        $productattr['qty'] = $solution;

        $productattr['imageatrr'] = $fileName;
        DB::table('productattrs')->insert($productattr);


        if ($insert_pro) {
            session()->flash('msgpro', 'Succsessfuly Added Product');
            return json_encode(array('message' => 'Succsessfuly Added Product', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted Product', 'status' => 500));
        }
    }


    public function product_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('products')
                ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
                ->leftJoin('categories', 'products.category', '=', 'categories.cat_id')
                ->leftJoin('colors', 'products.color', '=', 'colors.color_id')
                ->leftJoin('coupons', 'products.coupon', '=', 'coupons.coupon_id')
                ->leftJoin('myears', 'products.model', '=', 'myears.model_id')
                ->leftJoin('sizes', 'products.size', '=', 'sizes.size_id')
                ->orderBy('product_id', 'desc')->get();

            foreach ($data as $row) {
                // dd($data);
                //    return json_encode($data);
                return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm mr-1 item d-inline-flex product_edit" data-product_id="' . $row->product_id . '" data-product="' . $row->product_name . '" data-coupon_name="' . $row->coupon_id . '"
                    data-cat_name="' . $row->cat_id . '" data-color_name="' . $row->color_id . '" data-size_name="' . $row->size_id . '"
                    data-brand_name="' . $row->brand_id . '"  data-year_name="' . $row->model_id . '"  data-product_slug="' . $row->product_slug . '"
                     data-short_desc="' . $row->short_desc . '"  data-desc="' . $row->desc . '"  data-keywords="' . $row->keywords . '"
                     data-technical_specification="' . $row->technical_specification . '" data-uses="' . $row->uses . '" data-warranty="' . $row->warranty . '"
                     data-image1="' . $row->image1 . '" data-image2="' . $row->image2 . '" data-image3="' . $row->image3 . '" data-image4="' . $row->image4 . '"  data-product_status="' . $row->product_status . '" >Edit</a>';
                        $actionBtn .= '<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm ml-1 mt-1  item d-inline-flex  product_delete" data-toggle="modal" data-target="#Modal_Delete"  data-product_id="' . $row->product_id . '" >Delete</a>';
                        if ($row->product_status == 1) {
                            $actionBtn .= '<a href="javascript:void(0)"  class="product_status_ac btn btn-success btn-sm mt-2 item d-inline-flex  product_status"  data-product_id="' . $row->product_id . '" >Active</a>';
                        }
                        if ($row->product_status == 0) {
                            $actionBtn .= ' <a href="javascript:void(0)"  class="product_status_de btn btn-warning btn-sm mt-2  item d-inline-flex  product_status"  data-product_id="' . $row->product_id . '" >DeActive</a>';
                        }

                        return $actionBtn;
                    })
                    ->rawColumns(['action'])->make(true);
            }
        }
    }

    public function product_status_de(Request $request, $id)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('products')->where('product_id', $id)->update(array('product_status' => '1'));
            if (!empty($isst)) {
                session()->flash('msgpro', 'Succsessfuly Active Product');
                return json_encode(array('message' => 'Product Active successfully', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Product Not Active', 'status' => 500));
            }
        }
    }
    public function product_status_ac(Request $request, $id)
    {
        //  dd($id);
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('products')->where('product_id', $id)->update(array('product_status' => '0'));
            if (!empty($isstrt)) {
                session()->flash('msgpro', 'Succsessfuly Deactive Product');
                return json_encode(array('message' => 'Product Deactive successfully', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Product Not Deactive', 'status' => 500));
            }
        }
    }
    public function destroy_product(Request $request, $id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Product::where('product_id', $id)->delete();
            session()->flash('msgpro', 'Succsessfuly Delete Product');
            if (!empty($is_delete))

                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function copon_get()
    {
        $coupon = DB::table('coupons')
            ->select('coupons.*')->get();

        return json_encode($coupon);
    }
    public function size_get()
    {
        $size = DB::table('sizes')
            ->select('sizes.*')->get();

        return json_encode($size);
    }

    public function color_get()
    {
        $color = DB::table('colors')
            ->select('colors.*')->get();

        return json_encode($color);
    }

    public function cat_get()
    {
        $cat =  DB::table('categories')
            ->select('categories.*')->get();

        return json_encode($cat);
    }

    public function brand_get()
    {
        $brand = DB::table('brands')
            ->select('brands.*')->get();

        return json_encode($brand);
    }


    public function year_get()
    {
        $year = DB::table('myears')
            ->select('myears.*')->get();

        return json_encode($year);
    }
    public function edit_product(Request $request, $id)
    {
        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'product_id_edit' => 'required',
            'product_name_edit' => 'required',
            'slug_edit' => 'required', Rule::unique('products')->ignore($id),
            'cat_id' => 'required',
            'brand_id' => 'required',
            // 'year_id' => 'required',
            'keyword_edit' => 'required',
            'warranty_edit' => 'required',
            'uses_edit' => 'required',
            'shortdesc' => 'required',
            'status_edit' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(array('msgpro' => $validator->errors()->all()));
        }
        DB::table('productattrs')->where('products_id', $id)->update([
            'name' => $request->product_name_edit,

        ]);

        if (!empty($id)) {
            $is_update = Product::where('product_id', $id)->update([
                'product_name' => $request->product_name_edit,
                'category' => $request->cat_id,
                'color' => $request->color_id,
                'coupon'  =>   $request->coupon_id,
                'size' => $request->size_id,
                'product_slug' => $request->slug_edit,
                'brand' => $request->brand_id,
                'model' => $request->year_id,
                'keywords' => $request->keyword_edit,
                'warranty' => $request->warranty_edit,
                'uses' => $request->uses_edit,
                'short_desc' => $request->shortdesc,
                'product_status' => $request->status_edit,
            ]);
            if ($is_update) {
                session()->flash('msgpro', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }
    }

    public function edit_pro(Request $request)
    {
        $title = "Edit Product";


        $data = DB::table('products')
            ->Join('productattrs', 'products.product_id', '=', 'productattrs.products_id')
            ->Paginate(10);
        // // dd($data);
        if ($request->ajax()) {
            return view('admin.products.edit', compact('data', 'title'));
        }
        return view('admin.products.edit', compact('data', 'title'));
    }


    public function edit2_pro(Request $request, $id)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'product_name_edit' => 'required',
            'productsid_edit' => 'required',
            'sku_edit' => 'required',
            'mrp_edit' => 'required',
            'price_edit' => 'required',
            'qty_edit' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(array('msgpro' => $validator->errors()->all()));
        }
        DB::table('productattrs')->where('patrr_id', $id)->update([
            'products_id' => $id,
            'sku' => $request->sku_edit,
            'mrp' => $request->mrp_edit,
            'price'    => $request->price_edit,
            'qty'    => $request->qty_edit,
        ]);

        if (!empty($request->image1_edit) && empty($request->image2_edit) && empty($request->image3_edit) && empty($request->image4_edit)) {

            $file = $request->image1_edit;
            $image1 = time() . '.' . $file->getClientOriginalExtension();
            $imagePath = public_path('admin_assets/product_images/' . $image1);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image1);
            if (!empty($id)) {

                $is_update = DB::table('Products')->where('product_id', $id)->update([
                    'desc' => $request->desc_edit,
                    'technical_specification' => $request->ts_edit,
                    'image1'    => $image1,
                ]);
            }
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }

        if (!empty($request->image2_edit) && empty($request->image1_edit) && empty($request->image3_edit) && empty($request->image4_edit)) {
            $file = $request->image2_edit;
            $image2 = time() . '.' . $file->getClientOriginalExtension();

            $imagePath = public_path('admin_assets/product_images/' . $image2);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image2);
            if (!empty($id)) {
                $is_update = DB::table('Products')->where('product_id', $id)->update([
                    'desc' => $request->desc_edit,
                    'technical_specification' => $request->ts_edit,
                    'image2'    => $image2,
                ]);
            }
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }
        if (!empty($request->image3_edit) && empty($request->image1_edit) && empty($request->image2_edit) && empty($request->image4_edit)) {
            $file = $request->image3_edit;
            $image3 = time() . '.' . $file->getClientOriginalExtension();
            $imagePath = public_path('admin_assets/product_images/' . $image3);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image3);
            if (!empty($id)) {
                $is_update = DB::table('Products')->where('product_id', $id)->update([
                    'desc' => $request->desc_edit,
                    'technical_specification' => $request->ts_edit,
                    'image3'    => $image3,
                ]);
            }
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }
        if (!empty($request->image4_edit) && empty($request->image1_edit) && empty($request->image2_edit) && empty($request->image3_edit)) {
            $file = $request->image4_edit;
            $image4 = time() . '.' . $file->getClientOriginalExtension();
            $imagePath = public_path('admin_assets/product_images/' . $image4);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image4);
            if (!empty($id)) {
                $is_update = DB::table('Products')->where('product_id', $id)->update([
                    'desc' => $request->desc_edit,
                    'technical_specification' => $request->ts_edit,
                    'image4'    => $image4,
                ]);
            }
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }
        // dd();
        if (!empty($request->image1_edit) && !empty($request->image2_edit) && !empty($request->image3_edit) && !empty($request->image4_edit)) {

            $file = $request->image1_edit;
            $image1 = time() . '.' . $file->getClientOriginalName();
            $imagePath = public_path('admin_assets/product_images/' . $image1);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image1);

            $file = $request->image2_edit;
            $image2 = time() . '.' . $file->getClientOriginalName();
            $imagePath = public_path('admin_assets/product_images/' . $image2);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image2);

            $file = $request->image3_edit;
            $image3 = time() . '.' . $file->getClientOriginalName();
            $imagePath = public_path('admin_assets/product_images/' . $image3);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image3);

            $file = $request->image4_edit;
            $image4 = time() . '.' . $file->getClientOriginalName();
            $imagePath = public_path('admin_assets/product_images/' . $image4);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $file->move(public_path('admin_assets/product_images'), $image4);

            if (!empty($id)) {
                $is_update = DB::table('Products')->where('product_id', $id)->update([
                    'desc' => $request->desc_edit,
                    'technical_specification' => $request->ts_edit,
                    'image1'      =>  $image1,
                    'image2'      =>  $image2,
                    'image3'      =>  $image3,
                    'image4'      =>  $image4,
                ]);
                if ($is_update) {
                    session()->flash('reply', 'Succsessfuly Update Product');
                    return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update Product', 'status' => 500));
                }
            }
        }

        if (!empty($id)) {
            $is_update = DB::table('Products')->where('product_id', $id)->update([
                'desc' => $request->desc_edit,
                'technical_specification' => $request->ts_edit,

            ]);
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Product');
                return json_encode(array('message' => 'Succsessfuly Update Product', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Product', 'status' => 500));
            }
        }
    }
    public function search(Request $request)
    {
        if ($request->input('search')) {
            $search = $request->input('search');
            // dd($search);
            $data = DB::table('products')->Join('productattrs', 'products.product_id', '=', 'productattrs.products_id')
                ->where('product_name', 'LIKE', '%' . $search . "%")->select('products.*', 'productattrs.*')->get();
            // dd($data);
            $html = '';
            foreach ($data as $row) {
                if (!empty($row->product_id)) {
                    $html .= '<tr>
                                <td>' . $row->product_name . '</td>
                                <td><textarea>' . $row->desc . '</textarea></td>
                                <td><textarea>' . $row->technical_specification . '</textarea></td>
                                <td> <img src ="' . asset('admin_assets/product_images/' . $row->image1) . '"/> </td>
                                <td> <img src ="' . asset('admin_assets/product_images/' . $row->image2) . '"/></td>
                                <td> <img src ="' . asset('admin_assets/product_images/' . $row->image3) . '"/></td>
                                <td> <img src ="' . asset('admin_assets/product_images/' . $row->image4) . '"/></td>
                                <td>' . $row->qty . '</td>
                                <td>' . $row->price . '</td>
                                <td>' . $row->mrp . '</td>
                                <td>' . $row->sku . '</td>
                                <td><a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-lg  item d-inline-flex product2_edit" data-product_id="'.$row->product_id .'" data-product="'.$row->product_name.'"
                         data-desc="'.$row->desc.'"  data-technical_specification="'.$row->technical_specification.'" data-qty="'.$row->qty.'" data-price="'.$row->price.'" data-mrp="'.$row->mrp.'" data-sku="'.$row->sku.'"
                         data-image1="'.$row->image1.'" data-image2="'.$row->image2.'" data-image3="'.$row->image3.'" data-image4="'.$row->image4.'"  data-products_id="'.$row->products_id.'" >Edit</a></td>
                                
                                </tr>';
                       
                }
            }
            return json_encode($html);
        }
    }

}