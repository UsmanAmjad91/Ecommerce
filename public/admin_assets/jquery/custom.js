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
        if ((cat_name != '') && (cat_slug != '') && (cat_status != '')) {
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
$(document).ready(function() {
    
    ///Show Data On Edit Modal /// 
    $('#show_data').on('click', '.cat_edit', function() {
    var cat_id = $(this).data('cat_id');  
    var cat_name = $(this).data('cat_name');
    var cat_slug = $(this).data('cat_slug');
    var cat_status = $(this).data('cat_status');
    
    $('[name="cat_id_edit"]').val(cat_id);
    $('[name="cat_slug_edit"]').val(cat_slug);
    $('[name="cat_name_edit"]').val(cat_name);
    $("#cat_status_edit option[value="+cat_status+"]").attr('selected', 'selected');
    $('#Modal_Edit').modal('show');
    
    });
   
    });
    $('.cat_edit').click(function () {
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

if ((cat_name_edit != '') && (cat_slug_edit != '') && (cat_id_edit != '') && (cat_status_edit != '')) {
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
   $("#show_data").on('click','.cat_delete',function () { 
       
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
        if ((coupon_name != '') && (coupon_code != '') && (coupon_status != '') ) {
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
    var coupon_status = $(this).data('coupon_status');
    
    $('[name="coupon_id_edit"]').val(coupon_id);
    $('[name="coupon_code_edit"]').val(coupon_code);
    $('[name="coupon_name_edit"]').val(coupon_name);
    $('[name="coupon_value_edit"]').val(coupon_value);
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
        if ((coupon_name_edit != '') && (coupon_code_edit != '') && (coupon_status_edit != '') && (coupon_value_edit != '') ) {
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
 
 $("#closed").click(function () {
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
    $('#show_data').on('click', '.status_ac', function() {
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
     $('#show_data').on('click', '.status_de', function() {
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