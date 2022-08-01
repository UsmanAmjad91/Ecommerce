
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
                    $("#responseeditcheck").show().delay(5000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.message).css("color", "green");  
                   var table= $('#studentsTable').DataTable();
                    table.ajax.reload(null, false);
                } else{    
                if (msg.error) {  
                    $("#responseeditcheck").show().delay(5000).queue(function(n) {
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
                    $("#responseeditcheck").show().delay(5000).queue(function(n) {
                        $(this).hide(); n();
                      });
                      $('#responseeditcheck').html(msg.message).css("color", "green");  
                   var table= $('#studentsTable').DataTable();
                    table.ajax.reload(null, false);
                } else{    
                if (msg.error) {  
                    $("#responseeditcheck").show().delay(5000).queue(function(n) {
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
             $("#responseeditcheck").show().delay(5000).queue(function(n) {
                 $(this).hide(); n();
               });
               $('#responseeditcheck').html(msg.message).css("color", "green"); 
               $('#Modal_Delete').modal('hide');  
            var table= $('#studentsTable').DataTable();
             table.ajax.reload(null, false);
         } else{    
         if (msg.error) {  
             console.log(msg.error); 
             $("#responseeditcheck").show().delay(5000).queue(function(n) {
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
            $("#catidcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#catidcheck").html('** Please Select Category ').css("color", "red");
            $('#catidcheck').focus();
        }else{
            $('#catidcheck').hide();
        }  
        var color_id = $('#color_id').val();
        if ((color_id.length == "") || (color_id.length == null)) {  
            $("#coloridcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coloridcheck").html('** Please Select Color ').css("color", "red");
            $('#coloridcheck').focus();
        }else{
            $('#coloridcheck').hide();
        }  
        var coupon_id = $('#coupon_id').val();
        if ((coupon_id.length == "") || (coupon_id.length == null)) {  
            $("#couponidcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#couponidcheck").html('** Please Select Coupon ').css("color", "red");
            $('#couponidcheck').focus();
        }else{
            $('#couponidcheck').hide();
        }  
        var size_id = $('#size_id').val();
        if ((size_id.length == "") || (size_id.length == null)) {  
            $("#sizeidcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#sizeidcheck").html('** Please Select Size ').css("color", "red");
            $('#sizeidcheck').focus();
        }else{
            $('#sizeidcheck').hide();
        }  
        var product_slug = $('#product_slug').val();
        if ((product_slug.length == "") || (product_slug.length == null)) {  
            $("#productslugcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productslugcheck").html('** Please fill Product Slug ').css("color", "red");
            $('#productslugcheck').focus();
        }else{
            $('#productslugcheck').hide();
        } 

        var product = $('#product').val();
        if ((product.length == "") || (product.length == null)) {  
            $("#productcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productcheck").html('** Please fill product Field').css("color", "red");
            $('#productcheck').focus();
        }else{
            $('#productcheck').hide();
        }  
        var brand_id = $('#brand_id').val();
        if ((brand_id.length == "") || (brand_id.length == null)) {  
            $("#brandidcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brandidcheck").html('** Please Select Brand ').css("color", "red");
            $('#brandidcheck').focus();
        }else{
            $('#brandidcheck').hide();
        } 
        var year_id = $('#year_id').val();
        if ((year_id.length == "") || (year_id.length == null)) {  
            $("#yearidcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#yearidcheck").html('** Please Select Year ').css("color", "red");
            $('#yearidcheck').focus();
        }else{
            $('#yearidcheck').hide();
        } 
        var warranty = $('#warranty').val();
        if ((warranty.length == "") || (warranty.length == null)) {  
            $("#warrantycheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#warrantycheck").html('** Please Enter warranty ').css("color", "red");
            $('#warrantycheck').focus();
        }else{
            $('#warrantycheck').hide();
        } 
        var uses = $('#uses').val();
        if ((uses.length == "") || (uses.length == null)) {  
            $("#usescheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#usescheck").html('** Please Enter Uses ').css("color", "red");
            $('#usescheck').focus();
        }else{
            $('#usescheck').hide();
        }
        var keyword = $('#keyword').val();
        if ((keyword.length == "") || (keyword.length == null)) {  
            $("#keywordcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#keywordcheck").html('** Please Enter Keywords ').css("color", "red");
            $('#keywordcheck').focus();
        }else{
            $('#keywordcheck').hide();
        } 
        var short_desc = $('#short_desc').val();
        if ((short_desc.length == "") || (short_desc.length == null)) {  
            $("#shortdesccheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#shortdesccheck").html('** Please Enter Short Description ').css("color", "red");
            $('#shortdesccheck').focus();
        }else{
            $('#shortdesccheck').hide();
        } 

       
  
        // var desc = $('#desc').val();
      
        // if ((desc.length == "") || (desc.length == null)) {  
        //     $("#desccheck").show().delay(5000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#desccheck").html('** Please Enter  Description ').css("color", "red");
        //     $('#desccheck').focus();
        // }else{
        //     $('#desccheck').hide();
        // } 
        // var technical_specification = $('#technical_specification').val();
        // if ((technical_specification.length == "") || (technical_specification.length == null)) {  
        //     $("#technical_specificationcheck").show().delay(5000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#technical_specificationcheck").html('** Please Enter  Technical Specificationcheck ').css("color", "red");
        //     $('#technical_specificationcheck').focus();
        // }else{
        //     $('#technical_specificationcheck').hide();
        // } 
        var image1 = $('#image1').val();
        if ((image1.length == "") || (image1.length == null)) {  
            $("#img1check").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img1check").html('** Please Enter  Select Image').css("color", "red");
            $('#img1check').focus();
        }else{
            $('#img1check').hide();
        }
        var image2 = $('#image2').val();
        if ((image2.length == "") || (image2.length == null)) {  
            $("#img2check").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img2check").html('** Please Enter  Select Image').css("color", "red");
            $('#img2check').focus();
        }else{
            $('#img2check').hide();
        }
        var image3 = $('#image3').val();
        if ((image3.length == "") || (image3.length == null)) {  
            $("#img3check").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img3check").html('** Please Enter  Select Image').css("color", "red");
            $('#img3check').focus();
        }else{
            $('#img3check').hide();
        }
        var image4 = $('#image4').val();
        if ((image4.length == "") || (image4.length == null)) {  
            $("#img4check").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img4check").html('** Please Enter Select Image').css("color", "red");
            $('#img4check').focus();
        }else{
            $('#img4check').hide();
        }
        var product_status = $('#product_status').val();
        if (product_status.length == "") {    
            $("#productstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#productstatuscheck").html('** Please Select product Status').css("color", "red");
            $('#productstatuscheck').focus();
        } else {
            $('#productstatuscheck').hide();
        }    
        // return false;
        if ((product != '') && (product_status != '') && (cat_id != '')  && (color_id != '') && (size_id != '') && (coupon_id != '') && (product_slug != '') && (brand_id != '') && (year_id != '') && (warranty != '') && (uses != '') && (keyword != '') && (short_desc != '')  && (image1 != '') && (image2 != '') && (image3 != '') && (image4 != '') ) {
           
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
                        $("#responsecheck").show().delay(5000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responsecheck').html("product Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/product");    
                    } else{
                       
                    if (msg.error) {    
                        $("#responsecheck").show().delay(5000).queue(function(n) {
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
$(document).ready(function() {
    
    ///Show Data product On Edit Modal /// 
    $('#show_data').on('click', '.product_edit', function() {
    var product_id = $(this).data('product_id');  
    var product = $(this).data('product');
    var product_status = $(this).data('product_status');
    
    $('[name="product_id_edit"]').val(product_id);
    $('[name="product_edit"]').val(product);
    $("#size_product_edit option[value="+product_status+"]").attr('selected', 'selected');

    $('#Modal_Edit').modal('show');
    
    });
   
    });

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
            $("#product_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#product_id_editcheck').focus();
        }else{
            $('#product_id_editcheck').hide();
        }  

        var product_edit = $('#product_edit').val();
        // alert(size);
        if ((product_edit.length == "") || (product_edit.length == null)) {  
            $("#product_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_editcheck").html('** Please fill product field').css("color", "red");
            $('#product_editcheck').focus();
        }else{
            $('#product_editcheck').hide();
        }  
       
        var product_status_edit = $('#product_status_edit').val();
        if (product_status_edit.length == "") {    
            $("#product_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#product_status_editcheck").html('** Please Select product Status').css("color", "red");
            $('#product_status_editcheck').focus();
        } else {
            $('#product_status_editcheck').hide();
        }    
        if ((product_edit != '') && (product_status_edit != '') && (product_id_edit !='') ) {
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
                        $("#responsecheck").show().delay(5000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responsecheck').html("Size Successfully Updated").css("color", "green"); 
                          $('#Modal_Edit').modal('hide'); 
                          var table= $('#studentsTable').DataTable();
                               table.ajax.reload(null, false);   
                    } else{
                       
                    if (msg.error) {    
                        $("#responsecheck").show().delay(5000).queue(function(n) {
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