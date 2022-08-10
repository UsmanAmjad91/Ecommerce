@include('admin_component.header')
<title>{{ $title }}</title>
@section('product_attr', 'active')
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
                            <p>Product Attr</p>
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
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if (session()->has('msgproatt'))
                                    <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">
                                        {{ session()->get('msgproatt') }}</p>
                                @endif
                                <h6 id="responseeditcheck"></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-data2 datatable table-responsive table-lg" id='studentsTable'>
                                <thead>
                                    <tr>
                                       
                                        <th>Name Product</th>
                                        <th>Lead_time</th>
                                        <th>Tax</th>
                                        <th>Tax Type</th>
                                        <th>Promo</th>
                                        <th>Featured</th>
                                        <th>Discounted</th>
                                        <th>Tranding</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="show_dataattr" class="overflow-auto">

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
    <form id="editattr" name="editattr" method="POST" action="javascript:void(0);">
        @csrf

        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" data-backdrop="false"
            aria-labelledby="exampleModalLabel" aria-hidden="true" width="100%">
            <div class="modal-dialog modal-lg w-100" role="document">
                <div class="modal-content w-100">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                        <h6 id="success"></h6>
                        <button type="button" id="close_attr" class="close" data-dismiss="modal" aria-label="Close">
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
                            {{-- <label class="form-label">Name</label> --}}
                            <div class="form-group col-3">
                                <input type="hidden" name="product_name_edit" id="product_name_edit"
                                    class="form-control" placeholder="product Name" readonly>
                                <h6 id="product_name_editcheck"></h6>
                            </div>
                            <label for="lead_time" class="control-label mb-1">Lead time</label>
                              <div class="form-group col-3">
                               
                                            <input type="text" id="lead_time" name="lead_time"
                                                class="form-control">
                                            <h6 id="lead_timecheck"> </h6>
                               
                            </div>

                        </div>
                        <div class="row col-lg-12 mt-3 justify-content-between">
                            <div class="form-group">
                                <label for="tax" class="control-label mb-1">Tax</label>
                                <input type="text" id="tax" name="tax"
                                    class="form-control">
                                <h6 id="taxcheck"> </h6>
                            </div>
                            <div class="form-group">
                                <label for="tax_type" class="control-label mb-1">Tax type</label>
                                <input type="text" id="tax_type" name="tax_type"
                                    class="form-control">
                                <h6 id="tax_typecheck"> </h6>
                            </div>
                           
                        </div>
                        <div class="row col-lg-12 mt-3 justify-content-around">
                            <div class="form-group col-lg-4">
                                <label for="is_discounted" class="control-label">Discounted</label>
                                <select class="selectpicker form-control" name="is_discounted"
                                    id="is_discounted">
                                    <option value="" selected>Select</option>
                                    <option value="ON">Yes</option>
                                    <option value="OFF">No</option>
                                </select>
                                <h6 id="is_discountedcheck"> </h6>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="is_tranding" class="control-label">Tranding</label>
                                <select class="selectpicker form-control" name="is_tranding"
                                    id="is_tranding">
                                    <option value="" selected>Select</option>
                                    <option value="ON">Yes</option>
                                    <option value="OFF">No</option>
                                </select>
                                <h6 id="is_trandingcheck"> </h6>
                            </div>
                           
                        </div>
                        <div class="row col-lg-12 mt-3 justify-content-around">
                            <div class="form-group col-lg-4">
                                <label for="is_promo" class="control-label">Product Promo</label>
                                <select class="selectpicker form-control" name="is_promo"
                                    id="is_promo">
                                    <option value="" selected>Select</option>
                                    <option value="ON">Yes</option>
                                    <option value="OFF">No</option>
                                </select>
                                <h6 id="is_promocheck"> </h6>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="is_featured" class="control-label">Product Featured</label>
                                <select class="selectpicker form-control" name="is_featured"
                                    id="is_featured">
                                    <option value="" selected>Select</option>
                                    <option value="ON">Yes</option>
                                    <option value="OFF">No</option>
                                </select>
                                <h6 id="is_featuredcheck"> </h6>
                            </div>
                           
                        </div>
                       
                     
                    <div class="modal-footer">
                        <button type="button" id="close_att" data-backdrop="false" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->
   
    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')

<script type="text/javascript">
    $(document).ready(function() {
        //     return false;
        $('#studentsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.atrr_list') }}",
            columns: [
               
                {
                    data: 'product_name'
                },
                {
                    data: 'lead_time'
                },
                {
                    data: 'tax'
                },
                {
                    data: 'tax_type'
                },
                {
                    data: 'is_promo'
                },
                {
                    data: 'is_featured'
                },
                {
                    data: 'is_discounted'
                },
                {
                    data: 'is_tranding'
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

</script>
