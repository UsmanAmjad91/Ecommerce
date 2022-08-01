@include('admin_component.header')
<title>{{ $title }}</title>
@section('product_select','active')
@include('admin_component.sidebar')


<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">  
                            <p>Add product</p>         
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                               
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Session('username')}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{url('/admin/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a href="{{url('/admin/dashboard')}}"><span>Dashboard</span></a> <span> > </span> <a href="{{url('/admin/product')}}"><span>productList</span></a> <span> > </span> <a href="{{url('/admin/product/add_product')}}"><span>Add product</span></a>
               
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{url('/admin/product')}}" style="color: white;">Back</a></button>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-header">Add product</div>
                            <div class="card-body">
                                <form class="addproduct" id="addproduct" name="addproduct" method="POST" action="javascript:void(0);"  enctype="multipart/form-data">
                                    @csrf
                                    <h6 id="responsecheck"> </h6>
                                 <div class="col-lg-12"> 
                                       <div class="row d-flex justify-content-between">                      
                                    <div class="form-group">
                                        <label for="cat_id" class="control-label mb-1">Category</label>
                                        <select class="selectpicker form-control category" id="cat_id" name="cat_id">
                                            <option  value="" selected>Select</option>
                                           
                                            @foreach($category as $row)
                                            <option value="{{$row->cat_id}}">{{$row->cat_name}}</option>
                                           @endforeach
                                          </select> 
                                       <h6 id="catidcheck"> </h6>
                                   </div>
                                       <div class="form-group">
                                     <label for="color_id" class="control-label mb-1">Color</label>
                                    <select class="selectpicker form-control" id="color_id" name="color_id">
                                        <option  value="" selected>Select</option>
                                        @foreach($color as $row)
                                        <option value="{{$row->color_id}}">{{$row->color}}</option>
                                       @endforeach
                                      </select> 
                                      <h6 id="coloridcheck"> </h6>
                                      </div>
                                      <div class="form-group">
                                        <label for="coupon_id" class="control-label mb-1">Coupon</label>
                                       <select class="selectpicker form-control" id="coupon_id" name="coupon_id">
                                        <option  value="" selected>Select</option>
                                        @foreach($coupon as $row)
                                        <option value="{{$row->coupon_id}}">{{$row->coupon_title}}</option>
                                       @endforeach
                                      </select> 
                                         <h6 id="couponidcheck"> </h6>
                                         </div>
                                         <div class="form-group">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                             <select class="selectpicker form-control" id="size_id" name="size_id">
                                                <option  value="" selected>Select</option>
                                                @foreach($size as $row)
                                                <option value="{{$row->size_id}}">{{$row->size}}</option>
                                               @endforeach
                                              </select> 
                                             <h6 id="sizeidcheck"> </h6>
                                             </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div class="row d-flex justify-content-between">  
                                            <div class="form-group">
                                                <label for="product" class="control-label mb-1">Product</label>
                                                 <input type="text" id="product" name="product" class="form-control">
                                                <h6 id="productcheck"> </h6>
                                            </div>                    
                                        <div class="form-group">
                                         <label for="product_slug" class="control-label mb-1">Product Slug</label>
                                         <input type="text" id="product_slug" name="product_slug" class="form-control">
                                         <h6 id="productslugcheck"> </h6>
                                       </div>
                                        <div class="form-group">
                                      <label for="brand_id" class="control-label mb-1">Brand</label>
                                     <select class="selectpicker form-control" id="brand_id" name="brand_id">
                                        <option  value="" selected>Select</option>
                                        @foreach($brand as $row)
                                                <option value="{{$row->brand_id}}">{{$row->brand}}</option>
                                               @endforeach
                                      </select> 
                                       <h6 id="brandidcheck"> </h6>
                                       </div>
                                       <div class="form-group">
                                         <label for="year_id" class="control-label mb-1">Model Year</label>
                                        <select class="selectpicker form-control" id="year_id" name="year_id">
                                            <option  value="" selected>Select</option>
                                            @foreach($myear as $row)
                                                <option value="{{$row->model_id}}">{{$row->year}}</option>
                                               @endforeach
                                          </select> 
                                          <h6 id="yearidcheck"> </h6>
                                          </div>
                                          
                                       </div>
                                     </div>
                                     <div class="col-lg-12"> 
                                        <div class="row d-flex justify-content-between">                      
                                        <div class="form-group">
                                             <label for="warranty" class="control-label mb-1">Warranty</label>
                                              <input type="text" id="warranty" name="warranty" class="form-control">
                                              <h6 id="warrantycheck"> </h6>
                                              </div>
                                        <div class="form-group">
                                      <label for="uses" class="control-label mb-1">Uses</label>
                                     <input type="text" id="uses" name="uses" class="form-control">
                                       <h6 id="usescheck"> </h6>
                                       </div>
                                       <div class="form-group">
                                         <label for="keywords" class="control-label mb-1">Keywords</label>
                                        <input type="text" id="keyword" name="keyword" class="form-control">
                                          <h6 id="keywordcheck"> </h6>
                                          </div>
                                          <div class="form-group">
                                             <label for="short_desc" class="control-label mb-1">Short Description</label>
                                              <input type="text" id="short_desc" name="short_desc" class="form-control">
                                              <h6 id="shortdesccheck"> </h6>
                                              </div>
                                       </div>
                                     </div>
                                        <div class="col-lg-12"> 
                                        <div class="row d-flex justify-content-between">                      
                                        <div class="form-group col-6" id="editor">
                                             <label for="desc" class="control-label mb-1">Description</label>
                                              <textarea type="text" id="desc" name="desc" class="form-control materialize-textarea"></textarea>
                                              <h6 id="desccheck"> </h6>
                                              </div>
                                        <div class="form-group col-6">
                                         <label for="technical_specification" class="control-label mb-1">Technical specification</label>
                                         <textarea type="text" id="technical_specification" name="technical_specification" class="form-control"></textarea>
                                         <h6 id="technical_specificationcheck"> </h6>
                                         </div>
                                       </div>
                                     </div>
                                     <div class="col-lg-12"> 
                                        <div class="row d-flex justify-content-between">                      
                                        <div class="form-group col-1">
                                             <label for="image1" class="control-label mb-1"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                              <input type="file" id="image1" name="image1" hidden>
                                              <h6 id="img1check"> </h6>
                                              </div>
                                              <div class="form-group col-1">
                                                <label for="image2" class="control-label mb-1"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                 <input type="file" id="image2" name="image2" hidden>
                                                 <h6 id="img2check"> </h6>
                                                 </div>
                                                 <div class="form-group col-1">
                                                    <label for="image3" class="control-label mb-1"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                     <input type="file" id="image3" name="image3" hidden>
                                                     <h6 id="img3check"> </h6>
                                                     </div>
                                                     <div class="form-group col-1">
                                                        <label for="image4" class="control-label mb-1"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                         <input type="file" id="image4" name="image4" hidden>
                                                         <h6 id="img4check"> </h6>
                                                         </div>
                                       
                                       </div>
                                     </div>

                                    <div class="form-group ">
                                        <label for="coupon_status" class="control-label mb-1">Product Status</label>
                                          <select class="selectpicker form-control col-2" name="product_status" id="product_status">
                                            <option  value="" selected>Select</option>
                                            <option value="1">Status On</option>
                                            <option value="0">Status Off</option>
                                          </select>   
                                        <h6 id="productstatuscheck"> </h6>
                                    </div>
                                    <div class="form-group">
                                        <div class="col text-center">
                                        <button type="submit" id="addproduct" name="addproduct" class="form-control btn btn-lg btn-info btn-block w-25 d-flex justify-content-center">Add product</button>  
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')
<script>
// $(document).ready(function() {

//             $.ajax({
//                 url: "/admin/product/get",
//                 type: 'get',
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 dataType: 'json',
//                 contentType: false,
//                 processData: false,
//             success: function(data) {
//                 // var items = data;
//                 // console.log(items);
//                 $.get(url, function (data) {
             
//               $('#cat-id').text(data.id);
//               $('#cat-name').text(data.name);
             
//           })
                
//                 // console.log(cat_id);
//             //   var i;
//             //   var html = '';
//             //   for (i = 0; i < items.length; i++) {   
//             //     html += 
//             //       '<option>' + items[i].cat_id + '</option>' +
//             //       '<option>' + items[i].cat_name + '</option>' 
//             //       ;
//             //   }
//             //  console.log(html);
//             //   $('.category').append(html);
             
              
//             }

//           });
     

// });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#desc' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#technical_specification' ) )
        .catch( error => {
            console.error( error );
        } );
</script>