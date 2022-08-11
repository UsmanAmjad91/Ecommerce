<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
   
    public function index()
    {
        $title="Customer";
        return view('admin.customers.customer',compact('title'));
    }
    public function customer_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::select('customer_id', 'name', 'email', 'password', 'mobile', 'address', 'country', 'city', 'state', 'zip', 'company', 'gstin', 'status')->get();
            foreach ($data as $row) {
             return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                     $actionBtn ='<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 customer_delete" data-toggle="modal" data-target="#Modal_Delete"  data-customer_id="' . $row->customer_id . '" >Delete</a>';
                    if($row->status == 1){
                        $actionBtn .= '<a href="javascript:void(0)"  class="customer_status_ac btn btn-success btn-sm item mt-2  customer_status"  data-customer_id="' . $row->customer_id . '" >Active</a>';
                    }
                    if($row->status == 0){
                 $actionBtn .= ' <a href="javascript:void(0)"  class="customer_status_de btn btn-warning btn-sm item mt-2 customer_status"  data-customer_id="' . $row->customer_id . '" >DeActive</a>';
                     }
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
    }

    
}


public function destroy(Request $request,$id)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Customer::where('customer_id', $id)->delete();
            session()->flash('customer', 'Succsessfuly Delete Coupon');
            if (!empty($is_delete))
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }

    public function customer_status_de($id, Request $request)
    {

        if (!empty($id)) {
            // dd($id);
            $isst =  DB::table('customers')->where('customer_id', $id)->update(array('status' => '1'));  
            if (!empty($isst)){
                session()->flash('customer', 'Succsessfuly Active customer');
                return json_encode(array('message' => 'Customer Active successfully', 'status' => 200));
            }else{
                return json_encode(array('message' => 'Customer Not Active', 'status' => 500));
            }
            }
    }
    public function customer_status_ac($id, Request $request)
    {
        
        if (!empty($id)) {
            // dd($id);
            $isstrt =  DB::table('customers')->where('customer_id', $id)->update(array('status' => '0'));
            if (!empty($isstrt)){
                session()->flash('customer', 'Succsessfuly Deactive Customer');
                return json_encode(array('message' => 'Customer Deactive successfully', 'status' => 200));
             } else{
                return json_encode(array('message' => 'Customer Not Deactive', 'status' => 500));
             }
            }
    }





}