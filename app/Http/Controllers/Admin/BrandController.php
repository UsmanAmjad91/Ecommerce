<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class BrandController extends Controller
{
    public function index()
    {
        $title="Brands";
        return view('admin.brand.brand',compact('title'));
    }
   
    public function  manage_brand()
    {
        $title="Add Brand";
        return view('admin.brand.manage_brand',compact('title'));
    }

    public function brand_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::select('brand_id','brand','brand_image','is_home','brand_status')->orderBy('brand_id', 'desc')->get();
            
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
             ->addColumn('image', function($row){
                $brand_images=asset("admin_assets/brand_images/$row->brand_image");
               $image = '<img src='.$brand_images.' style="height:50px;" />';
                return $image;
             })
          ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit brand-br btn btn-success btn-sm item brand_edit" data-brand_id="' . $row->brand_id . '" data-brand="' . $row->brand . '"  data-brand_image="' . $row->brand_image . '" data-is_home="' . $row->is_home . '" data-brand_status="' . $row->brand_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-2 brand_delete" data-toggle="modal" data-target="#Modal_Delete"  data-brand_id="' . $row->brand_id . '" >Delete</a>';
                    if($row->brand_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="brand_status_ac btn btn-success btn-sm item ml-2 brand_status"  data-brand_id="' . $row->brand_id . '" >Active</a>';
                    }
                    if($row->brand_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="brand_status_de btn btn-warning btn-sm item ml-2 brand_status"  data-brand_id="' . $row->brand_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action','image'])->make(true);
            }
        }
    }

    public function insert_brand(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'brand' => 'required|unique:brands',
            'brand_status' => 'required',
            'brand_image' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        $file = $request->brand_image;
        $filename1 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/brand_images'), $filename1);


        $insert_brand = new Brand;
        $insert_brand->brand = $request->post('brand');
        $insert_brand->brand_status = $request->post('brand_status');
        $insert_brand->brand_image =  $filename1;
        if(!empty($request->post('is_home'))){
            $insert_brand->is_home = 1;
        }else{
            $insert_brand->is_home = 0;  
        }
        $insert_brand->save();
        if ($insert_brand) {
            session()->flash('msgbrand', 'Succsessfuly Added brand');
            return json_encode(array('message' => 'Succsessfuly Added brand', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted brand', 'status' => 500));
        }
    }

    public function edit_brand(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'brand_edit' => 'required' , Rule::unique('brands')->ignore($id),
            'brand_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $brands = Brand::where('brand_id',$id)->get();
        foreach ( $brands as  $brand) {
            // dd($brand['brand_image']);
            $imageget = ($brand['brand_image']);   
     }

        $file = $request->brand_image;
        $filename1 = time() . '.' . $file->getClientOriginalName();
        $imagePath = public_path('admin_assets/brand_images/');
            unlink($imagePath.$imageget);
        $file->move(public_path('admin_assets/brand_images'), $filename1);
  
        if (!empty($request->brand_image)){
            if(!empty($request->post('is_home'))){
                $check = $request->is_home = 1;
             }else{
                 $check =  $request->is_home = 0; 
             }
            if (!empty($id)) {
                $is_update = Brand::where('brand_id', $id)->update([
                    'brand' => $request->brand_edit,
                    'brand_image' => $filename1,
                    'brand_status' => $request->brand_status_edit, 
                    'is_home'  => $check,        
                ]);
                if ($is_update) {
                    session()->flash('msgbrand', 'Succsessfuly Update brand');
                    return json_encode(array('message' => 'Succsessfuly Update brand', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update brand', 'status' => 500));
                }
            }
           }else{
            if(!empty($request->post('is_home'))){
                $check = $request->is_home = 1;
             }else{
                 $check =  $request->is_home = 0; 
             }
                if (!empty($id)) {
                $is_update = Brand::where('brand_id', $id)->update([
                'brand' => $request->brand_edit,
                'brand_status' => $request->brand_status_edit,  
                'is_home'  => $check,       
               ]);
              if ($is_update) {
                session()->flash('msgbrand', 'Succsessfuly Update brand');
                return json_encode(array('message' => 'Succsessfuly Update brand', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update brand', 'status' => 500));
            }
                   }
          }
    }


    public function destroy_brand(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {

            $brands = Brand::where('brand_id',$id)->get();
            foreach ( $brands as  $brand) {
                // dd($brand['brand_image']);
                $imageget = ($brand['brand_image']);   
         }
            $imagePath = public_path('admin_assets/brand_images/');
                unlink($imagePath.$imageget);
                $br = Brand::where('brand_id',$id);
            $is_delete = $br->delete();
            session()->flash('msgbrand', 'Succsessfuly Delete brand');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function brand_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('brands')->where('brand_id', $id)->update(array('brand_status' => '1'));  
            if (!empty($isst)){
                session()->flash('msgbrand', 'Succsessfuly Active brand');
                return json_encode(array('message' => 'Brand Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'Brand Not Active', 'status' => 500));
            }
            }
    }
    public function brand_status_ac($id, Request $request)
    { 
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('brands')->where('brand_id', $id)->update(array('brand_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('msgbrand', 'Succsessfuly Deactive brand');
                return json_encode(array('message' => 'Brand Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'Brand Not Deactive', 'status' => 500));
             }
            }
    }
}
