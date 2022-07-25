<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category');
    }


    public function manage_category()
    {
        return view('admin.manage_category');
    }
    public function insert_cat(Request $request)
    {
        //    dd($request->all());
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $insert_cat = new category;
        $insert_cat->cat_name = $request->post('cat_name');
        $insert_cat->cat_slug = $request->post('cat_slug');
        $insert_cat->save();
        if ($insert_cat) {
            session()->flash('message', 'Succsessfuly Added Category');
            return json_encode(array('message' => 'Succsessfuly Added Category', 'status' => 200));
        } else {
            return json_encode(array('message' => 'Not Inserted Category', 'status' => 500));
        }
    }

    public function edit_cat($id, Request $request)
    {
        // dd($id);
    //    $up=Category::where('cat_id', $id);
        $validator = Validator::make($request->all(), [
            'cat_name_edit' => 'required',
            'cat_slug_edit' => 'required', Rule::unique('categories')->ignore($id),
        ]);
       
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        // dd($request->all());
        
        if (!empty($id)) {
            $is_update = Category::where('cat_id', $id)->update([
                'cat_name' => $request->cat_name_edit,
                 'cat_slug' => $request->cat_slug_edit,
            ]);
            if ($is_update) {
                session()->flash('message', 'Succsessfuly Update Category');
                return json_encode(array('message' => 'Succsessfuly Update Category', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Not Update Category', 'status' => 500));
            }
        }
    }


    public function delete_cat($id, Request $request)
    {
        // dd($id);
        if (!empty($id)) {
            $is_delete = Category::where('cat_id', $id)->delete();

            if (!empty($is_delete))
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }
    public function cat_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('cat_id', 'cat_name', 'cat_slug')->orderBy('cat_id', 'desc')->get();
            foreach ($data as $row) {
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn = '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-sm item cat_edit" data-cat_id="' . $row->cat_id . '" data-cat_name="' . $row->cat_name . '" data-cat_slug="' . $row->cat_slug . '">Edit</a> <a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 cat_delete" data-toggle="modal" data-target="#Modal_Delete"  data-cat_id="' . $row->cat_id . '" >Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])->make(true);
            }
        }
     

        }
}
