@include('admin_component.header')
<title>{{ $title }}</title>
@section('year_select','active')
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
                 <p>year</p>
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                       
                        <div class="table-data__tool">
                            <p><a href="{{url('/admin/dashboard')}}">Dashboard</a> <span> > </span> <a href="{{url('/admin/year')}}"><span>year List</span></a> </p>
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                           
                            <div class="table-data__tool-right">
                                <a href="{{url('/admin/year/add_year')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi"></i>Add year</button></a>           
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12 text-center">
                        @if (session()->has('msgyear'))
                        <p class="ml-3 text-sm font-bold text-green-600" id="catmsg">{{ session()->get('msgyear') }}</p>
                        @endif
                        <h6 id="responseeditcheck"></h6>
                          </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 datatable" id='studentsTable' width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-2">year ID</th>
                                        <th class="col-2">year</th>
                                        <th class="col-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data" >
                                   
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
  <form id="edityear" name="edityear" method="POST" action="javascript:void(0);">
    @csrf
    
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit year</h5>
            <h6 id="success"></h6>
            <button type="button" id="close_yr" class="close_yr" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div class="col-2"></div><div class="col-8"><h6 id="responseeditcheck"></h6></div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">year ID</label>
              <div class="col-md-10">
                <input type="text" name="year_id_edit" id="year_id_edit" class="form-control" readonly>
              </div>
              <h6 id="year_id_editcheck"></h6>
            </div>
            
            <div class="form-group row">
              <label class="col-md-2 col-form-label">year Name</label>
              <div class="col-md-10">
                
                    <input type="text" name="year_edit" id="year_edit" class="form-control">
                 
              </div>
              <h6 id="year_editcheck"></h6>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">year status</label>
                <div class="col-md-8">
                    <select class="selectpicker form-control col-4" name="year_status_edit" id="year_status_edit">
                        <option value="1">Status On</option>
                        <option value="0">Status Off</option>
                      </select>
                </div>
                <h6 id="year_status_editcheck"></h6>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="closed_year" data-backdrop="false" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  type="submit" id="btn_update" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--END MODAL EDIT-->
  <!--MODAL DELETE-->
  <form id="delyear" name="delyear" method="POST" action="javascript:void(0);">
    @csrf
    <div class="modal fade" id="Modal_Delete" data-backdrop="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" id="closed_yeardel" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-2"></div><div class="col-8"><h6 id="responseeditcheck"></h6></div>
            <strong>Are you sure to delete this record?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="year_id_delete" id="year_id_delete" class="form-control">
            <button type="button" id="closed_year_del" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button  type="submit" id="btn_delete" name="btn_delete" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')

<script type="text/javascript">
    $(document).ready(function(){
      // DataTable
     $('#studentsTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('year.list')}}",
         columns: [
            { data: 'model_id' },
            { data: 'year' },
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },   
         ]
         
         });
      var table= $('#studentsTable').DataTable();
            table.ajax.reload(null, false);
          });
    </script>
