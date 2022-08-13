<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{
   
    public function index()
    {
        $title="Banner";
        return view('admin.banner.banner',compact('title'));
    }
    public function  manage_banner()
    {
        $title="Add Banner";

        return view('admin.banner.manage_banner',compact('title'));
    }
    public function insert_banner(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'button_text' => 'required',
            'button_link' => 'required',
            'banner_status' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        $file = $request->banner_image1;
        $filename1 = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/banner_images'), $filename1);

        $file = $request->banner_image;
        $filename = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/banner_images'), $filename);

        $insert_banner = new Banner;
        $insert_banner->btn_text = $request->post('button_text');
        $insert_banner->btn_link = $request->post('button_link');
        $insert_banner->banner_status = $request->post('banner_status');
        $insert_banner->banner_image1 =  $filename1;
        $insert_banner->banner_image2 =  $filename;
        $insert_banner->save();
        if ($insert_banner) {
            session()->flash('msgbanner', 'Succsessfuly Added banner');
            return json_encode(array('message' => 'Succsessfuly Added banner', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted banner', 'status' => 500));
        }


    }
    public function banner_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::select('banner_id', 'banner_image1', 'banner_image2','btn_text', 'btn_link', 'banner_status')->orderBy('banner_id', 'desc')->get();
            
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
             ->addColumn('image', function($row){
                
                $banner_images1=asset("admin_assets/banner_images/$row->banner_image2");
              
               $image = '<img src='. $banner_images1.' style="height:50px;" />';
                return $image;
             })
             ->addColumn('image1', function($row){
                $banner_images=asset("admin_assets/banner_images/$row->banner_image1");
                
               $image1 = '<img src='.$banner_images.' style="height:50px;" />';
              
                return $image1;
             })
          ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit banner-br btn btn-success btn-sm item banner_edit" data-banner_id="' . $row->banner_id . '" data-btn_text="' . $row->btn_text . '"  data-btn_link="' . $row->btn_link . '"   data-banner_image1="' . $row->banner_image1 . '" data-banner_image2="' . $row->banner_image2 . '"  data-banner_status="' . $row->banner_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-2 banner_delete" data-toggle="modal" data-target="#Modal_Delete"  data-banner_id="' . $row->banner_id . '" >Delete</a>';
                    if($row->banner_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="banner_status_ac btn btn-success btn-sm item ml-2 banner_status"  data-banner_id="' . $row->banner_id . '" >Active</a>';
                    }
                    if($row->banner_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="banner_status_de btn btn-warning btn-sm item ml-2 banner_status"  data-banner_id="' . $row->banner_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action','image','image1'])->make(true);
            }
        }



    }

    public function edit_banner(Request $request ,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'button_text' => 'required',
            'button_link' => 'required',
            'banner_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        $banners = Banner::where('banner_id',$id)->get();
        foreach ($banners as  $banner) {
            $imageget1 = ($banner['banner_image1']); 
            $imageget2 = ($banner['banner_image2']);   
     }

     $file = $request->banner_image;
        $filename1 = time() . '.' . $file->getClientOriginalName();
        $imagePath = public_path('admin_assets/banner_images/');
            unlink($imagePath.$imageget1);
        $file->move(public_path('admin_assets/banner_images'), $filename1);
  
        $file = $request->banner_image1;
        $filename = time() . '.' . $file->getClientOriginalName();
        $imagePath = public_path('admin_assets/banner_images/');
            unlink($imagePath.$imageget2);
        $file->move(public_path('admin_assets/banner_images'), $filename);


        if (!empty($request->banner_image) && !empty($request->banner_image1)){
            if (!empty($id)) {
                $is_update = Banner::where('banner_id', $id)->update([
                    'btn_text' => $request->button_text,
                    'btn_link' => $request->button_link,
                    'banner_image1' => $filename,
                    'banner_image2' => $filename1,
                    'banner_status' => $request->banner_status_edit,       
                ]);
                if ($is_update) {
                    session()->flash('msgbanner', 'Succsessfuly Update banner');
                    return json_encode(array('message' => 'Succsessfuly Update banner', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update banner', 'status' => 500));
                }
            }
        }else if(!empty($request->banner_image) && empty($request->banner_image1)){
            if (!empty($id)) {
                $is_update = Banner::where('banner_id', $id)->update([
                    'btn_text' => $request->button_text,
                    'btn_link' => $request->button_link,
                    'banner_image2' => $filename1,
                    'banner_status' => $request->banner_status_edit,       
                ]);
                if ($is_update) {
                    session()->flash('msgbanner', 'Succsessfuly Update banner');
                    return json_encode(array('message' => 'Succsessfuly Update banner', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update banner', 'status' => 500));
                }
            }
        }else if(!empty($request->banner_image1) && empty($request->banner_image)){
            if (!empty($id)) {
                $is_update = Banner::where('banner_id', $id)->update([
                    'btn_text' => $request->button_text,
                    'btn_link' => $request->button_link,
                    'banner_image1' => $filename,
                    'banner_status' => $request->banner_status_edit,       
                ]);
                if ($is_update) {
                    session()->flash('msgbanner', 'Succsessfuly Update banner');
                    return json_encode(array('message' => 'Succsessfuly Update banner', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update banner', 'status' => 500));
                }
            }

        }else{
            if (!empty($id)) {
                $is_update = Banner::where('banner_id', $id)->update([
                    'btn_text' => $request->button_text,
                    'btn_link' => $request->button_link,
                    'banner_status' => $request->banner_status_edit,       
                ]);
                if ($is_update) {
                    session()->flash('msgbanner', 'Succsessfuly Update banner');
                    return json_encode(array('message' => 'Succsessfuly Update banner', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update banner', 'status' => 500));
                }
            }
        }
        
    }

    public function destroy_banner(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {

            $banners = Banner::where('banner_id',$id)->get();
            foreach ($banners as  $banner) {
                
                $imageget1 = ($banner['banner_image1']); 
                $imageget2 = ($banner['banner_image2']);   
         }
            $imagePath = public_path('admin_assets/banner_images/');
                unlink($imagePath.$imageget1);
                unlink($imagePath.$imageget2);
                $br = Banner::where('banner_id',$id);
            $is_delete = $br->delete();
            session()->flash('msgbanner', 'Succsessfuly Delete banner');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }


    public function banner_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('banners')->where('banner_id', $id)->update(array('banner_status' => '1'));  
            if (!empty($isst)){
                session()->flash('msgbanner', 'Succsessfuly Active banner');
                return json_encode(array('message' => 'banner Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'banner Not Active', 'status' => 500));
            }
            }
    }
    public function banner_status_ac($id, Request $request)
    { 
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('banners')->where('banner_id', $id)->update(array('banner_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('msgbanner', 'Succsessfuly Deactive banner');
                return json_encode(array('message' => 'banner Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'banner Not Deactive', 'status' => 500));
             }
            }
    }


}
