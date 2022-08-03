
/// Status product Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.product_status_ac', function() {
        var id = $(this).data('product_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/product/status_active/" + id,
               type: 'post',
               data: {id:id},
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               dataType: 'json',
               contentType: false,
               processData: false,
               success: function(msg) {    
                if (msg.status == 200) {                    
                    $("#responseeditcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.message).css("color", "green");  
                   var table= $('#studentsTable').DataTable();
                    table.ajax.reload(null, false);
                } else{    
                if (msg.error) {  
                    $("#responseeditcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.error).css("color", "red");
                } else {
                    $('#responseeditcheck').hide();
                }
                
                }
               }
           });
        }   
    });
    ///  Deactive To Active  ///
    $('#show_data').on('click', '.product_status_de', function() {
        var id = $(this).data('product_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/product/status_deactive/" + id,
               type: 'post',
               data: {id:id},
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               dataType: 'json',
               contentType: false,
               processData: false,
               success: function(msg) {    
                if (msg.status == 200) {                    
                    $("#responseeditcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.message).css("color", "green");  
                   var table= $('#studentsTable').DataTable();
                    table.ajax.reload(null, false);
                } else{    
                if (msg.error) {  
                    $("#responseeditcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.error).css("color", "red");
                } else {
                    $('#responseeditcheck').hide();
                }
                
                }
               }
           });
        }   
    });
});

$(document).ready(function() {
    /// Delete Record product ///
    $("#show_data").on('click','.product_delete',function () { 
        
     var product_id = $(this).data('product_id');
     $('#Modal_Delete').modal('show');
    $('[name="product_id_delete"]').val(product_id);
    });

    $("#delproduct").submit(function(e) {
     e.preventDefault();
    var  id = $('#product_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#product_id_delete').val();
    $.ajax({
        url: "/admin/product/delete/" + id,
        type: 'post',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(msg) {    
         if (msg.status == 200) {                    
             $("#responseeditcheck").show().delay(8000).queue(function(n) {
                 $(this).hide(); n();
               });
               $('#responseeditcheck').html(msg.message).css("color", "green"); 
               $('#Modal_Delete').modal('hide');  
            var table= $('#studentsTable').DataTable();
             table.ajax.reload(null, false);
         } else{    
         if (msg.error) {  
             console.log(msg.error); 
             $("#responseeditcheck").show().delay(8000).queue(function(n) {
                 $(this).hide(); n();
               });
               $('#responseeditcheck').html(msg.error).css("color", "red");
         } else {
             $('#responseeditcheck').hide();
         }
         
         }
        }
    });
 }
     
 }); 
 ///product Delete Model ///
$("#closed_productdel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_product_del").click(function () {
    $('#Modal_Delete').modal('hide');   
});

 });

 /// ADD product  ///
