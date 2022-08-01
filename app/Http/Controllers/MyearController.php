<?php

namespace App\Http\Controllers;

use App\Models\Myear;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class MyearController extends Controller
{
    public function index()
    {
        $title="Model_Year";
        return view('admin.year.year',compact('title'));
    }
   
    public function  manage_year()
    {
        $title="Add Year";
        return view('admin.year.manage_year',compact('title'));
    }
    public function year_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Myear::select('model_id', 'year','year_status')->orderBy('model_id', 'desc')->get();
            
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="year edit btn btn-success btn-sm item year_edit" data-year_id="' . $row->model_id . '" data-year="' . $row->year . '" data-year_status="' . $row->year_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 year_delete" data-toggle="modal" data-target="#Modal_Delete"  data-year_id="' . $row->model_id . '" >Delete</a>';
                    if($row->year_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="year_status_ac btn btn-success btn-sm item ml-3 year_status"  data-year_id="' . $row->model_id . '" >Active</a>';
                    }
                    if($row->year_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="year_status_de btn btn-warning btn-sm item ml-3 year_status"  data-year_id="' . $row->model_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
    }

    public function insert_year(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'year' => 'required|unique:myears',
            'year_status' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $insert_year = new Myear;
        $insert_year->year = $request->post('year');
        $insert_year->year_status = $request->post('year_status');
        $insert_year->save();
        if ($insert_year) {
            session()->flash('msgyear', 'Succsessfuly Added year');
            return json_encode(array('message' => 'Succsessfuly Added year', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted year', 'status' => 500));
        }
    }

    public function edit_year(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'year_edit' => 'required',Rule::unique('myears')->ignore($id),
            'year_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        if (!empty($id)) {
            $is_update = Myear::where('model_id', $id)->update([
                'year' => $request->year_edit,
                'year_status' => $request->year_status_edit,         
            ]);
            if ($is_update) {
                session()->flash('msgyear', 'Succsessfuly Update year');
                return json_encode(array('message' => 'Succsessfuly Update year', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update year', 'status' => 500));
            }
        }
    }


    public function destroy_year(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Myear::where('model_id', $id)->delete();
            session()->flash('msg', 'Succsessfuly Delete year');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function year_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('myears')->where('model_id', $id)->update(array('year_status' => '1'));  
            if (!empty($isst)){
                session()->flash('msgyear', 'Succsessfuly Active year');
                return json_encode(array('message' => 'year Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'year Not Active', 'status' => 500));
            }
            }
    }
    public function year_status_ac($id, Request $request)
    {
        
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('myears')->where('model_id', $id)->update(array('year_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('msgyear', 'Succsessfuly Deactive year');
                return json_encode(array('message' => 'year Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'year Not Deactive', 'status' => 500));
             }
            }
    }
}
