<?php
use Illuminate\Support\Facades\DB;
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



?>