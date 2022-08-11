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
                    <form class="form-header" action="" method="POST">

                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <p>Add product</p>
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
                <a href="{{ url('/admin/dashboard') }}"><span>Dashboard</span></a> <span> > </span> <a
                    href="{{ url('/admin/product') }}"><span>productList</span></a> <span> > </span> <a
                    href="{{ url('/admin/product/add_product') }}"><span>Add product</span></a>

                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-success mt-3"><a href="{{ url('/admin/product') }}"
                                style="color: white;">Back</a></button>
                    </div>
                    <form class="addproduct col-lg-12" id="addproduct" name="addproduct" method="POST"
                    action="javascript:void(0);" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-5">
                       
                        <div class="card">
                            <div class="card-header">Add product</div>
                            <div class="card-body">
                               
                                    <h6 id="responsecheck"> </h6>
                                    <div class="col-lg-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="form-group col-3">
                                                <label for="cat_id" class="control-label mb-1">Category</label>
                                                <select class="selectpicker form-control category" id="cat_id"
                                                    name="cat_id">
                                                    <option value="" selected>Select</option>

                                                    @foreach ($category as $row)
                                                        <option value="{{ $row->cat_id }}">{{ $row->cat_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <h6 id="catidcheck"> </h6>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="year_id" class="control-label mb-1">Model Year</label>
                                                <select class="selectpicker form-control" id="year_id" name="year_id">
                                                    <option value="" selected>Select</option>
                                                    @foreach ($myear as $row)
                                                        <option value="{{ $row->model_id }}">{{ $row->year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <h6 id="yearidcheck"> </h6>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for="coupon_id" class="control-label mb-1">Coupon</label>
                                                <select class="selectpicker form-control" id="coupon_id"
                                                    name="coupon_id">
                                                    <option value="" selected>Select</option>
                                                    @foreach ($coupon as $row)
                                                        <option value="{{ $row->coupon_id }}">{{ $row->coupon_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <h6 id="couponidcheck"> </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="form-group">
                                                <label for="product" class="control-label mb-1">Product</label>
                                                <input type="text" id="product" name="product"
                                                    class="form-control">
                                                <h6 id="productcheck"> </h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_slug" class="control-label mb-1">Product
                                                    Slug</label>
                                                <input type="text" id="product_slug" name="product_slug"
                                                    class="form-control">
                                                <h6 id="productslugcheck"> </h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="brand_id" class="control-label mb-1">Brand</label>
                                                <select class="selectpicker form-control" id="brand_id"
                                                    name="brand_id">
                                                    <option value="" selected>Select</option>
                                                    @foreach ($brand as $row)
                                                        <option value="{{ $row->brand_id }}">{{ $row->brand }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <h6 id="brandidcheck"> </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                                <input type="text" id="warranty" name="warranty"
                                                    class="form-control">
                                                <h6 id="warrantycheck"> </h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1">Uses</label>
                                                <input type="text" id="uses" name="uses"
                                                    class="form-control">
                                                <h6 id="usescheck"> </h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1">Keywords</label>
                                                <input type="text" id="keyword" name="keyword"
                                                    class="form-control">
                                                <h6 id="keywordcheck"> </h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short
                                                    Description</label>
                                                <input type="text" id="short_desc" name="short_desc"
                                                    class="form-control">
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
                                                <label for="technical_specification"
                                                    class="control-label mb-1">Technical specification</label>
                                                <textarea type="text" id="technical_specification" name="technical_specification" class="form-control"></textarea>
                                                <h6 id="technical_specificationcheck"> </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row d-flex justify-content-between">
                                            <div class="form-group col-1">
                                                <label for="image1" class="control-label mb-1"><i
                                                        class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                <input type="file" id="image1" name="image1" hidden>
                                                <h6 id="img1check"> </h6>
                                            </div>
                                            <div class="form-group col-1">
                                                <label for="image2" class="control-label mb-1"><i
                                                        class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                <input type="file" id="image2" name="image2" hidden>
                                                <h6 id="img2check"> </h6>
                                            </div>
                                            <div class="form-group col-1">
                                                <label for="image3" class="control-label mb-1"><i
                                                        class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                <input type="file" id="image3" name="image3" hidden>
                                                <h6 id="img3check"> </h6>
                                            </div>
                                            <div class="form-group col-1">
                                                <label for="image4" class="control-label mb-1"><i
                                                        class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                                <input type="file" id="image4" name="image4" hidden>
                                                <h6 id="img4check"> </h6>
                                            </div>

                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="product_status" class="control-label">Product Status</label>
                                        <select class="selectpicker form-control" name="product_status"
                                            id="product_status">
                                            <option value="" selected>Select</option>
                                            <option value="1">Status On</option>
                                            <option value="0">Status Off</option>
                                        </select>
                                        <h6 id="productstatuscheck"> </h6>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for="is_promo" class="control-label">Product Promo</label>
                                        <select class="selectpicker form-control" name="is_promo"
                                            id="is_promo">
                                            <option value="" selected>Select</option>
                                            <option value="ON">Yes</option>
                                            <option value="OFF">No</option>
                                        </select>
                                        <h6 id="is_promocheck"> </h6>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for="is_featured" class="control-label">Product Featured</label>
                                        <select class="selectpicker form-control" name="is_featured"
                                            id="is_featured">
                                            <option value="" selected>Select</option>
                                            <option value="ON">Yes</option>
                                            <option value="OFF">No</option>
                                        </select>
                                        <h6 id="is_featuredcheck"> </h6>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for="is_discounted" class="control-label">Discounted</label>
                                        <select class="selectpicker form-control" name="is_discounted"
                                            id="is_discounted">
                                            <option value="" selected>Select</option>
                                            <option value="ON">Yes</option>
                                            <option value="OFF">No</option>
                                        </select>
                                        <h6 id="is_discountedcheck"> </h6>
                                    </div>
                                    <div class="form-group col-lg-3">
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
                                <div class="col-lg-12">
                                    <div class="row d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="lead_time" class="control-label mb-1">Lead time</label>
                                            <input type="text" id="lead_time" name="lead_time"
                                                class="form-control">
                                            <h6 id="lead_timecheck"> </h6>
                                        </div>
                                        {{-- <div class="form-group col-lg-4">
                                            <label for="tax" class="control-label mb-1">Tax</label>
                                            <input type="text" id="tax" name="tax" class="form-control">
                                            <select class="selectpicker form-control"  id="tax" name="tax" >
                                                <option value="" selected>Select</option>
                                               
                                            </select>
                                            <h6 id="taxcheck"> </h6>
                                        </div> --}}
                                        <div class="form-group col-lg-4">
                                            <label for="tax_type" class="control-label mb-1">Tax</label>
                                            {{-- <input type="text" id="tax_type" name="tax_type" class="form-control"> --}}
                                                <select class="selectpicker form-control"  id="tax_type" name="tax_type">
                                            <option value="" selected>Select</option>
                                           
                                        </select>
                                            <h6 id="tax_typecheck"> </h6>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2" id="product_attr_box">
                        <h1>Attributes Product</h1>
                        <div class="card">
                            <div class="card-header" id="fieldchk"></div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="row d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="sku" class="control-label mb-1">Sku</label>
                                            <input type="number" id="sku" name="sku[]" class="form-control">
                                            <h6 id="skucheck"> </h6>
                                        </div>
                                        <div class="form-group">
                                            <label for="mrp" class="control-label mb-1">Mrp</label>
                                            <input type="text" id="mrp" name="mrp[]"
                                                class="form-control">
                                            <h6 id="mrpcheck"> </h6>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input type="text" id="price" name="price[]"
                                                class="form-control">
                                            <h6 id="pricecheck"> </h6>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select class="selectpicker form-control color" id="color_id"
                                                name="color_id[]">
                                                <option value="" selected>Select</option>
                                                @foreach ($color as $row)
                                                    <option value="{{ $row->color_id }}">{{ $row->color }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <h6 id="coloridcheck"> </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-3">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                            <select class="selectpicker form-control size" id="size_id"
                                                name="size_id[]">
                                                <option value="" selected>Select</option>
                                                @foreach ($size as $row)
                                                    <option value="{{ $row->size_id }}">{{ $row->size }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <h6 id="sizeidcheck"> </h6>
                                        </div>
                                        <div class="form-group">
                                            <label for="imageatrr" class="control-label mb-1 mt-4"><i
                                                    class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label>
                                            <input type="file" id="imageatrr" name="imageatrr[]" hidden>
                                            <h6 id="imgatrrcheck"> </h6>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="Product_qty" class="control-label mb-1">Product Qty</label>
                                            <input type="number" id="qty" name="qty[]"
                                                class="form-control">
                                            <h6 id="productqtycheck"> </h6>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="button" class="btn btn-lg btn-success" id="onclick">Add More</button>
                                        </div>
                                    </div>
                                </div>


                               

                            </div>
                        </div>
                    </div>
                    
                        <div class="row col-lg-12 text-center">
                            <div class="col-lg-3 text-center">
                            </div>
                            <div class="col-lg-5 text-center mt-4">
                                <button type="submit" id="addproduct" name="addproduct"
                                    class="btn btn-lg btn-info btn-block  d-flex justify-content-center">Add
                                    product</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

@include('admin_component.footer')
<script>
$(document).ready(function() {
    var count =1;
       $('#onclick').click(function () { 
      count++;
        var color_id_html = $('.color').html();
        var size_id_html = $('.size').html();
        var html = '';
        html += '<div class="card" id="product_attr_'+count+'"><div class="card-body"><div class="col-lg-12">' +
            '<div class="row d-flex justify-content-between">' +
            '<div class="form-group"><label for="sku" class="control-label mb-1">Sku</label><input type="number" id="sku'+count+'" name="sku'+count+'[]" class="form-control"><h6 id="skucheck"> </h6></div>' +
            '<div class="form-group"><label for="mrp" class="control-label mb-1">Mrp</label><input type="text" id="mrp'+count+'" name="mrp'+count+'[]"class="form-control"><h6 id="mrpcheck"> </h6></div>' +
            '<div class="form-group"> <label for="price" class="control-label mb-1">Price</label><input type="text" id="price'+count+'" name="price'+count+'[]" class="form-control"><h6 id="pricecheck"> </h6></div>' +
            '<div class="form-group col-3"><label for="color_id" class="control-label mb-1">Color</label><select class="selectpicker form-control color" id="color_id'+count+'" name="color_id'+count+'[]">' +
            color_id_html +
            '</select><h6 id="coloridcheck"> </h6></div>' +
            '</div></div>' +
            '<div class="col-lg-12"><div class="row d-flex justify-content-around">' +
            '<div class="form-group col-3"> <label for="size_id" class="control-label mb-1">Size</label><select class="selectpicker form-control size" id="size_id'+count+'" name="size_id'+count+'[]">' +
            size_id_html +
            '</select><h6 id="sizeidcheck"> </h6></div>' +
            ' <div class="form-group"><label for="imageatrr" class="control-label mb-1 mt-4"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></label> <input type="file" id="imageatrr'+count+'" name="imageatrr'+count+'[]" hidden><h6 id="imgatrrcheck"> </h6></div> ' +
            ' <div class="form-group col-3"><label for="Product_qty" class="control-label mb-1">Product Qty</label><input type="number" id="qty'+count+'" name="qty'+count+'[]" class="form-control"> <h6 id="productqtycheck"> </h6></div>' +
            '<div class="form-group mt-3"> <button type="button" class="btn btn-lg btn-danger"onclick="remove_atrr('+count+')">Remove</button></div>' +
            '</div></div>' +

            '</div></div>';
            if(($('#qty').val() != '') && ($('#imageatrr').val() != '') && ($('#price').val() != '') && ($('#mrp').val() != '') && ($('#sku').val() != '')){
        $('#product_attr_box').append(html);
            }else{
                $("#fieldchk").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#fieldchk").html('** Please Fill All Fields').css("color", "red");
            }
    });
});
    function remove_atrr(count){
$('#product_attr_'+ count).remove();
    }

    CKEDITOR.replace('desc');
    CKEDITOR.replace('technical_specification');
</script>
<script>
$(document).ready(function(){
show_tax();
function show_tax() {
    $.ajax({
        url: "/admin/tax/get_tax",
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        contentType: false,
        processData: false,
    success: function(html) {
        var items = html;

        // console.log(html);
        var i;
        var html = '';
        var tax = '';
        for (i = 0; i < items.length; i++) {   
          html += '<option value="'+ items[i].tax_id + '">' +
           '<td>' + items[i].tax_desc + " "+  items[i].tax_value + '</td>' +
            '</option>';
            // tax += '<option value="'+ items[i].tax_id + '">' +
            // '<td>' + items[i].tax_value + '</td>' +
            //  '</option>';
        }
      $('#tax_type').append(html);
    //   $('#tax').append(tax);
    //   console.log(html);
    }

  });
}
});

</script>