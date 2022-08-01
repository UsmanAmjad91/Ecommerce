<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Color";
        return view('admin.color.color',compact('title'));
    }
   
    public function  manage_color()
    {
        $title="Add Color";
        return view('admin.color.manage_color',compact('title'));
    }
    
    public function color_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Color::select('color_id', 'color','color_status')->orderBy('color_id', 'desc')->get();
            
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm item color_edit" data-color_id="' . $row->color_id . '" data-color="' . $row->color . '" data-color_status="' . $row->color_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 color_delete" data-toggle="modal" data-target="#Modal_Delete"  data-color_id="' . $row->color_id . '" >Delete</a>';
                    if($row->color_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="color_status_ac btn btn-success btn-sm item ml-3 color_status"  data-color_id="' . $row->color_id . '" >Active</a>';
                    }
                    if($row->color_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="color_status_de btn btn-warning btn-sm item ml-3 color_status"  data-color_id="' . $row->color_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
    }

    public function insert_color(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'color' => 'required|unique:colors',
            'color_status' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $insert_color = new Color;
        $insert_color->color = $request->post('color');
        $insert_color->color_status = $request->post('color_status');
        $insert_color->save();
        if ($insert_color) {
            session()->flash('msg', 'Succsessfuly Added Color');
            return json_encode(array('message' => 'Succsessfuly Added Color', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted Color', 'status' => 500));
        }
    }

    public function edit_color(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'color_edit' => 'required', Rule::unique('colors')->ignore($id),
            'color_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        if (!empty($id)) {
            $is_update = Color::where('color_id', $id)->update([
                'color' => $request->color_edit,
                'color_status' => $request->color_status_edit,         
            ]);
            if ($is_update) {
                session()->flash('msg', 'Succsessfuly Update Color');
                return json_encode(array('message' => 'Succsessfuly Update Color', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Color', 'status' => 500));
            }
        }
    }


    public function destroy_color(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Color::where('color_id', $id)->delete();
            session()->flash('msg', 'Succsessfuly Delete Color');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function color_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('colors')->where('color_id', $id)->update(array('color_status' => '1'));  
            if (!empty($isst)){
                session()->flash('msg', 'Succsessfuly Active Color');
                return json_encode(array('message' => 'color Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'color Not Active', 'status' => 500));
            }
            }
    }
    public function color_status_ac($id, Request $request)
    {
        
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('colors')->where('color_id', $id)->update(array('color_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('msg', 'Succsessfuly Deactive Color');
                return json_encode(array('message' => 'color Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'color Not Deactive', 'status' => 500));
             }
            }
    }
}
