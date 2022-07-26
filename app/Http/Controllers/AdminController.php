<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\Admin;
use session;
use session_destroy;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $guard = null)
    {
        if( $request->session()->has('ADMIN_LOGIN')){
           
        }else{
            return view('admin.login'); 
        }
        return view('admin.login');
        if (Auth::guard($guard)->check()) {
            return view('admin.login');
        }
        
    }

    
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);
        // dd( $request->all());
        $admin = Admin::Where("email", "=", $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password , $admin->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('username', $admin['username']);
                $request->session()->put('admin_id', $admin['admin_id']);
                return json_encode(array('message' => 'Succsessfuly', 'status' => 200, 'username', 'admin_id'));
            } else {
                return json_encode(array('message' => 'Password Not Match', 'status' => 500));
            }
        } else {

            return json_encode(array('message' => 'You have Wrong Email Or Password', 'status' => 500));
        }
        
    //     $email=$request->post('email');
    //     $password=$request->post('password');
    //    $result=Admin::Where(['email'=>$email,'password'=>$password])->get();
    // //  dd($result);
    // if ($result) {
    //         if ($request->password == $result->password) {
    //             $request->session()->put('username', $result['username']);
    //             $request->session()->put('admin_id', $result['admin_id']);
    //             return json_encode(array('message' => 'Succsessfuly', 'status' => 200, 'username', 'admin_id'));
    //         } else {
    //             return json_encode(array('message' => 'Password Not Match', 'status' => 500));
    //         }
    //     } else {

    //         return json_encode(array('message' => 'Wrong Email Or Password', 'status' => 500));
    //     }
    }
    public function dashboard()
    {
        $title="Dashboard";
       return view('admin.dashboard',compact('title'));
    }

    public function logout(Request $request)
    {
        if (session()->has('username')) {
            session()->pull('username');
        }
        $request->session()->forget('username');
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('admin_id');
        return redirect('/admin');
    }
    public function updatepassword(Request $request)
    {
        // $r=Admin::Where("admin_id", "=", '1')->get();

        // $r->password=Hash::make('123456789');
        // $r->save();
        $is_change = Admin::where([
            ['admin_id', '=', '1'],
        ])->update([
            'password' => Hash::make('123456789'),
        ]);
    }


}