$(document).ready(function() {
    $("#addproduct").submit(function(e) {
        e.preventDefault();
        var cat_id = $('#cat_id').val();
        if ((cat_id.length == "") || (cat_id.length == null)) {  
            $("#catidcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#catidcheck").html('** Please Select Category ').css("color", "red");
            $('#catidcheck').focus();
        }else{
            $('#catidcheck').hide();
        } 
        // var color_id = [];
        // $.each($("#color_id option:selected"), function(){
        //     color_id.push($(this).val());
        // }); 
        // var color_id = $('#color_id').val();
        // if ((color_id.length == "") || (color_id.length == null)) {  
        //     $("#coloridcheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#coloridcheck").html('** Please Select Color ').css("color", "red");
        //     $('#coloridcheck').focus();
        // }else{
        //     $('#coloridcheck').hide();
        // }  
        var coupon_id = $('#coupon_id').val();
        // if ((coupon_id.length == "") || (coupon_id.length == null)) {  
        //     $("#couponidcheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#couponidcheck").html('** Please Select Coupon ').css("color", "red");
        //     $('#couponidcheck').focus();
        // }else{
        //     $('#couponidcheck').hide();
        // } 
        // var size_id = [];
        // $.each($("#size_id option:selected"), function(){
        //     size_id.push($(this).val());
        // });  
        // var size_id = $('#size_id').val();
        // if ((size_id.length == "") || (size_id.length == null)) {  
        //     $("#sizeidcheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#sizeidcheck").html('** Please Select Size ').css("color", "red");
        //     $('#sizeidcheck').focus();
        // }else{
        //     $('#sizeidcheck').hide();
        // }  
        var product_slug = $('#product_slug').val();
        if ((product_slug.length == "") || (product_slug.length == null)) {  
            $("#productslugcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productslugcheck").html('** Please fill Product Slug ').css("color", "red");
            $('#productslugcheck').focus();
        }else{
            $('#productslugcheck').hide();
        } 

        var product = $('#product').val();
        if ((product.length == "") || (product.length == null)) {  
            $("#productcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productcheck").html('** Please fill product Field').css("color", "red");
            $('#productcheck').focus();
        }else{
            $('#productcheck').hide();
        }  
        var brand_id = $('#brand_id').val();
        if ((brand_id.length == "") || (brand_id.length == null)) {  
            $("#brandidcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brandidcheck").html('** Please Select Brand ').css("color", "red");
            $('#brandidcheck').focus();
        }else{
            $('#brandidcheck').hide();
        } 
        var year_id = $('#year_id').val();
        if ((year_id.length == "") || (year_id.length == null)) {  
            $("#yearidcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#yearidcheck").html('** Please Select Year ').css("color", "red");
            $('#yearidcheck').focus();
        }else{
            $('#yearidcheck').hide();
        } 
        var warranty = $('#warranty').val();
        if ((warranty.length == "") || (warranty.length == null)) {  
            $("#warrantycheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#warrantycheck").html('** Please Enter warranty ').css("color", "red");
            $('#warrantycheck').focus();
        }else{
            $('#warrantycheck').hide();
        } 
        var uses = $('#uses').val();
        if ((uses.length == "") || (uses.length == null)) {  
            $("#usescheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#usescheck").html('** Please Enter Uses ').css("color", "red");
            $('#usescheck').focus();
        }else{
            $('#usescheck').hide();
        }
        var keyword = $('#keyword').val();
        if ((keyword.length == "") || (keyword.length == null)) {  
            $("#keywordcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#keywordcheck").html('** Please Enter Keywords ').css("color", "red");
            $('#keywordcheck').focus();
        }else{
            $('#keywordcheck').hide();
        } 
        var short_desc = $('#short_desc').val();
        if ((short_desc.length == "") || (short_desc.length == null)) {  
            $("#shortdesccheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#shortdesccheck").html('** Please Enter Short Description ').css("color", "red");
            $('#shortdesccheck').focus();
        }else{
            $('#shortdesccheck').hide();
        } 

       var desc = $('#desc').val();
      
        // if ((desc.length == "") || (desc.length == null)) {  
        //     $("#desccheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#desccheck").html('** Please Enter  Description ').css("color", "red");
        //     $('#desccheck').focus();
        // }else{
        //     $('#desccheck').hide();
        // } 
        var technical_specification = $('#technical_specification').val();
        // if ((technical_specification.length == "") || (technical_specification.length == null)) {  
        //     $("#technical_specificationcheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#technical_specificationcheck").html('** Please Enter  Technical Specificationcheck ').css("color", "red");
        //     $('#technical_specificationcheck').focus();
        // }else{
        //     $('#technical_specificationcheck').hide();
        // } 
        var image1 = $('#image1').val();
        if ((image1.length == "") || (image1.length == null)) {  
            $("#img1check").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img1check").html('** Please Enter  Select Image').css("color", "red");
            $('#img1check').focus();
        }else{
            $('#img1check').hide();
        }
        var image2 = $('#image2').val();
        if ((image2.length == "") || (image2.length == null)) {  
            $("#img2check").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img2check").html('** Please Enter  Select Image').css("color", "red");
            $('#img2check').focus();
        }else{
            $('#img2check').hide();
        }
        var image3 = $('#image3').val();
        if ((image3.length == "") || (image3.length == null)) {  
            $("#img3check").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img3check").html('** Please Enter  Select Image').css("color", "red");
            $('#img3check').focus();
        }else{
            $('#img3check').hide();
        }
        var image4 = $('#image4').val();
        if ((image4.length == "") || (image4.length == null)) {  
            $("#img4check").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img4check").html('** Please Enter Select Image').css("color", "red");
            $('#img4check').focus();
        }else{
            $('#img4check').hide();
        }
        var product_status = $('#product_status').val();
        if (product_status.length == "") {    
            $("#productstatuscheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productstatuscheck").html('** Please Select product Status').css("color", "red");
            $('#productstatuscheck').focus();
        } else {
            $('#productstatuscheck').hide();
        } 
        // var sku = [];
        // $.each($("#sku"), function(){
        //     sku.push($(this).val());
        // });   
        var sku = $('#sku').val();
        if (sku.length == "") {    
            $("#skucheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#skucheck").html('** Please Select product SKU').css("color", "red");
            $('#skucheck').focus();
        } else {
            $('#skucheck').hide();
        }  
        
        // var mrp = [];
        // $.each($("#mrp"), function(){
        //     mrp.push($(this).val());
        // });
        var mrp = $('#mrp').val();
        if (mrp.length == "") {    
            $("#mrpcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#mrpcheck").html('** Please Select product MRP').css("color", "red");
            $('#mrpcheck').focus();
        } else {
            $('#mrpcheck').hide();
        } 

        // var price = [];
        // $.each($("#price"), function(){
        //     price.push($(this).val());
        // });
        var price = $('#price').val();
        if (price.length == "") {    
            $("#pricecheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#pricecheck").html('** Please Select product Price').css("color", "red");
            $('#pricecheck').focus();
        } else {
            $('#pricecheck').hide();
        }  
          
        
        var imageatrr = $('#imageatrr').val();
        if (imageatrr.length == "") {    
            $("#imageatrrcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#imageatrrcheck").html('** Please Select product Image Atrr').css("color", "red");
            $('#imageatrrcheck').focus();
        } else {
            $('#imageatrrcheck').hide();
        }    

        // var qty = [];
        // $.each($("#qty"), function(){
        //     qty.push($(this).val());
        // });
        var qty = $('#qty').val();
        if (qty.length == "") {    
            $("#productqtycheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productqtycheck").html('** Please Select product Quantity').css("color", "red");
            $('#productqtycheck').focus();
        } else {
            $('#productqtycheck').hide();
        }  
       
        // return false;
        if ((qty != '') && (imageatrr != '') && (price != '') && (mrp != '') && (sku != '') && (product != '') && (product_status != '') && (cat_id != '')   && (product_slug != '') && (brand_id != '') && (year_id != '') && (warranty != '') && (uses != '') && (keyword != '') && (short_desc != '')  && (image1 != '') && (image2 != '') && (image3 != '') && (image4 != '') ) {
            // console.log(cat_id,color_id,coupon_id,size_id,product_slug,product,brand_id,year_id,warranty,uses,keyword,short_desc,desc,technical_specification,image1,image2,image3,image4,product_status,sku,mrp,price,imageatrr,qty);
        //   var data =JSON.stringify(cat_id,color_id,coupon_id,size_id,product_slug,product,brand_id,year_id,warranty,uses,keyword,short_desc,desc,technical_specification,image1,image2,image3,image4,product_status,sku,mrp,price,imageatrr,qty);
        //   console.log(data);
          var formData = new FormData(this);
            $.ajax({
                url: "/admin/product/insert",
                type: 'post',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function(msg) {
                    if (msg.status == 200) {                    
                        $("#responsecheck").show().delay(8000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responsecheck').html("product Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/product");    
                    } else{
                       
                    if (msg.error) {    
                        $("#responsecheck").show().delay(8000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responsecheck').html(msg.error).css("color", "red");
                    } else {
                        $('#responsecheck').hide();
                    }
                    
                    }    
                }
            });
        }
      

    });

});

/// product Edit ///

    $('#show_data').on('click', '.product_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    $('#close_brd').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_br').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#show_data').on('click', '.product', function() {
        $('#Modal_Edit').modal('show');   
    });
    /// Update Size  ///
$(document).ready(function() {
    $("#editproduct").submit(function(e) {
        e.preventDefault();
        
        var product_id_edit = $('#product_id_edit').val();
        // alert(size);
        if ((product_id_edit.length == "") || (product_id_edit.length == null)) {  
            $("#product_id_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#product_id_editcheck').focus();
        }else{
            $('#product_id_editcheck').hide();
        }  

        var product_edit = $('#product_name_edit').val();
        if ((product_edit.length == "") || (product_edit.length == null)) {  
            $("#product_name_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_name_editcheck").html('** Please fill Product Name field').css("color", "red");
            $('#product_name_editcheck').focus();
        }else{
            $('#product_name_editcheck').hide();
        }  

        var cat_id = $('#cat_id').val();
        if ((cat_id.length == "") || (cat_id.length == null)) {  
            $("#catideditcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#catideditcheck").html('** Please Select Category').css("color", "red");
            $('#catideditcheck').focus();
        }else{
            $('#catideditcheck').hide();
        }  

        var brand_id = $('#brand_id').val();
        if ((brand_id.length == "") || (brand_id.length == null)) {  
            $("#product_brand_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_brand_editcheck").html('** Please Select Brand').css("color", "red");
            $('#product_brand_editcheck').focus();
        }else{
            $('#product_brand_editcheck').hide();
        }  
        // var year_id = $('#year_id').val();
        // if ((year_id.length == "") || (year_id.length == null)) {  
        //     $("#product_year_editcheck").show().delay(8000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#product_year_editcheck").html('** Please Select Year').css("color", "red");
        //     $('#product_year_editcheck').focus();
        // }else{
        //     $('#product_year_editcheck').hide();
        // }  

        var slug_edit = $('#slug_edit').val();
        if ((slug_edit.length == "") || (slug_edit.length == null)) {  
            $("#slug_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#slug_editcheck").html('** Please Enter Slug').css("color", "red");
            $('#slug_editcheck').focus();
        }else{
            $('#slug_editcheck').hide();
        }  

        var keyword_edit = $('#keyword_edit').val();
        if ((keyword_edit.length == "") || (keyword_edit.length == null)) {  
            $("#keyword_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#keyword_editcheck").html('** Please Enter Keyword').css("color", "red");
            $('#keyword_editcheck').focus();
        }else{
            $('#keyword_editcheck').hide();
        }  
       
        var  warranty_edit = $('#warranty_edit').val();
        if ((warranty_edit.length == "") || (warranty_edit.length == null)) {  
            $("#warranty_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#warranty_editcheck").html('** Please Enter Warranty').css("color", "red");
            $('#warranty_editcheck').focus();
        }else{
            $('#warranty_editcheck').hide();
        }  
        var status_edit = $('#status_edit').val();
        if (status_edit.length == "") {    
            $("#status_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#status_editcheck").html('** Please Select product Status').css("color", "red");
            $('#status_editcheck').focus();
        } else {
            $('#status_editcheck').hide();
        }  
         
        var uses_edit = $('#uses_edit').val();
        if (uses_edit.length == "") {    
            $("#uses_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#uses_editcheck").html('** Please Write Product Uses').css("color", "red");
            $('#uses_editcheck').focus();
        } else {
            $('#uses_editcheck').hide();
        }  

        var shortdesc = $('#shortdesc').val();
        if (shortdesc.length == "") {    
            $("#shortdesc_editcheck").show().delay(8000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#shortdesc_editcheck").html('** Please fill Short Desc').css("color", "red");
            $('#shortdesc_editcheck').focus();
        } else {
            $('#shortdesc_editcheck').hide();
        }  
        
        if ((uses_edit != '')  && (shortdesc != '') && (product_edit != '') && (status_edit != '') && (product_id_edit !='') && (warranty_edit !='') && (keyword_edit !='') && (slug_edit !='') && (brand_id !='') && (cat_id !='')) {
            // return false;
            var formData = new FormData(this);
            var id = $('#product_id_edit').val();
            $.ajax({
                url: "/admin/product/edit/" + id,
                type: 'post',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                // cache: false,
                contentType: false,
                processData: false,
                success: function(msg) {
                    if (msg.status == 200) {                    
                        $("#responseeditcheck").show().delay(8000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responseeditcheck').html("Product Successfully Updated").css("color", "green"); 
                          $('#Modal_Edit').modal('hide'); 
                          var table= $('#studentsTable').DataTable();
                               table.ajax.reload(null, false);   
                    } else{
                       
                    if (msg.error) {    
                        $("#responseeditcheck").show().delay(8000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responseeditcheck').html(msg.error).css("color", "red");
                    } else {
                        $('#responseeditcheck').hide();
                    }
                    
                    }    
                }
            });
        }
      

    });

    

});
$(document).ready(function(){
    show_coupon();
    function show_coupon() {
        $.ajax({
            url: "/admin/product/getcoupon",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].coupon_id + '">' +
               '<td>' + items[i].coupon_title + '</td>' +
                '</option>';
            }
          $('#coupon_id').append(html);
           
        //   console.log(html);
        }

      });
    }

    show_size();
    function show_size() {
        $.ajax({
            url: "/admin/product/getsize",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].size_id + '">' +
               '<td>' + items[i].size + '</td>' +
                '</option>';
            }
          $('#size_id').append(html);
           
        //   console.log(html);
        }

      });
    }

    show_color();
    function show_color() {
        $.ajax({
            url: "/admin/product/getcolor",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].color_id + '">' +
               '<td>' + items[i].color + '</td>' +
                '</option>';
            }
          $('#color_id').append(html);
           
        //   console.log(html);
        }

      });
    }
    show_cat();
    function show_cat() {
        $.ajax({
            url: "/admin/product/getcat",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].cat_id + '">' +
               '<td>' + items[i].cat_name + '</td>' +
                '</option>';
            }
          $('#cat_id').append(html);
           
        //   console.log(html);
        }

      });
    }
    show_brand();
    function show_brand() {
        $.ajax({
            url: "/admin/product/getbrand",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].brand_id + '">' +
               '<td>' + items[i].brand + '</td>' +
                '</option>';
            }
          $('#brand_id').append(html);
           
        //   console.log(html);
        }

      });
    }
    show_year();
    function show_year() {
        $.ajax({
            url: "/admin/product/getyear",
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
            for (i = 0; i < items.length; i++) {   
              html += '<option value="'+ items[i].model_id + '">' +
               '<td>' + items[i].year + '</td>' +
                '</option>';
            }
          $('#year_id').append(html);
           
        //   console.log(html);
        }

      });
    }
});

