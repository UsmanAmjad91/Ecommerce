<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
session_start();

function menu(){

    $cate['parent_cat']=DB::table('categories')
    ->where(['status'=>1])
    ->where(['is_home'=>1])
    ->get();
    foreach($cate['parent_cat']  as $listcat){
      $parentid=  [$listcat->cat_id];
    
      $cate['child_id'][$listcat->cat_id]=DB::table('categories')
      ->where(['status'=>1])
      ->where(['is_home'=>1])
      ->where(['cat_parent_id'=>$parentid])
      ->get();

      
    }
    $caten=DB::table('categories')
        ->where(['status'=>1])
        ->where(['is_home'=>1])
        ->where(['cat_parent_id'=> Null])
        ->get();
        
     $html='';
     foreach($caten as $prow){
        $html .= '<li><a href="#">'. $prow->cat_name .'<span class="caret"></span></a>
                    <ul class="dropdown-menu">';
                  foreach($cate['child_id'][$prow->cat_id] as $crow){           
     $html .=  '<li><a href="#">'.$crow->cat_name .'</a></li>';
                  }
     $html .=   '</ul>
              </li>';
            }



        return $html;
}

     function getUserTempid(){
     
    if(session()->has('USER_TEMP_ID') == null){
        // $rand = Rand(111111111,999999999);
        // $rand = random_int(111111111,999999999);
        $rand =   mt_rand(111111111,999999999);
           Session()->put('USER_TEMP_ID',$rand);
      // $_SESSION['USER_TEMP_ID'] = $rand;
      
      return $rand;

    }else{

      return session()->has('USER_TEMP_ID');
    }
    
   }
 
?>