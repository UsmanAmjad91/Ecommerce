@include('admin_component.header')
<title>{{ $title }}</title>
@section('product_select', 'active')
@include('admin_component.sidebar')

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

                            <div class="table-data__tool-right">
                                <a href="{{ url('/admin/product/add_product') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi"></i>Add product</button></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if (session()->has('msgpro'))
                                    <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">
                                        {{ session()->get('msgpro') }}</p>
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
                                        {{-- <th>Product Coupon</th> --}}
                                        <th>Product Category</th>
                                        {{-- <th>Product Color</th> --}}
                                        <th>Product Brand</th>
                                        {{-- <th>Product Size</th> --}}
                                        <th>Product Model</th>
                                        <th>Product Slug</th>
                                        <th>Keyword</th>
                                        <th>warranty</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data" class="overflow-auto">

                                    <tr class="spacer"></tr>

                                </tbody>
                                <div id="pagination" class="pagination"></div>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- MODAL EDIT -->
    <form id="editproduct" name="productedit" method="POST" action="javascript:void(0);">
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
                                    class="form-control" placeholder="product Name">
                                <h6 id="product_name_editcheck"></h6>
                            </div>
                            <label for="cat_id" class="control-label mb-1">Category</label>
                            <div class="form-group col-3">
                                <select class="selectpicker form-control category" id="cat_id" name="cat_id">
                                   <option value="">Select</option>

                                </select>
                                <h6 id="catideditcheck"> </h6>
                            </div>

                        </div>
                        <div class="row col-lg-12 mt-3">

                            <label class="form-label"> Brand</label>
                            <div class="form-group col-3">
                                <select class="selectpicker form-control brand" id="brand_id" name="brand_id">
                                    
                                </select>
                                <h6 id="product_brand_editcheck"></h6>
                            </div>
                            <label class="form-label"> Model</label>
                            <div class="form-group col-2">
                                <select class="selectpicker form-control year" id="year_id" name="year_id">     
                              
                                </select>
                                <h6 id="product_year_editcheck"></h6>
                            </div>
                            <label for="slug" class="control-label mb-1">Slug</label>
                            <div class="form-group col-4">
                                    <input type="text" value="" name="slug_edit" id="slug_edit" class="form-control" placeholder="product Slug">
                            </div>
                            <h6 id="slug_editcheck"> </h6>
                        </div>
                        <div class="row col-lg-12 mt-3"> 
                       
                            <label for="keyword"  class="control-label mb-1">Keywords</label>
                            <div class="form-group col-3">
                                <input type="text" name="keyword_edit" id="keyword_edit"
                                    class="form-control" placeholder="product keyword">
                            </div>
                            <h6 id="keyword_editcheck"></h6>
                        
                    
                            <label for="warranty" class="control-label mb-1">Warranty</label>
                            <div class="form-group col-3">
                                <input type="text" name="warranty_edit" id="warranty_edit"
                                    class="form-control" placeholder="Warranty">
                            </div>
                            <h6 id="warranty_editcheck"></h6>
                           
                            <label class="form-label">Color</label>
                            <div class="form-group col-2">
                                <select class="selectpicker form-control color" id="color_id" name="color_id">     
                               
                                </select>
                                <h6 id="color_editcheck"></h6>
                            
                            </div>
                      </div>
                      <div class="row col-lg-12 mt-3">
                      <label for="status" class="control-label mb-1">status</label>
                      <div class="form-group col-3">
                          <select class="selectpicker form-control col-12" name="status_edit" id="status_edit">
                              <option value="1">Status On</option>
                              <option value="0">Status Off</option>
                          </select>
                      </div>
                      <h6 id="status_editcheck"></h6>
                      
                      <label class="form-label">Size</label>
                      <div class="form-group col-2">
                          <select class="selectpicker form-control size" id="size_id" name="size_id">     
                          
                          </select>
                          <h6 id="size_editcheck"></h6>
                      </div>
                      <label class="form-label">Coupon</label>
                      <div class="form-group col-3">
                          <select class="selectpicker form-control coupon" id="coupon_id" name="coupon_id">   
                            <option value="">Select</option>  
                          </select>
                          <h6 id="size_editcheck"></h6>
                      </div>
                   
                      </div>
                      <div class="row col-lg-12 mt-3">
                        <label class="form-label">Uses</label>
                        <div class="form-group col-4">
                            <input type="text" name="uses_edit" id="uses_edit" class="form-control" placeholder="Uses">
                            <h6 id="uses_editcheck"></h6>
                        </div>

                        <label class="form-label">Short_Desc</label>
                        <div class="form-group col-4">
                            <input type="text" name="shortdesc" id="shortdesc" class="form-control" placeholder="Short desc">
                            <h6 id="shortdesc_editcheck"></h6>
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
    <!--MODAL DELETE-->
    <form id="delproduct" name="delproduct" method="POST" action="javascript:void(0);">
        @csrf
        <div class="modal fade" id="Modal_Delete" data-backdrop="false" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" id="closed_copdel" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <h6 id="responseeditcheck"></h6>
                        </div>
                        <strong>Are you sure to delete this record?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_id_delete" id="product_id_delete" class="form-control">
                        <button type="button" id="closed_cop_del" class="btn btn-secondary"
                            data-dismiss="modal">No</button>
                        <button type="submit" id="btn_delete" name="btn_delete"
                            class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')

<script type="text/javascript">
    $(document).ready(function() {
        //     return false;
        $('#studentsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.list') }}",
            columns: [
               
                {
                    data: 'product_name'
                },
               
                {
                    data: 'cat_name'
                },
                
                {
                    data: 'brand'
                },
                
                {
                    data: 'year'
                },
                {
                    data: 'product_slug'
                },
                
                {
                    data: 'keywords'
                },
                {
                    data: 'warranty'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]

        });
        var table = $('#studentsTable').DataTable();
        table.ajax.reload(null, false);
    });


    {{-- //  shift+alt+f --}}
</script>
