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
        $title = "Category";
        return view('admin.category.category', compact('title'));
    }


    public function manage_category()
    {
        $title = "Add Category";
        return view('admin.category.manage_category', compact('title'));
    }
    public function insert_cat(Request $request)
    {
        //    dd($request->all());
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_slug' => 'required|unique:categories',
            'cat_image' => 'required',
            'cat_status' => 'required',
        ]);
        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }

        $file = $request->cat_image;
        $filename = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('admin_assets/cat_images'), $filename);


        $insert_cat = new category;
        $insert_cat->cat_name = $request->post('cat_name');
        $insert_cat->cat_slug = $request->post('cat_slug');
        $insert_cat->cat_parent_id = $request->post('cat_parent_id');
        $insert_cat->cat_image = $filename;
        $insert_cat->status = $request->post('cat_status');
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'cat_name_edit' => 'required',
            'cat_slug_edit' => 'required', Rule::unique('categories')->ignore($id),
            'cat_status_edit' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(array('error' => $validator->errors()->all()));
        }
        $cats = category::where('cat_id', $id)->get();
        foreach ($cats as  $cat) {
            $imageget = ($cat['cat_image']);
        }

        if (!empty($request->cat_image)) {
            $file = $request->cat_image;
            $filename1 = time() . '.' . $file->getClientOriginalName();
            $imagePath = public_path('admin_assets/cat_images/');
            unlink($imagePath . $imageget);
            $file->move(public_path('admin_assets/cat_images'), $filename1);
            if (!empty($id)) {
                $is_update = category::where('cat_id', $id)->update([
                    'cat_name' => $request->cat_name_edit,
                    'cat_slug' => $request->cat_slug_edit,
                    'status' => $request->cat_status_edit,
                    'cat_parent_id' => $request->cat_parent_id,
                    'cat_image' => $filename1,
                ]);
                if ($is_update) {
                    session()->flash('message', 'Succsessfuly Update Category');
                    return json_encode(array('message' => 'Succsessfuly Update Category', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update Category', 'status' => 500));
                }
            }
        } else {
            if (!empty($id)) {
                $is_update = category::where('cat_id', $id)->update([
                    'cat_name' => $request->cat_name_edit,
                    'cat_slug' => $request->cat_slug_edit,
                    'status' => $request->cat_status_edit,
                    'cat_parent_id' => $request->cat_parent_id,
                ]);
                if ($is_update) {
                    session()->flash('message', 'Succsessfuly Update Category');
                    return json_encode(array('message' => 'Succsessfuly Update Category', 'status' => 200));
                } else {
                    return json_encode(array('message' => 'Not Update Category', 'status' => 500));
                }
            }
        }
    }


    public function delete_cat($id, Request $request)
    {
        // dd($id);
        if (!empty($id)) {
            $cats = category::where('cat_id', $id)->get();
            foreach ($cats as  $cat) {
                $imageget = ($cat['cat_image']);
            }
            $imagePath = public_path('admin_assets/cat_images/');
            unlink($imagePath.$imageget);
            $br =Category::where('cat_id',$id);
        $is_delete = $br->delete();

            // $is_delete = Category::where('cat_id', $id)->delete();
            session()->flash('message', 'Succsessfuly Delete Category');
            if (!empty($is_delete))
                return json_encode(array('message' => 'Record Deleted successfully', 'status' => 200));
            else
                return json_encode(array('message' => 'Record  Not Deleted', 'status' => 500));
        }
    }
    public function cat_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('cat_id', 'cat_name', 'cat_parent_id', 'cat_image', 'cat_slug', 'status')->orderBy('cat_id', 'desc')->get();
            foreach ($data as $row) {
                return Datatables::of($data)->addIndexColumn()
                ->addColumn('image', function($row){
                    $cat_images=asset("admin_assets/cat_images/$row->cat_image");
                   $image = '<img src='.$cat_images.' style="height:50px;" />';
                    return $image;
                 })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '';
                        if ($row->status == 1) {
                            $actionBtn = '<a href="javascript:void(0)"  class="status_ac btn btn-success btn-sm item mr-3 cat_status"  data-cat_id="' . $row->cat_id . '" >Active</a>';
                        }
                        if ($row->status == 0) {
                            $actionBtn .= ' <a href="javascript:void(0)"  class="status_de btn btn-warning btn-sm item mr-3 cat_status"  data-cat_id="' . $row->cat_id . '" >DeActive</a>';
                        }

                        $actionBtn .= '<a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="category_edit edit btn btn-info btn-sm item cat_edit" data-cat_id="' . $row->cat_id . '" data-cat_name="' . $row->cat_name . '" data-cat_parent_id="' . $row->cat_parent_id . '"  data-cat_image="' . $row->cat_image. '" data-cat_slug="' . $row->cat_slug . '" data-cat_status="' . $row->status . '">Edit</a>';
                        $actionBtn .=  '<a href="javascript:void(0)"  class="delete btn btn-danger btn-sm item ml-3 cat_delete" data-toggle="modal" data-target="#Modal_Delete"  data-cat_id="' . $row->cat_id . '" >Delete</a>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action','image'])->make(true);
            }
        }
    }

    public function cat_status_de($id, Request $request)
    {
        // dd($id);
        if (!empty($id)) {

            $is_status = Category::where('cat_id', $id)->update(['status' => '0']);

            if (!empty($is_status)) {
                session()->flash('message', 'Category Deactive successfully');
                return json_encode(array('message' => 'Category Deactive successfully', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Category Not Deactive', 'status' => 500));
            }
        }
    }
    public function cat_status_ac($id, Request $request)
    {
        // dd($id);
        if (!empty($id)) {
            $is_status = Category::where('cat_id', $id)->update(['status' => '1']);
            if (!empty($is_status)) {
                session()->flash('message', 'Category Active successfully');
                return json_encode(array('message' => 'Category Active successfully', 'status' => 200));
            } else {
                return json_encode(array('message' => 'Category Not Active', 'status' => 500));
            }
        }
    }
    public function cat_name()
    {
        $data = Category::select('cat_id', 'cat_name', 'cat_parent_id', 'cat_image', 'cat_slug', 'status')->get();
        return json_encode($data);
    }
}