$(document).ready(function() {
    
    ///Show Data product On Edit Modal /// 
    $('#show_data').on('click', '.product_edit', function() {
    var product_id = $(this).data('product_id');  
    var product = $(this).data('product');
    var product_slug = $(this).data('product_slug');
    var keyword = $(this).data('keywords');
    var warranty = $(this).data('warranty');
    var status =$(this).data('product_status');
    var size =$(this).data('size_name');
    var color =$(this).data('color_name');
    var cat_id =$(this).data('cat_name');
    var brand =$(this).data('brand_name');
    var model =$(this).data('year_name');
    var coupon =$(this).data('coupon_name');
    var uses =$(this).data('uses');
    var short_desc =$(this).data('short_desc');
    // alert(short_desc);

    $('[name="product_id_edit"]').val(product_id);
    $('[name="product_name_edit"]').val(product);
    $('[name="slug_edit"]').val(product_slug);
    $('[name="keyword_edit"]').val(keyword);
    $('[name="warranty_edit"]').val(warranty);
    $("#status_edit option[value=" + status +"]").attr('selected', 'selected');

    $("#coupon_id option[value=" + coupon +"]").attr('selected', 'selected');

    $('[name="uses_edit"]').val(uses);

    $("#cat_id  option[value=" + cat_id +"]").attr('selected', 'selected');
    

    $('[name="shortdesc"]').val(short_desc);

    $("#brand_id option[value=" + brand +"]").attr('selected', 'selected');

    $("#year_id option[value=" + model +"]").attr('selected', 'selected');

    $("#size_id option[value=" + size +"]").attr('selected', 'selected');

    $("#color_id option[value=" + color +"]").attr('selected', 'selected');
   
    $('#Modal_Edit').modal('show');
    
    });
   
    });

    $(document).ready(function() {
    
        ///Show Data product On Edit Modal /// 
        $('#show_pro').on('click', '.product2_edit', function() {
        var product_id = $(this).data('product_id');  
        var product = $(this).data('product');
        var desc = $(this).data('desc');
        var ts = $(this).data('technical_specification');
        var image1 = $(this).data('image1');
        var image2 =$(this).data('image2');
        var image3 =$(this).data('image3');
        var image4 =$(this).data('image4');
        var price =$(this).data('price');
        var sku =$(this).data('sku');
        var mrp =$(this).data('mrp');
        var qty =$(this).data('qty');
        var products_id =$(this).data('products_id');
       
        // alert(image1);
    
        $('[name="product_id_edit"]').val(product_id);
        $('[name="product_name_edit"]').val(product);
        $('[name="desc_edit"]').val(desc);
        $('[name="ts_edit"]').val(ts);
        $('[name="price_edit"]').val(price);
        $('[name="sku_edit"]').val(sku);
        $('[name="qty_edit"]').val(qty);
        $('[name="productsid_edit"]').val(products_id);
        $('[name="mrp_edit"]').val(mrp);
        // $('[name="image1_edit"]').val(image1);
    
        // $('#img1').append('<img src="admin_assets/product_images/'+image1+'"/>');

        // $("#img1").attr('src',objectURL);
        // $("#image2_edit").attr("src","admin_assets/product_images/"+image2+"");
        // $("#image3_edit").attr("src","admin_assets/product_images/"+image3+"");
        // $("#image4_edit").attr("src","admin_assets/product_images/"+image4+"");
        // $('[name="image2_edit"]').val(image2);
        // $('[name="image3_edit"]').val(image3);
        // $('[name="image4_edit"]').val(image4);



        $('#Modal_Edit').modal('show');
        
        });
       
        });

        $(document).ready(function() {
            $("#editproduct2").submit(function(e) {
                e.preventDefault();
                
                var product_id_edit = $('#product_id_edit').val();
                // alert(size);
                if ((product_id_edit.length == "") || (product_id_edit.length == null)) {  
                    $("#product_id_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#product_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
                    $('#product_id_editcheck').focus();
                }else{
                    $('#product_id_editcheck').hide();
                }  
        
                var product_name_edit = $('#product_name_edit').val();
                if ((product_name_edit.length == "") || (product_name_edit.length == null)) {  
                    $("#product_name_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#product_name_editcheck").html('** Please fill Product Name field').css("color", "red");
                    $('#product_name_editcheck').focus();
                }else{
                    $('#product_name_editcheck').hide();
                }  

                var price_edit = $('#price_edit').val();
                if ((price_edit.length == "") || (price_edit.length == null)) {  
                    $("#pricecheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#pricecheck").html('** Please fill Product Price field').css("color", "red");
                    $('#pricecheck').focus();
                }else{
                    $('#pricecheck').hide();
                }  

                var desc_edit = $('#desc_edit').val();
                if ((desc_edit.length == "") || (desc_edit.length == null)) {  
                    $("#desc_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#desc_editcheck").html('** Please fill Product Desc field').css("color", "red");
                    $('#desc_editcheck').focus();
                }else{
                    $('#desc_editcheck').hide();
                }  

                var ts_edit = $('#ts_edit').val();
                if ((ts_edit.length == "") || (ts_edit.length == null)) {  
                    $("#ts_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#ts_editcheck").html('** Please fill Product T.S field').css("color", "red");
                    $('#ts_editcheck').focus();
                }else{
                    $('#ts_editcheck').hide();
                } 

                var sku_edit = $('#sku_edit').val();
                if ((sku_edit.length == "") || (sku_edit.length == null)) {  
                    $("#sku_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#sku_editcheck").html('** Please fill Product SKU field').css("color", "red");
                    $('#sku_editcheck').focus();
                }else{
                    $('#sku_editcheck').hide();
                } 

                var mrp_edit = $('#mrp_edit').val();
                if ((mrp_edit.length == "") || (mrp_edit.length == null)) {  
                    $("#mrp_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#mrp_editcheck").html('** Please fill Product MRP field').css("color", "red");
                    $('#mrp_editcheck').focus();
                }else{
                    $('#mrp_editcheck').hide();
                } 

                var qty_edit = $('#qty_edit').val();
                if ((qty_edit.length == "") || (qty_edit.length == null)) {  
                    $("#qty_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#qty_editcheck").html('** Please fill Product QTY field').css("color", "red");
                    $('#qty_editcheck').focus();
                }else{
                    $('#qty_editcheck').hide();
                } 

                var productsid_edit = $('#productsid_edit').val();
                if ((productsid_edit.length == "") || (productsid_edit.length == null)) {  
                    $("#productsid_editcheck").show().delay(8000).queue(function(n) {
                        $(this).hide(); n();
                      });
                    $("#productsid_editcheck").html('** Please fill Products ID field').css("color", "red");
                    $('#productsid_editcheck').focus();
                }else{
                    $('#productsid_editcheck').hide();
                } 

                if ((price_edit != '') && (product_name_edit != '') && (product_id_edit !='') && (productsid_edit !='') && (qty_edit !='') && (mrp_edit !='') && (sku_edit !='') && (ts_edit !='') && (desc_edit !='')) {
                    // return false;
                    var formData = new FormData(this);
                    var id = $('#product_id_edit').val();
                    $.ajax({
                        url: "/admin/product/edit2/" + id,
                        type: 'post',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        enctype: 'multipart/form-data',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(msg) {
                            if (msg.status == 200) {                    
                                $("#responseeditcheck").show().delay(8000).queue(function(n) {
                                    $(this).hide(); n();
                                  });
                                  $('#responseeditcheck').html("Product Successfully Updated").css("color", "green"); 
                                  $('#Modal_Edit').modal('hide'); 
                                 location.reload('#show_pro');
                            } else{
                               
                            if (msg.error) {    
                                $("#responseeditcheck").show().delay(8000).queue(function(n) {
                                    $(this).hide(); n();
                                  });
                                  $('#responseeditcheck').html(msg.error).css("color", "red");
                            } else {
                                $('#responseeditcheck').hide();
                            }
                            
                            }    
                        }
                    });
                }




            });
        });
        //Searchbar //

