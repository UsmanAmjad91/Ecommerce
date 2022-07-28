<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Coupon";
        return view('admin.coupon',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_coupon()
    {
        $title="Add Coupon";
        return view('admin.manage_coupon',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function coupon_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Coupon::select('coupon_id', 'coupon_title','coupon_code','coupon_value', 'coupon_status')->orderBy('coupon_id', 'desc')->get();
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm item coupon_edit" data-coupon_id="' . $row->coupon_id . '" data-coupon_name="' . $row->coupon_title . '" data-coupon_code="' . $row->coupon_code . '"data-coupon_value="' . $row->coupon_value . '" data-coupon_status="' . $row->coupon_status . '">Edit</a>'; 
                    $actionBtn .='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 coupon_delete" data-toggle="modal" data-target="#Modal_Delete"  data-coupon_id="' . $row->coupon_id . '" >Delete</a>';
                    if($row->coupon_status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="coupon_status_ac btn btn-success btn-sm item ml-3 coupon_status"  data-coupon_id="' . $row->coupon_id . '" >Active</a>';
                    }
                    if($row->coupon_status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="coupon_status_de btn btn-warning btn-sm item ml-3 coupon_status"  data-coupon_id="' . $row->coupon_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
     

        }
        public function insert_coupon(Request $request)
        {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'coupon_name' => 'required',
                'coupon_code' => 'required|unique:coupons',
                'coupon_value' => 'required',
                'coupon_status' => 'required',
            ]);
            if ($validator->fails()) {
                return json_encode(array('error' => $validator->errors()->all()));
            }
    
            $insert_cat = new Coupon;
            $insert_cat->coupon_title = $request->post('coupon_name');
            $insert_cat->coupon_code = $request->post('coupon_code');
            $insert_cat->coupon_value = $request->post('coupon_value');
            $insert_cat->coupon_status = $request->post('coupon_status');
            $insert_cat->save();
            if ($insert_cat) {
                session()->flash('message', 'Succsessfuly Added Coupon');
                return json_encode(array('message' => 'Succsessfuly Added Coupon', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Inserted Coupon', 'status' => 500));
            }
        }
    
    public function edit_coupon(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'coupon_name_edit' => 'required',
            'coupon_code_edit' => 'required',Rule::unique('coupons')->ignore($id),
            'coupon_value_edit' => 'required',
            'coupon_status_edit' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        if (!empty($id)) {
            $is_update = Coupon::where('coupon_id', $id)->update([
                'coupon_title' => $request->coupon_name_edit,
                'coupon_code' => $request->coupon_code_edit,
                'coupon_value' => $request->coupon_value_edit,
                'coupon_status' => $request->coupon_status_edit,
                 
            ]);
            if ($is_update) {
                session()->flash('message', 'Succsessfuly Update Coupons');
                return json_encode(array('message' => 'Succsessfuly Update Coupons', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Coupons', 'status' => 500));
            }
        }
    }

    
    public function destroy(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Coupon::where('coupon_id', $id)->delete();
            session()->flash('message', 'Succsessfuly Delete Coupon');
            if (!empty($is_delete))
            
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function coupon_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('coupons')->where('coupon_id', $id)->update(array('coupon_status' => '1'));  
            if (!empty($isst)){
                session()->flash('message', 'Succsessfuly Active Coupon');
                return json_encode(array('message' => 'Coupon Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'Coupon Not Active', 'status' => 500));
            }
            }
    }
    public function coupon_status_ac($id, Request $request)
    {
        
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('coupons')->where('coupon_id', $id)->update(array('coupon_status' => '0'));
            if (!empty($isstrt)){
                session()->flash('message', 'Succsessfuly Deactive Coupon');
                return json_encode(array('message' => 'Coupon Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'Coupon Not Deactive', 'status' => 500));
             }
            }
    }
}
