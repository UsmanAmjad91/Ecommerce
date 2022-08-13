@include('admin_component.header')
<title>{{ $title }}</title>
@section('banner', 'active')
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
                            <p>banner</p>
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
                                    href="{{ url('/admin/add_banner') }}"><span>banner List</span></a> </p>
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="table-data__tool-right">
                                <a href="{{ url('/admin/banner/add_banner') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi"></i>Add banner</button></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if (session()->has('msgbanner'))
                                    <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">
                                        {{ session()->get('msgbanner') }}</p>
                                @endif
                                <h6 id="responseeditcheck"></h6>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 datatable" id='studentsTable' width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th  class="col-2">banner image</th>
                                        <th  class="col-2">banner image</th>
                                        <th>buton text</th>
                                        <th>buton Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="showbanner_data">

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
    <form id="editbanner" name="editbanner" method="POST" action="javascript:void(0);" enctype="multipart/form-data">
        @csrf

        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" data-backdrop="false"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit banner</h5>
                        <h6 id="success"></h6>
                        <button type="button" id="close_banr" class="close_br" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h6 id="responseeditcheck"></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">banner ID</label>
                            <div class="col-md-10">
                                <input type="text" name="banner_id_edit" id="banner_id_edit" class="form-control"
                                    readonly>
                            </div>
                            <h6 id="banner_id_editcheck"></h6>
                        </div>

                        <div class="form-group row ml-4">
                            <label for="banner_image1" class="col-md-2 col-form-label"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                            <input type="file" id="banner_image1" name="banner_image1" hidden>
                            <img src=" " style="height:50px;" id="shoimg1" />
                            <h6 id="img1check"> </h6>
                           
                        </div>
                        <div class="form-group row ml-4">
                            <label for="banner_image" class="col-md-2 col-form-label"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                            <input type="file" id="banner_image" name="banner_image" hidden>
                            <img src=" " style="height:50px;" id="shoimg2" />
                            <h6 id="imgcheck"> </h6>
                           
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Button Text</label>
                            <div class="col-md-10">
                                <input type="text" name="button_text" id="button_text" class="form-control">
                            </div>
                            <h6 id="button_textcheck"></h6>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Button Link</label>
                            <div class="col-md-10">
                                <input type="text" name="button_link" id="button_link" class="form-control">
                            </div>
                            <h6 id="button_linkcheck"></h6>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">banner status</label>
                            <div class="col-md-8">
                                <select class="selectpicker form-control col-4" name="banner_status_edit"
                                    id="banner_status_edit">
                                    <option value="1">Status On</option>
                                    <option value="0">Status Off</option>
                                </select>
                            </div>
                            <h6 id="banner_status_editcheck"></h6>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group">
                                <label for="is_home" class="control-label mb-1 ml-3">Is Home Show</label>
                                <input type="checkbox" id="is_home" name="is_home" class="ml-3">
                             
                            </div>
                         </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closed_bannr" data-backdrop="false" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->
    <!--MODAL DELETE-->
    <form id="delbanner" name="delbanner" method="POST" action="javascript:void(0);">
        @csrf
        <div class="modal fade" id="Modal_Delete" data-backdrop="false" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" id="closed_bannerdel" class="close" data-dismiss="modal"
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
                        <input type="hidden" name="banner_id_delete" id="banner_id_delete" class="form-control">
                        <button type="button" id="closed_banner_del" class="btn btn-secondary"
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
            ajax: "{{ route('banner.list') }}",
            columns: [
                {
                    data: 'image1',
                    name: 'image1',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'btn_text'
                },
                {
                    data: 'btn_link'
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
