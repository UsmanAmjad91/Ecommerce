$(document).ready(function() {
    $("#login").submit(function(e) {
        e.preventDefault();
       
        var email = $('#email').val();
        if (email.length == "") {    
            $("#emailcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#emailcheck").html('** Please enter Email').css("color", "red");
            $('#emailcheck').focus();
        } else {
            $('#emailcheck').hide();
        }      
        var password = $('#password').val();
        if ((password.length = "") || (password.length < 8) || (password.length > 20)) {    
            $("#passwordcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#passwordcheck").html('** Please enter Password (min=8  max=20)').css("color", "red");
            $('#passwordcheck').focus();
           return false;
        } else {
            $('#passwordcheck').hide();
        }

        if ((email != '') && (password != '')) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/auth",
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
                        window.location.replace("/admin/dashboard");    
                    } else{
                    if (msg.message) {    
                        $("#rescheck").show().delay(5000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#rescheck').html(msg.message).css("color", "red");
                    } else {
                        $('#rescheck').hide();
                    }
                    
                    }    
                }
            });
        }
      

    });

});

 /// ADD Category ///
 $(document).ready(function() {
    $("#addcat").submit(function(e) {
        e.preventDefault();
     
        var cat_name = $('#cat_name').val();
        if ($('#cat_name').val() == '') { 
            $("#catnamecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#catnamecheck").html('** Please enter Category Name').css("color", "red");
            $('#catnamecheck').focus();
        }else{
            $('#catnamecheck').hide();
        }  
        var cat_slug = $('#cat_slug').val();
        if (cat_slug.length == "") {    
            $("#cat_slugcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#cat_slugcheck").html('** Please enter Category Slug').css("color", "red");
            $('#cat_slugcheck').focus();
        } else {
            $('#cat_slugcheck').hide();
        }   
        var cat_image = $('#cat_image').val();
        if (cat_image.length == "") {    
            $("#imgcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#imgcheck").html('** Please enter Category Image').css("color", "red");
            $('#imgcheck').focus();
        } else {
            $('#imgcheck').hide();
        }   
        var cat_status = $('#cat_status').val();
        if (cat_status.length == "") {    
            $("#cat_statuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#cat_statuscheck").html('** Please enter Category Select status').css("color", "red");
            $('#cat_statuscheck').focus();
        } else {
            $('#cat_statuscheck').hide();
        }    
        if ((cat_name != '') && (cat_slug != '') && (cat_status != '') && (cat_image!='')) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/category/insert",
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
                          $('#responsecheck').html("Category Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/category");    
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

/// Cat List success Message time out///
$(document).ready(function() {
    $('#catmsg').css("color", "green"); 
setTimeout(function () { 
    $('#catmsg').hide() ;
     }, 5000);
    });

/// Category Edit ///
// $(document).ready(function() {
// $('#shows_data').on('click', '.category_edit', function() {
//     $('#Modal_Edit').modal('show');  
// }); 

// });
$(document).ready(function() {
    
    ///Show Data On Edit Modal /// 
    $('#shows_data').on('click', '.cat_edit', function() {
    var cat_id = $(this).data('cat_id');  
    var cat_name = $(this).data('cat_name');
    var cat_slug = $(this).data('cat_slug');
    var cat_image = $(this).data('cat_image');
    var cat_parent_id = $(this).data('cat_parent_id');
    var cat_status = $(this).data('cat_status');
    
    $('[name="cat_id_edit"]').val(cat_id);
    $('[name="cat_slug_edit"]').val(cat_slug);
    $('[name="cat_name_edit"]').val(cat_name);
    
    $("#cat_status_edit option[value="+cat_status+"]").attr('selected', 'selected');
    $('#catim').attr('src', '/admin_assets/cat_images/'+cat_image);
    if(cat_parent_id!= ''){
        $("#cat_parent_id option[value="+cat_parent_id+"]").attr('selected', 'selected');
        }
    //   $('#Modal_Edit').modal('show');
    
    });
   
    });
    $('#shows_data').on('click', '.category_edit', function() {
        $('#Modal_Edit').modal('show');  
    }); 
    // $('#shows_data').on('click', '.cat_edit', function() {
    //     $('#Modal_Edit').modal('show');  
    // }); 
    $('.cat_edit').click(function() {
        $('#Modal_Edit').modal('show'); 
    });

    $("#close").click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $("#close_cat").click(function () {
        $('#Modal_Edit').modal('hide');   
    });
   
    $(document).ready(function() {
// Update Record //
$("#editpro").submit(function(e) {
    e.preventDefault();
    var cat_id_edit = $('#cat_id_edit').val();
        if (cat_id_edit.length == "") {    
            $("#cat_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#cat_id_editcheck").html('** Please dont,t Remove Category Id').css("color", "red");
            $('#cat_id_editcheck').focus();
            $('#cat_id_editcheck').css("color", "red");
        } else {
            $('#cat_id_editcheck').hide();
        }
           var cat_name_edit = $('#cat_name_edit').val();
        if (cat_name_edit.length == "") {    
            $("#cat_name_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#cat_name_editcheck").html('** Please enter Category Name').css("color", "red");
            $('#cat_name_editcheck').focus();
            $('#cat_name_editcheck').css("color", "red");
        } else {
            $('#cat_name_editcheck').hide();
        }
        // var cat_image = $('#cat_image').val();
        // if (cat_image.length == "") {    
        //     $("#imgcheck").show().delay(5000).queue(function(n) {
        //         $(this).hide(); n();
        //       });
        //     $("#imgcheck").html('** Please enter Category Image').css("color", "red");
        //     $('#imgcheck').focus();
        // } else {
        //     $('#imgcheck').hide();
        // }   
           var cat_slug_edit = $('#cat_slug_edit').val();
if (cat_slug_edit.length == "") {    
    $("#cat_slug_editcheck").show().delay(5000).queue(function(n) {
        $(this).hide(); n();
      });
    $("#cat_slug_editcheck").html('** Please enter Category Slug').css("color", "red");
    $('#cat_slug_editcheck').focus();
    $('#cat_slug_editcheck').css("color", "red");
} else {
    $('#cat_slug_editcheck').hide();
}
var cat_status_edit = $('#cat_status_edit').val();
if (cat_status_edit.length == "") {    
    $("#cat_status_editcheck").show().delay(5000).queue(function(n) {
        $(this).hide(); n();
      });
    $("#cat_status_editcheck").html('** Please enter Category Status').css("color", "red");
    $('#cat_status_editcheck').focus();
    $('#cat_status_editcheck').css("color", "red");
} else {
    $('#cat_status_editcheck').hide();
}
// console.log(cat_name_edit,cat_slug_edit,cat_id_edit,cat_status_edit);

if ((cat_name_edit != '') && (cat_slug_edit != '') && (cat_id_edit != '') && (cat_status_edit != '') ) {
    var formData = new FormData(this);
    var id = $('#cat_id_edit').val();
    // return false;
   $.ajax({
       url: "/admin/category/edit/" + id,
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
              var table= $('#studentsTable').DataTable();
              table.ajax.reload(null, false); 
              $('#Modal_Edit').modal('hide');            
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
// return false;
});

    });



$(document).ready(function() {
   /// Delete Record Category ///
   $("#shows_data").on('click','.cat_delete',function () { 
       
    var cat_id = $(this).data('cat_id');
    $('#Modal_Delete').modal('show');
   $('[name="cat_id_delete"]').val(cat_id);
   });
   $("#delpro").submit(function(e) {
    e.preventDefault();
   var  id = $('#cat_id_delete').val();
   if (!id == "") {
    var formData = new FormData(this);
    var id = $('#cat_id_delete').val();
   $.ajax({
       url: "/admin/category/delete/" + id,
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

$("#closed").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
});

/// ADD Coupon ///
$(document).ready(function() {
    $("#addcoupon").submit(function(e) {
        e.preventDefault();
     
        var coupon_name = $('#coupon_name').val();
        if ($('#coupon_name').val() == '') { 
            $("#couponnamecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#couponnamecheck").html('** Please enter Coupon Name').css("color", "red");
            $('#couponnamecheck').focus();
        }else{
            $('#couponnamecheck').hide();
        }  
        var coupon_code = $('#coupon_code').val();
        if (coupon_code.length == "") {    
            $("#coupon_codecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_codecheck").html('** Please enter Coupon Code').css("color", "red");
            $('#coupon_codecheck').focus();
        } else {
            $('#coupon_codecheck').hide();
        }  
        var coupon_value = $('#coupon_value').val();
        if (coupon_value.length == "") {    
            $("#coupon_valuecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_valuecheck").html('** Please enter Coupon Code').css("color", "red");
            $('#coupon_valuecheck').focus();
        } else {
            $('#coupon_valuecheck').hide();
        }    
        var min_order_amount = $('#min_order_amount').val();
        if (min_order_amount.length == "") {    
            $("#min_order_amountcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#min_order_amountcheck").html('** Please enter Min order amount').css("color", "red");
            $('#min_order_amountcheck').focus();
        } else {
            $('#min_order_amountcheck').hide();
        }  
        var type = $('#type').val();
        if (type.length == "") {    
            $("#typecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#typecheck").html('** Please enter Type').css("color", "red");
            $('#typecheck').focus();
        } else {
            $('#typecheck').hide();
        }   
        var is_one_time = $('#is_one_time').val();
        if (is_one_time.length == "") {    
            $("#is_one_time").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#is_one_time").html('** Please enter One Time Or more').css("color", "red");
            $('#is_one_time').focus();
        } else {
            $('#is_one_time').hide();
        }    
        var coupon_status = $('#coupon_status').val();
        if (coupon_status.length == "") {    
            $("#couponstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#couponstatuscheck").html('** Please Select Coupon Status').css("color", "red");
            $('#couponstatuscheck').focus();
        } else {
            $('#couponstatuscheck').hide();
        }    
        if ((coupon_name != '') && (coupon_code != '') && (coupon_status != '') && (min_order_amount!='') && (type!='') && (is_one_time!='')) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/coupon/insert",
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
                          $('#responsecheck').html("Coupon Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/coupon");    
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
/// Coupon Edit ///
$(document).ready(function() {
    
    ///Show Data On Edit Modal /// 
    $('#show_data').on('click', '.coupon_edit', function() {
    var coupon_id = $(this).data('coupon_id');  
    var coupon_name = $(this).data('coupon_name');
    var coupon_code = $(this).data('coupon_code');
    var coupon_value = $(this).data('coupon_value');
    var type = $(this).data('type');
    var is_one_time = $(this).data('is_one_time');
    var min_order_amount = $(this).data('min_order_amount');
    var coupon_status = $(this).data('coupon_status');
    
    $('[name="coupon_id_edit"]').val(coupon_id);
    $('[name="coupon_code_edit"]').val(coupon_code);
    $('[name="coupon_name_edit"]').val(coupon_name);
    $('[name="coupon_value_edit"]').val(coupon_value);
    $('[name="min_order_amount"]').val(min_order_amount);
    $("#type option[value="+type+"]").attr('selected', 'selected');
    $("#is_one_time option[value="+is_one_time+"]").attr('selected', 'selected');
    $("#coupon_status_edit option[value="+coupon_status+"]").attr('selected', 'selected');

    $('#Modal_Edit').modal('show');
    
    });
   
    });
    $('.coupon_edit').click(function () {
        $('#Modal_Edit').modal('show');   
    });
   
   
    /// Update Coupon ///
$(document).ready(function() {
    $("#editcoupon").submit(function(e) {
        e.preventDefault();
        var coupon_id_edit = $('#coupon_id_edit').val();
        if ($('#coupon_id_edit').val() == '') { 
            $("#coupon_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_id_editcheck").html('** Please enter Coupon ID').css("color", "red");
            $('#coupon_id_editcheck').focus();
        }else{
            $('#coupon_id_editcheck').hide();
        }  
        var coupon_name_edit = $('#coupon_name_edit').val();
        if ($('#coupon_name_edit').val() == '') { 
            $("#coupon_name_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_name_editcheck").html('** Please enter Coupon Name').css("color", "red");
            $('#coupon_name_editcheck').focus();
        }else{
            $('#coupon_name_editcheck').hide();
        }  
        var coupon_code_edit = $('#coupon_code_edit').val();
        if (coupon_code_edit.length == "") {    
            $("#coupon_code_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_code_editcheck").html('** Please enter Coupon Code').css("color", "red");
            $('#coupon_code_editcheck').focus();
        } else {
            $('#coupon_code_editcheck').hide();
        }   
        var coupon_value_edit = $('#coupon_value_edit').val();
        if (coupon_value_edit.length == "") {    
            $("#coupon_value_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_value_editcheck").html('** Please enter Coupon Value').css("color", "red");
            $('#coupon_value_editcheck').focus();
        } else {
            $('#coupon_value_editcheck').hide();
        }   
        var min_order_amount = $('#min_order_amount').val();
        if (min_order_amount.length == "") {    
            $("#min_order_amountcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#min_order_amountcheck").html('** Please enter Min order amount').css("color", "red");
            $('#min_order_amountcheck').focus();
        } else {
            $('#min_order_amountcheck').hide();
        }  
        var type = $('#type').val();
        if (type.length == "") {    
            $("#typecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#typecheck").html('** Please enter Type').css("color", "red");
            $('#typecheck').focus();
        } else {
            $('#typecheck').hide();
        }   
        var is_one_time = $('#is_one_time').val();
        if (is_one_time.length == "") {    
            $("#is_one_time").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#is_one_time").html('** Please enter One Time Or more').css("color", "red");
            $('#is_one_time').focus();
        } else {
            $('#is_one_time').hide();
        }    
        var coupon_status_edit = $('#coupon_status_edit').val();
        if (coupon_status_edit.length == "") {    
            $("#coupon_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#coupon_status_editcheck").html('** Please Select Coupon Status').css("color", "red");
            $('#coupon_status_editcheck').focus();
        } else {
            $('#coupon_status_editcheck').hide();
        }    
        if ((coupon_name_edit != '') && (coupon_code_edit != '') && (coupon_status_edit != '') && (coupon_value_edit != '') && (min_order_amount!='') && (type!='') && (is_one_time!='')) {
            // return false;
            var id = $('#coupon_id_edit').val();
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/coupon/edit/" + id,
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
                        $("#responseeditcheck").show().delay(5000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responseeditcheck').html("Coupon Successfully Updated").css("color", "green"); 
                          var table= $('#studentsTable').DataTable();
                          table.ajax.reload(null, false); 
                          $('#Modal_Edit').modal('hide');  
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
    $('#close_cop').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#close_copo').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
});

$(document).ready(function() {
    /// Delete Record Coupon ///
    $("#show_data").on('click','.coupon_delete',function () { 
        
     var coupon_id = $(this).data('coupon_id');
     $('#Modal_Delete').modal('show');
    $('[name="coupon_id_delete"]').val(coupon_id);
    });
    $("#delcop").submit(function(e) {
     e.preventDefault();
    var  id = $('#coupon_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#coupon_id_delete').val();
    $.ajax({
        url: "/admin/coupon/delete/" + id,
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
 
 $("#closed_cat").click(function () {
     $('#Modal_Delete').modal('hide');   
 }); 
 $("#closed_cop_del").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_copdel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
 });
 /// Active De Active Category ///
 
$(document).ready(function() {
    /// Active to deactive ///
    $('#shows_data').on('click', '.status_ac', function() {
        var id = $(this).data('cat_id');      
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/category/status_deactive/" + id,
               type: 'post',
               data: {id},
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
     ///  Deactive To Active  ///
     $('#shows_data').on('click', '.status_de', function() {
        var id = $(this).data('cat_id');    
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/category/status_active/" + id,
               type: 'post',
               data: {id},
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

});

/// Active De Active Coupon /// 
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.coupon_status_ac', function() {
        var id = $(this).data('coupon_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/coupon/status_active/" + id,
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
    $('#show_data').on('click', '.coupon_status_de', function() {
        var id = $(this).data('coupon_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/coupon/status_deactive/" + id,
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

/// ADD Size  ///
$(document).ready(function() {
    $("#addsize").submit(function(e) {
        e.preventDefault();
     
        var size = $('#size').val();
        // alert(size);
        if ((size.length == "") || (size.length == null)) {  
            $("#sizecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#sizecheck").html('** Please Select Size').css("color", "red");
            $('#sizecheck').focus();
        }else{
            $('#sizecheck').hide();
        }  
       
        var size_status = $('#size_status').val();
        if (size_status.length == "") {    
            $("#sizestatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#sizestatuscheck").html('** Please Select Size Status').css("color", "red");
            $('#sizestatuscheck').focus();
        } else {
            $('#sizestatuscheck').hide();
        }    
        if ((size != '') && (size_status != '') ) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/size/insert",
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
                          $('#responsecheck').html("Size Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/size");    
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

/// Size Edit ///
$(document).ready(function() {
    
    ///Show Data On Edit Modal /// 
    $('#show_data').on('click', '.size_edit', function() {
    var size_id = $(this).data('size_id');  
    var size = $(this).data('size');
    var size_status = $(this).data('size_status');
    
    $('[name="size_id_edit"]').val(size_id);
    $("#size_edit option[value="+size+"]").attr('selected', 'selected');
    $("#size_status_edit option[value="+size_status+"]").attr('selected', 'selected');

    $('#Modal_Edit').modal('show');
    
    });
   
    });

    $('#show_data').on('click', '.size_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    $('#close_sz').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_siz').click(function () {
        $('#Modal_Edit').modal('hide');   
    });

    /// Update Size  ///
$(document).ready(function() {
    $("#editsize").submit(function(e) {
        e.preventDefault();
        
        var size_id_edit = $('#size_id_edit').val();
        // alert(size);
        if ((size_id_edit.length == "") || (size_id_edit.length == null)) {  
            $("#size_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#size_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#size_id_editcheck').focus();
        }else{
            $('#size_id_editcheck').hide();
        }  

        var size_edit = $('#size_edit').val();
        // alert(size);
        if ((size_edit.length == "") || (size_edit.length == null)) {  
            $("#size_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#size_editcheck").html('** Please Select Size').css("color", "red");
            $('#size_editcheck').focus();
        }else{
            $('#size_editcheck').hide();
        }  
       
        var size_status_edit = $('#size_status_edit').val();
        if (size_status_edit.length == "") {    
            $("#size_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#size_status_editcheck").html('** Please Select Size Status').css("color", "red");
            $('#size_status_editcheck').focus();
        } else {
            $('#size_status_editcheck').hide();
        }    
        if ((size_edit != '') && (size_status_edit != '') && (size_id_edit !='') ) {
            // return false;
            var formData = new FormData(this);
            var id = $('#size_id_edit').val();
            $.ajax({
                url: "/admin/size/edit/" + id,
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

$(document).ready(function() {
    /// Delete Record Size ///
    $("#show_data").on('click','.size_delete',function () { 
        
     var size_id = $(this).data('size_id');
     $('#Modal_Delete').modal('show');
    $('[name="size_id_delete"]').val(size_id);
    });

    $("#delsize").submit(function(e) {
     e.preventDefault();
    var  id = $('#size_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#size_id_delete').val();
    $.ajax({
        url: "/admin/size/delete/" + id,
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
 /// Model Delete Close Size ///
 $("#closed_sizedel").click(function () {
     $('#Modal_Delete').modal('hide');   
 }); 
 $("#closed_size_del").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 

 });

 /// Status Size Active And Deactive ///
 $(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.size_status_ac', function() {
        var id = $(this).data('size_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/size/status_active/" + id,
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
    $('#show_data').on('click', '.size_status_de', function() {
        var id = $(this).data('size_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/size/status_deactive/" + id,
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



/// Status Color Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.color_status_ac', function() {
        var id = $(this).data('color_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/color/status_active/" + id,
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
    $('#show_data').on('click', '.color_status_de', function() {
        var id = $(this).data('color_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/color/status_deactive/" + id,
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
    /// Delete Record Color ///
    $("#show_data").on('click','.color_delete',function () { 
        
     var color_id = $(this).data('color_id');
     $('#Modal_Delete').modal('show');
    $('[name="color_id_delete"]').val(color_id);
    });

    $("#delcolor").submit(function(e) {
     e.preventDefault();
    var  id = $('#color_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#color_id_delete').val();
    $.ajax({
        url: "/admin/color/delete/" + id,
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
 ///Color Delete Model ///
$("#closed_colordel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_color_del").click(function () {
    $('#Modal_Delete').modal('hide');   
});

 });

 /// ADD Color  ///
$(document).ready(function() {
    $("#addcolor").submit(function(e) {
        e.preventDefault();
     
        var color = $('#color').val();
        // alert(size);
        if ((color.length == "") || (color.length == null)) {  
            $("#colorcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#colorcheck").html('** Please fill Color Field').css("color", "red");
            $('#colorcheck').focus();
        }else{
            $('#colorcheck').hide();
        }  
       
        var color_status = $('#color_status').val();
        if (color_status.length == "") {    
            $("#colorstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#colorstatuscheck").html('** Please Select Color Status').css("color", "red");
            $('#colorstatuscheck').focus();
        } else {
            $('#colorstatuscheck').hide();
        }    
        if ((color != '') && (color_status != '') ) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/color/insert",
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
                          $('#responsecheck').html("Color Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/color");    
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

/// Color Edit ///
$(document).ready(function() {
    
    ///Show Data Color On Edit Modal /// 
    $('#show_data').on('click', '.color_edit', function() {
    var color_id = $(this).data('color_id');  
    var color = $(this).data('color');
    var color_status = $(this).data('color_status');
    
    $('[name="color_id_edit"]').val(color_id);
    $('[name="color_edit"]').val(color);
    $("#size_color_edit option[value="+color_status+"]").attr('selected', 'selected');

    $('#Modal_Edit').modal('show');
    
    });
   
    });

    $('#show_data').on('click', '.color_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    $('#close_cl').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_col').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#show_data').on('click', '.color_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    /// Update Size  ///
$(document).ready(function() {
    $("#editcolor").submit(function(e) {
        e.preventDefault();
        
        var color_id_edit = $('#color_id_edit').val();
        // alert(size);
        if ((color_id_edit.length == "") || (color_id_edit.length == null)) {  
            $("#color_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#color_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#color_id_editcheck').focus();
        }else{
            $('#color_id_editcheck').hide();
        }  

        var color_edit = $('#color_edit').val();
        // alert(size);
        if ((color_edit.length == "") || (color_edit.length == null)) {  
            $("#color_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#color_editcheck").html('** Please fill color field').css("color", "red");
            $('#color_editcheck').focus();
        }else{
            $('#color_editcheck').hide();
        }  
       
        var color_status_edit = $('#color_status_edit').val();
        if (color_status_edit.length == "") {    
            $("#color_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#color_status_editcheck").html('** Please Select Color Status').css("color", "red");
            $('#color_status_editcheck').focus();
        } else {
            $('#color_status_editcheck').hide();
        }    
        if ((color_edit != '') && (color_status_edit != '') && (color_id_edit !='') ) {
            // return false;
            var formData = new FormData(this);
            var id = $('#color_id_edit').val();
            $.ajax({
                url: "/admin/color/edit/" + id,
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


/// Status brand Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.brand_status_ac', function() {
        var id = $(this).data('brand_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/brand/status_active/" + id,
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
    $('#show_data').on('click', '.brand_status_de', function() {
        var id = $(this).data('brand_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/brand/status_deactive/" + id,
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
    /// Delete Record brand ///
    $("#show_data").on('click','.brand_delete',function () { 
        
     var brand_id = $(this).data('brand_id');
     $('#Modal_Delete').modal('show');
    $('[name="brand_id_delete"]').val(brand_id);
    });

    $("#delbrand").submit(function(e) {
     e.preventDefault();
    var  id = $('#brand_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#brand_id_delete').val();
    $.ajax({
        url: "/admin/brand/delete/" + id,
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
 ///brand Delete Model ///
$("#closed_branddel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_brand_del").click(function () {
    $('#Modal_Delete').modal('hide');   
});

 });

 /// ADD brand  ///
$(document).ready(function() {
    $("#addbrand").submit(function(e) {
        e.preventDefault();
     
        var brand = $('#brand').val();
        // alert(size);
        if ((brand.length == "") || (brand.length == null)) {  
            $("#brandcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brandcheck").html('** Please fill brand Field').css("color", "red");
            $('#brandcheck').focus();
        }else{
            $('#brandcheck').hide();
        }  
       
        var brand_image = $('#brand_image').val();
        if (brand_image.length == "") {    
            $("#imgcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#imgcheck").html('** Please Select brand Image').css("color", "red");
            $('#imgcheck').focus();
        } else {
            $('#imgcheck').hide();
        }    

        var brand_status = $('#brand_status').val();
        if (brand_status.length == "") {    
            $("#brandstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brandstatuscheck").html('** Please Select brand Status').css("color", "red");
            $('#brandstatuscheck').focus();
        } else {
            $('#brandstatuscheck').hide();
        }    
        if ((brand != '') && (brand_status != '') && (brand_image != '')) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/brand/insert",
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
                          $('#responsecheck').html("Brand Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/brand");    
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

/// brand Edit ///
$(document).ready(function() {
    
    ///Show Data brand On Edit Modal /// 
    $('#show_data').on('click', '.brand_edit', function() {
    var brand_id = $(this).data('brand_id');  
    var brand = $(this).data('brand');
    var brand_image = $(this).data('brand_image');
    var brand_status = $(this).data('brand_status');
    
    $('[name="brand_id_edit"]').val(brand_id);
    $('[name="brand_edit"]').val(brand);
    $("#size_brand_edit option[value="+brand_status+"]").attr('selected', 'selected');
   $('#sho').attr('src', '/admin_assets/brand_images/'+brand_image);
      
    // $('#Modal_Edit').modal('show');
    
    });
    $('#show_data').on('click', '.brand-br', function() {
        // alert("hello");
        $('#Modal_Edit').modal('show');   
    });
   
    });

    
    $('#close_brd').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_br').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#show_data').on('click', '.brand_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    
    /// Update Brand  ///
$(document).ready(function() {
    $("#editbrand").submit(function(e) {
        e.preventDefault();
        
        var brand_id_edit = $('#brand_id_edit').val();
        // alert(size);
        if ((brand_id_edit.length == "") || (brand_id_edit.length == null)) {  
            $("#brand_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brand_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#brand_id_editcheck').focus();
        }else{
            $('#brand_id_editcheck').hide();
        }  

        var brand_edit = $('#brand_edit').val();
        // alert(size);
        if ((brand_edit.length == "") || (brand_edit.length == null)) {  
            $("#brand_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brand_editcheck").html('** Please fill brand field').css("color", "red");
            $('#brand_editcheck').focus();
        }else{
            $('#brand_editcheck').hide();
        }  
       
        var brand_status_edit = $('#brand_status_edit').val();
        if (brand_status_edit.length == "") {    
            $("#brand_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#brand_status_editcheck").html('** Please Select brand Status').css("color", "red");
            $('#brand_status_editcheck').focus();
        } else {
            $('#brand_status_editcheck').hide();
        }    
        if ((brand_edit != '') && (brand_status_edit != '') && (brand_id_edit !='') ) {
            // return false;
            var formData = new FormData(this);
            var id = $('#brand_id_edit').val();
            $.ajax({
                url: "/admin/brand/edit/" + id,
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
                          $('#responsecheck').html("Brand Successfully Updated").css("color", "green"); 
                          $('#Modal_Edit').modal('hide'); 
                          var table= $('#studentsTable').DataTable();
                               table.ajax.reload(null, false); 
                               window.location = window.location.href+'?eraseCache=true';  
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

/// Status year Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.year_status_ac', function() {
        var id = $(this).data('year_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/year/status_active/" + id,
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
    $('#show_data').on('click', '.year_status_de', function() {
        var id = $(this).data('year_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/year/status_deactive/" + id,
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
    /// Delete Record year ///
    $("#show_data").on('click','.year_delete',function () { 
        
     var year_id = $(this).data('year_id');
     $('#Modal_Delete').modal('show');
    $('[name="year_id_delete"]').val(year_id);
    });

    $("#delyear").submit(function(e) {
     e.preventDefault();
    var  id = $('#year_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#year_id_delete').val();
    $.ajax({
        url: "/admin/year/delete/" + id,
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
 ///year Delete Model ///
$("#closed_yeardel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_year_del").click(function () {
    $('#Modal_Delete').modal('hide');   
});

 });

 /// ADD year  ///
$(document).ready(function() {
    $("#addyear").submit(function(e) {
        e.preventDefault();
     
        var year = $('#year').val();
        // alert(size);
        if ((year.length == "") || (year.length == null)) {  
            $("#yearcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#yearcheck").html('** Please fill year Field').css("color", "red");
            $('#yearcheck').focus();
        }else{
            $('#yearcheck').hide();
        }  
       
        var year_status = $('#year_status').val();
        if (year_status.length == "") {    
            $("#yearstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#yearstatuscheck").html('** Please Select year Status').css("color", "red");
            $('#yearstatuscheck').focus();
        } else {
            $('#yearstatuscheck').hide();
        }    
        if ((year != '') && (year_status != '') ) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/year/insert",
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
                          $('#responsecheck').html("year Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/year");    
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

/// year Edit ///
$(document).ready(function() {
    
    ///Show Data year On Edit Modal /// 
    $('#show_data').on('click', '.year_edit', function() {
    var year_id = $(this).data('year_id');  
    var year = $(this).data('year');
    var year_status = $(this).data('year_status');
    
    $('[name="year_id_edit"]').val(year_id);
    $('[name="year_edit"]').val(year);
    $("#size_year_edit option[value="+year_status+"]").attr('selected', 'selected');

    $('#Modal_Edit').modal('show');
    
    });
   
    });

    $('#show_data').on('click', '.year_edit', function() {
        $('#Modal_Edit').modal('show');   
    });
    $('#close_brd').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_br').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#show_data').on('click', '.year', function() {
        $('#Modal_Edit').modal('show');   
    });
    /// Update Year  ///
$(document).ready(function() {
    $("#edityear").submit(function(e) {
        e.preventDefault();
        
        var year_id_edit = $('#year_id_edit').val();
        // alert(size);
        if ((year_id_edit.length == "") || (year_id_edit.length == null)) {  
            $("#year_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#year_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#year_id_editcheck').focus();
        }else{
            $('#year_id_editcheck').hide();
        }  

        var year_edit = $('#year_edit').val();
        // alert(size);
        if ((year_edit.length == "") || (year_edit.length == null)) {  
            $("#year_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#year_editcheck").html('** Please fill year field').css("color", "red");
            $('#year_editcheck').focus();
        }else{
            $('#year_editcheck').hide();
        }  
       
        var year_status_edit = $('#year_status_edit').val();
        if (year_status_edit.length == "") {    
            $("#year_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#year_status_editcheck").html('** Please Select year Status').css("color", "red");
            $('#year_status_editcheck').focus();
        } else {
            $('#year_status_editcheck').hide();
        }    
        if ((year_edit != '') && (year_status_edit != '') && (year_id_edit !='') ) {
            // return false;
            var formData = new FormData(this);
            var id = $('#year_id_edit').val();
            $.ajax({
                url: "/admin/year/edit/" + id,
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