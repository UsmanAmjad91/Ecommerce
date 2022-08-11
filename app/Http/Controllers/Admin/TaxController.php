<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class TaxController extends Controller
{
   
    public function index()
    {
        $title="Tax";
        return view('admin.tax.tax',compact('title'));
    }

    public function manage_tax()
    {
        $title="Add Tax";
        return view('admin.tax.manage_tax',compact('title'));
    }
    public function tax_list(Request $request)
    
    {
        if ($request->ajax()) {
            $data = Tax::select('tax_id', 'tax_desc','tax_value','tax_status')->orderBy('tax_id', 'desc')->get();
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm item tax_edit" data-tax_id="' . $row->tax_id . '" data-tax_name="' . $row->tax_desc . '"  data-tax_value="' . $row->tax_value . '"  data-tax_status="' . $row->tax_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 tax_delete" data-toggle="modal" data-target="#Modal_Delete"  data-tax_id="' . $row->tax_id . '" >Delete</a>';
                    if($row->tax_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="tax_status_ac btn btn-success btn-sm item ml-3 tax_status"  data-tax_id="' . $row->tax_id . '" >Active</a>';
                    }
                    if($row->tax_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="tax_status_de btn btn-warning btn-sm item ml-3  tax_status"  data-tax_id="' . $row->tax_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
     

        }
        public function insert_tax(Request $request)
        {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'tax_name' => 'required',
                'tax_value' => 'required',
                'tax_status' => 'required',
            ]);
            if ($validator->fails()) {
                return json_encode(array('error' => $validator->errors()->all()));
            }
    
            $insert_cat = new Tax;
            $insert_cat->tax_desc = $request->post('tax_name');
            $insert_cat->tax_value = $request->post('tax_value');
            $insert_cat->tax_status = $request->post('tax_status');
            $insert_cat->save();
            if ($insert_cat) {
                session()->flash('mestax', 'Succsessfuly Added Tax');
                return json_encode(array('message' => 'Succsessfuly Added Tax', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Inserted Tax', 'status' => 500));
            }
        }


        public function destroy(Request $request,$id)
        {
            // dd($id);
            if (!empty($id)) {
                $is_delete = Tax::where('tax_id', $id)->delete();
                session()->flash('mestax', 'Succsessfuly Delete Coupon');
                if (!empty($is_delete))
                
                    return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
                else
                    return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
            }
        }
    
        public function tax_status_de($id, Request $request)
        {
    
            if (!empty($id)) {
                // dd($id);
                $isst =  DB::table('taxes')->where('tax_id', $id)->update(array('tax_status' => '1'));  
                if (!empty($isst)){
                    session()->flash('mestax', 'Succsessfuly Active Tax');
                    return json_encode(array('message' => 'Tax Active successfully', 'status' => 200));
                }else{
                    return json_encode(array('message' => 'Tax Not Active', 'status' => 500));
                }
                }
        }
        public function tax_status_ac($id, Request $request)
        {
            
            if (!empty($id)) {
                // dd($id);
                $isstrt =  DB::table('taxes')->where('tax_id', $id)->update(array('tax_status' => '0'));
                if (!empty($isstrt)){
                    session()->flash('mestax', 'Succsessfuly Deactive Tax');
                    return json_encode(array('message' => 'Tax Deactive successfully', 'status' => 200));
                 } else{
                    return json_encode(array('message' => 'Tax Not Deactive', 'status' => 500));
                 }
                }
        }
        public function edit_tax(Request $request,$id)
        {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'tax_name_edit' => 'required',
                'tax_value_edit' => 'required',
                'tax_status_edit' => 'required',
            ]);
            if ($validator->fails()) {
                return json_encode(array('error' => $validator->errors()->all()));
            }
            if (!empty($id)) {
                $is_update = Tax::where('tax_id', $id)->update([
                    'tax_desc' => $request->tax_name_edit,
                    'tax_value' => $request->tax_value_edit,
                    'tax_status' => $request->tax_status_edit,
                ]);
                if ($is_update) {
                    session()->flash('mestax', 'Succsessfuly Update Tax');
                    return json_encode(array('message' => 'Succsessfuly Update Tax', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update Tax', 'status' => 500));
                }
            }
        }
        public function get_tax(Request $request)
        {
            $data =  DB::table('taxes')->select('tax_id', 'tax_desc','tax_value','tax_status')->get();
            return json_encode($data);
        }
}
