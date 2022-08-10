@include('admin_component.header')
<title>{{ $title }}</title>
@section('category_select', 'active')
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
                            <p>Category</p>
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
                                    href="{{ url('/admin/category') }}"><span>Category List</span></a> </p>
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="table-data__tool-right">
                                <a href="{{ url('/admin/category/add_category') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi"></i>Add Category</button></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if (session()->has('message'))
                                    <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">
                                        {{ session()->get('message') }}</p>
                                @endif
                                <h6 id="responseeditcheck"></h6>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 datatable" id='studentsTable' width="100%">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Name Category</th>
                                        <th>Slug Category</th>
                                        <th>Image Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="shows_data">

                                    <tr class="spacer"></tr>

                                </tbody>
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
    <form id="editpro" name="editpro" method="POST" action="javascript:void(0);">
        @csrf

        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" data-backdrop="false"
            aria-labelledby="exampleModalLabel" aria-hidden="true" width="100%">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <h6 id="success"></h6>
                        <button type="button" class="close" id="close_cat" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h6 id="responseeditcheck"></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Category ID</label>
                            <div class="col-md-6">
                                <input type="text" name="cat_id_edit" id="cat_id_edit" class="form-control" readonly>
                            </div>
                            <h6 id="cat_id_editcheck"></h6>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Category Name</label>
                            <div class="col-md-6">
                                <input type="text" name="cat_name_edit" id="cat_name_edit" class="form-control"
                                    placeholder="Category Name">
                            </div>
                            <h6 id="cat_name_editcheck"></h6>
                        </div>
                        <div class="form-group row">
                            <label for="cat_parent_id" class="col-lg-4 col-form-label">Category Parent Name</label>
                            <div class="col-md-4">
                                <select class="selectpicker form-control" name="cat_parent_id" id="cat_parent_id">
                                    <option value="" selected>Select</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Category Slug</label>
                            <div class="col-md-6">
                                <input type="text" name="cat_slug_edit" id="cat_slug_edit" class="form-control"
                                    placeholder="Category Slug">
                            </div>
                            <h6 id="cat_slug_editcheck"></h6>
                        </div>
                        <div class="form-group row justify-content-around">
                            <label class="col-md-2 col-form-label">Category status</label>

                            <select class="selectpicker form-control col-2" name="cat_status_edit"
                                id="cat_status_edit">
                                <option value="1">Status On</option>
                                <option value="0">Status Off</option>
                            </select>

                            <h6 id="cat_status_editcheck"></h6>
                            <div class="form-group col-3">
                                <label for="cat_image" class="control-label mb-1"><i class="fa fa-picture-o fa-3x"
                                        aria-hidden="true"></i></label>
                                <input type="file" id="cat_image" name="cat_image" hidden>
                                <h6 id="imgcheck"> </h6>
                                <img src=" " id="catim" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->
    <!--MODAL DELETE-->
    <form id="delpro" name="delpro" method="POST" action="javascript:void(0);">
        @csrf
        <div class="modal fade" id="Modal_Delete" data-backdrop="false" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" id="closed" class="close" data-dismiss="modal"
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
                        <input type="hidden" name="cat_id_delete" id="cat_id_delete" class="form-control">
                        <button type="button" id="closed_cat" class="btn btn-secondary"
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
        // DataTable
        $('#studentsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('category.list') }}",
            columns: [{
                    data: 'cat_id'
                },
                {
                    data: 'cat_name'
                },
                {
                    data: 'cat_slug'
                },
                { data: 'image' },
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
<script>
    $.ajax({
        url: "/admin/category/cat_list",
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            var html = '';
            for (i = 0; i < data.length; i++) {
                html += '<option value="' + data[i].cat_id + '">' + data[i].cat_name + '</option>'
            }
            // console.log(html);
            $('#cat_parent_id').append(html);
        }
    });
</script>
