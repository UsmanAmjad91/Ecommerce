@include('admin_component.header')
<title>{{ $title }}</title>
@section('product_edit', 'active')
@include('admin_component.sidebar')
<style>
  .px-2{
    display: none;
  }
</style>
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <p class="form-header">

                    </p>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <p>Product</p>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">

                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Session('username') }}</a>
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
                                        <a href="{{ url('/admin/logout') }}">
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->

                        <div class="table-data__tool">
                            <p><a href="{{ url('/admin/dashboard') }}">Dashboard</a> <span> > </span> <a
                                    href="{{ url('/admin/product') }}"><span>Product List</span></a> </p>
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            {{-- <div class="table-data__tool-right">
                                <a href="{{ url('/admin/product/add_product') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi"></i>Add product</button></a>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if (session()->has('msgpro2'))
                                    <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">
                                        {{ session()->get('msgpro2') }}</p>
                                @endif
                                <h6 id="responseeditcheck"></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-data2 datatable table-responsive table-lg" id='studentsTable'>
                                <thead>
                                    <tr>
                                        {{-- <th>Product ID</th> --}}
                                        <th>Name Product</th>
                                        <th>Description</th>
                                        <th>T S</th>
                                        <th>Image</th>
                                        <th>Image</th>
                                        <th>Image</th>
                                        <th>Image</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Mrp</th>
                                        <th>SKU</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="show_pro" class="overflow-auto">
                                    @foreach ($data as $row)
                                 <tr>
                                <td>{{$row->product_name}}</td>
                                <td><textarea>{{$row->desc}}</textarea></td>
                                <td><textarea>{{$row->technical_specification}}</textarea></td>
                                <td> <img src ="{{ asset('admin_assets/product_images/'. $row->image1)}}"/> </td>
                                <td> <img src ="{{ asset('admin_assets/product_images/'. $row->image2)}}"/></td>
                                <td> <img src ="{{ asset('admin_assets/product_images/'. $row->image3)}}"/></td>
                                <td> <img src ="{{ asset('admin_assets/product_images/'. $row->image4)}}"/></td>
                                <td>{{$row->qty}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->mrp}}</td>
                                <td>{{$row->sku}}</td>
                                <td><a href="javascript:void(0)"  data-toggle="modal"  data-target="#Modal_Edit"  class="edit btn btn-success btn-lg  item d-inline-flex product2_edit" data-product_id="{{$row->product_id}}" data-product="{{$row->product_name}}"
                         data-desc="{{$row->desc}}"  data-technical_specification="{{$row->technical_specification}}" data-qty="{{$row->qty}}" data-price="{{$row->price}}" data-mrp="{{$row->mrp}}" data-sku="{{$row->sku}}"
                         data-image1="{{$row->image1}}" data-image2="{{$row->image2}}" data-image3="{{$row->image3}}" data-image4="{{$row->image4}}"  data-products_id="{{$row->products_id}}" >Edit</a></td>
                                 </tr>
                                @endforeach
                                
                               
                                    <tr class="spacer"></tr>

                                </tbody>
                                
                            </table>
                            <h6 id="pagination" class="pagination">
                                {{ $data->links() }}
                            </h6>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- MODAL EDIT -->
    <form id="editproduct2" name="productedit2" method="POST" action="javascript:void(0);" enctype="multipart/form-data">
        @csrf
        
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" data-backdrop="false"
            aria-labelledby="exampleModalLabel" aria-hidden="true" width="100%">
            <div class="modal-dialog modal-lg w-100" role="document">
                <div class="modal-content w-100">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                        <h6 id="success"></h6>
                        <button type="button" id="close_copo" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h6 id="responseeditcheck"></h6>
                    </div>
                    <div class="modal-body col-lg-12 w-100">
                        <div class="row col-lg-12">

                            <label class="form-label">product ID</label>
                            <div class="form-group col-2">
                                <input type="number" name="product_id_edit" id="product_id_edit" class="form-control"
                                    readonly>
                                <h6 id="product_id_editcheck"></h6>
                            </div>
                            <label class="form-label">Name</label>
                            <div class="form-group col-3">
                                <input type="text" name="product_name_edit" id="product_name_edit"
                                    class="form-control" placeholder="product Name" readonly>
                                <h6 id="product_name_editcheck"></h6>
                            </div>
                            <label for="cat_id" class="control-label mb-1">Price</label>
                            <div class="form-group col-3">
                                <input type="text" name="price_edit" id="price_edit"
                                class="form-control" placeholder="Price">
                                <h6 id="pricecheck"> </h6>
                            </div>

                        </div>
                        <div class="row col-lg-12 mt-3">

                            <label class="form-label"> Desc</label>
                            <div class="form-group col-5">
                                <textarea type="text" name="desc_edit" id="desc_edit" class="form-control" placeholder="desc"></textarea>
                                <h6 id="desc_editcheck"></h6>
                            </div>
                            <label class="form-label"> T . S</label>
                            <div class="form-group col-5">
                                <textarea type="text" name="ts_edit" id="ts_edit" class="form-control" placeholder="ts"></textarea>
                                <h6 id="ts_editcheck"></h6>
                            </div>
                           
                        </div>
                        <div class="row col-lg-12 mt-3"> 
                                           
                            <label for="Sku" class="control-label mb-1">SKU</label>
                            <div class="form-group col-3">
                                <input type="text" name="sku_edit" id="sku_edit" class="form-control" placeholder="Warranty">
                            </div>
                            <h6 id="sku_editcheck"></h6>
                           
                            <label class="form-label">Mrp</label>
                            <div class="form-group col-3">
                                <input type="text" name="mrp_edit" id="mrp_edit" class="form-control" placeholder="Mrp">
                                <h6 id="mrp_editcheck"></h6>
                            
                            </div>
                      </div>
                      <div class="row col-lg-12 mt-3"> 
                      <label class="form-label">QTY</label>
                      <div class="form-group col-2">
                        <input type="text" name="qty_edit" id="qty_edit" class="form-control" placeholder="QTY">
                          <h6 id="qty_editcheck"></h6>
                      </div>
                      
                      <label class="form-label">Products ID</label>
                      <div class="form-group col-4">
                          <input type="text" name="productsid_edit" id="productsid_edit" class="form-control" placeholder="Products id" readonly>
                          <h6 id="productsid_editcheck"></h6>
                      </div>
                      </div>
                      <div class="row col-lg-12 mt-3 justify-content-around"> 
                        <label for="image1_edit" class="form-label form-group col-2"><i
                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                        <div class="">
                            <input type="file" name="image1_edit" id="image1_edit" value="" class="form-control"  hidden>
                            
                            <h6 id="img1_editcheck"></h6>
                        </div>
                        <label for="image2_edit" class="form-label form-group col-2"><i
                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                        <div class="">
                            <input type="file" name="image2_edit" id="image2_edit" value="" class="form-control" hidden>
                            {{-- <img src ="{{ asset('admin_assets/product_images/'. $row->image2)}}"/>  --}}
                            <h6 id="img2_editcheck"></h6>
                        </div>
                        <label for="image3_edit" class="form-label form-group col-2"><i
                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                        <div class="">
                            <input type="file" name="image3_edit" id="image3_edit" value="" class="form-control" hidden>
                            {{-- <img src ="{{ asset('admin_assets/product_images/'. $row->image3)}}"/>  --}}
                            <h6 id="img3_editcheck"></h6>
                        </div>
                        <label for="image4_edit" class="form-label form-group col-2"><i
                            class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                        <div class="">
                            <input type="file" name="image4_edit" id="image4_edit" value="" class="form-control" hidden>
                            {{-- <img src ="{{ asset('admin_assets/product_images/'. $row->image4)}}"/>  --}}
                            <h6 id="img4_editcheck"></h6>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close_cop" data-backdrop="false" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
     
    </form>
    <!--END MODAL EDIT-->
    
</div>

@include('admin_component.footer')
<script type="text/javascript">
    $(function () {
        var page='';
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var url ='/admin/product/editproduct?page=' + page,
            // $(this).attr('href');
           data : window.history.pushState("", "", url);
            loadBooks(url);
        });

        function loadBooks(url) {
            $.ajax({
                url: url
            }).done(function (data) {
               var table = $('#show_pro').html(data);
                // table.ajax.reload(null, false);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });
</script>
