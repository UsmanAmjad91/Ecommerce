<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class SizeController extends Controller
{
   
    public function index()
    {
        $title="Size";
        return view('admin.size.size',compact('title'));
    }
   
    public function  manage_size()
    {
        $title="Add Size";
        return view('admin.size.manage_size',compact('title'));
    }
    
    public function size_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Size::select('size_id', 'size','size_status')->orderBy('size_id', 'desc')->get();
            
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm item size_edit" data-size_id="' . $row->size_id . '" data-size="' . $row->size . '" data-size_status="' . $row->size_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 size_delete" data-toggle="modal" data-target="#Modal_Delete"  data-size_id="' . $row->size_id . '" >Delete</a>';
                    if($row->size_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="size_status_ac btn btn-success btn-sm item ml-3 size_status"  data-size_id="' . $row->size_id . '" >Active</a>';
                    }
                    if($row->size_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="size_status_de btn btn-warning btn-sm item ml-3 size_status"  data-size_id="' . $row->size_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
    }

    public function insert_size(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'size' => 'required',
            'size_status' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $insert_size = new Size;
        $insert_size->size = $request->post('size');
        $insert_size->size_status = $request->post('size_status');
        $insert_size->save();
        if ($insert_size) {
            session()->flash('reply', 'Succsessfuly Added Size');
            return json_encode(array('message' => 'Succsessfuly Added Size', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted Size', 'status' => 500));
        }
    }

    public function edit_size(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'size_edit' => 'required',
            'size_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        if (!empty($id)) {
            $is_update = Size::where('size_id', $id)->update([
                'size' => $request->size_edit,
                'size_status' => $request->size_status_edit,         
            ]);
            if ($is_update) {
                session()->flash('reply', 'Succsessfuly Update Size');
                return json_encode(array('message' => 'Succsessfuly Update Size', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Size', 'status' => 500));
            }
        }
    }


    public function destroy_size(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Size::where('size_id', $id)->delete();
            session()->flash('reply', 'Succsessfuly Delete Coupon');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function size_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('sizes')->where('size_id', $id)->update(array('size_status' => '1'));  
            if (!empty($isst)){
                session()->flash('reply', 'Succsessfuly Active Size');
                return json_encode(array('message' => 'Size Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'Size Not Active', 'status' => 500));
            }
            }
    }
    public function size_status_ac($id, Request $request)
    {
        
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('sizes')->where('size_id', $id)->update(array('size_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('reply', 'Succsessfuly Deactive Size');
                return json_encode(array('message' => 'Size Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'Size Not Deactive', 'status' => 500));
             }
            }
    }
}
