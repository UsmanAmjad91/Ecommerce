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
        if ((cat_name != '') && (cat_slug != '')) {
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
   
    
    $('[name="cat_id_edit"]').val(cat_id);
    $('[name="cat_slug_edit"]').val(cat_slug);
    $('[name="cat_name_edit"]').val(cat_name);
    $('#Modal_Edit').modal('show');
    
    });
   
    });
    $("#close").click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('.cat_edit').click(function () {
        $('#Modal_Edit').modal('show');   
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

if (!cat_name_edit == "", !cat_slug_edit == "", !cat_id_edit == "") {
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