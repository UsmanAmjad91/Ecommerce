$(document).ready(function() {
    /// Delete Record customer ///
    $("#show_data").on('click','.customer_delete',function () { 
        
     var customer_id = $(this).data('customer_id');
     $('#Modal_Delete').modal('show');
    $('[name="customer_id_delete"]').val(customer_id);
    });

    $("#delcustomer").submit(function(e) {
     e.preventDefault();
    var  id = $('#customer_id_delete').val();
    // console.log(id);
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#customer_id_delete').val();
    $.ajax({
        url: "/admin/customer/delete/" + id,
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
 ///Customer Delete Model ///
$("#closed_custdel").click(function () {
    $('#Modal_Delete').modal('hide');   
}); 
$("#closed_cust_del").click(function () {
    $('#Modal_Delete').modal('hide');   
});

 });

 /// Status customer Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#show_data').on('click', '.customer_status_ac', function() {
        var id = $(this).data('customer_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/customer/status_active/" + id,
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
    $('#show_data').on('click', '.customer_status_de', function() {
        var id = $(this).data('customer_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/customer/status_deactive/" + id,
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



/// Banner Add //
$(document).ready(function() {
    $("#addbanner").submit(function(e) {
        e.preventDefault();
     
        var button_text = $('#button_text').val();
        if ((button_text.length == "") || (button_text.length == null)) {  
            $("#button_textcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#button_textcheck").html('** Please fill button text Field').css("color", "red");
            $('#button_textcheck').focus();
        }else{
            $('#button_textcheck').hide();
        }  
        var button_link = $('#button_link').val();
        if ((button_link.length == "") || (button_link.length == null)) {  
            $("#button_linkcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#button_linkcheck").html('** Please fill button Link Field').css("color", "red");
            $('#button_linkcheck').focus();
        }else{
            $('#button_linkcheck').hide();
        }  

        var banner_image1 = $('#banner_image1').val();
        if (banner_image1.length == "") {    
            $("#img1check").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#img1check").html('** Please Select banner Image').css("color", "red");
            $('#img1check').focus();
        } else {
            $('#img1check').hide();
        }    
        var banner_image = $('#banner_image').val();
        if (banner_image.length == "") {    
            $("#imgcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#imgcheck").html('** Please Select banner Image').css("color", "red");
            $('#imgcheck').focus();
        } else {
            $('#imgcheck').hide();
        } 
        var banner_status = $('#banner_status').val();
        if (banner_status.length == "") {    
            $("#bannerstatuscheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#bannerstatuscheck").html('** Please Select banner Status').css("color", "red");
            $('#bannerstatuscheck').focus();
        } else {
            $('#bannerstatuscheck').hide();
        }    
        if ((button_text != '') && (button_link != '') && (banner_status != '') && (banner_image != '') && (banner_image1 != '')) {
            // return false;
            var formData = new FormData(this);
            $.ajax({
                url: "/admin/banner/insert",
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
                          $('#responsecheck').html("banner Successfully Added").css("color", "green"); 
                          window.location.replace("/admin/banner");    
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


/// Get Update Banner Data ///
/// banner Edit ///
$(document).ready(function() {
    
    ///Show Data banner On Edit Modal /// 
    $('#showbanner_data').on('click', '.banner_edit', function() {
    var banner_id = $(this).data('banner_id');  
    var btn_text = $(this).data('btn_text');
    var btn_link = $(this).data('btn_link');
    var banner_image1 = $(this).data('banner_image1');
    var banner_image2 = $(this).data('banner_image2');
    var banner_status = $(this).data('banner_status');
    

    $('[name="banner_id_edit"]').val(banner_id);
    $('[name="button_text"]').val(btn_text);
    $('[name="button_link"]').val(btn_link);
    $("#banner_status_edit option[value="+banner_status+"]").attr('selected', 'selected');

   $('#shoimg1').attr('src', '/admin_assets/banner_images/'+banner_image1);
   $('#shoimg2').attr('src', '/admin_assets/banner_images/'+banner_image2); 
    $('#Modal_Edit').modal('show');
    
    
    });
    $('#showbanner_data').on('click', '.banner-br', function() {
        // alert("hello");
        $('#Modal_Edit').modal('show');   
    });
   
    });

    
    $('#close_banr').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#closed_bannr').click(function () {
        $('#Modal_Edit').modal('hide');   
    });
    $('#showbanner_data').on('click', '.banner_edit', function() {
        setTimeout(function() {
            $('#Modal_Edit').modal('show'); 
           }, 3000);
         
    });

    $('#closed_bannerdel').click(function () {
        $('#Modal_Delete').modal('hide');   
    });
    $('#closed_banner_del').click(function () {
        $('#Modal_Delete').modal('hide');   
    });

     /// Update banner  ///
$(document).ready(function() {
    $("#editbanner").submit(function(e) {
        e.preventDefault();
        
        var banner_id_edit = $('#banner_id_edit').val();
        // alert(size);
        if ((banner_id_edit.length == "") || (banner_id_edit.length == null)) {  
            $("#banner_id_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#banner_id_editcheck").html('** Please Dont Remove ID').css("color", "red");
            $('#banner_id_editcheck').focus();
        }else{
            $('#banner_id_editcheck').hide();
        }  

        var button_text = $('#button_text').val();
        // alert(size);
        if ((button_text.length == "") || (button_text.length == null)) {  
            $("#button_textcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#button_textcheck").html('** Please fill Button text field').css("color", "red");
            $('#button_textcheck').focus();
        }else{
            $('#button_textcheck').hide();
        }  
        var button_link = $('#button_link').val();
        
        if ((button_link.length == "") || (button_link.length == null)) {  
            $("#button_linkcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#button_linkcheck").html('** Please fill Button Link field').css("color", "red");
            $('#button_linkcheck').focus();
        }else{
            $('#button_linkcheck').hide();
        }  
       
        var banner_status_edit = $('#banner_status_edit').val();
        if (banner_status_edit.length == "") {    
            $("#banner_status_editcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#banner_status_editcheck").html('** Please Select banner Status').css("color", "red");
            $('#banner_status_editcheck').focus();
        } else {
            $('#banner_status_editcheck').hide();
        }    
        if ((button_text != '') && (button_link != '') && (banner_status_edit != '') && (banner_id_edit !='') ) {
            // return false;
            var formData = new FormData(this);
            var id = $('#banner_id_edit').val();
            $.ajax({
                url: "/admin/banner/edit/" + id,
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
                          $('#responsecheck').html("banner Successfully Updated").css("color", "green"); 
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

$(document).ready(function() {
    /// Delete Record banner ///
    $("#showbanner_data").on('click','.banner_delete',function () { 
        
     var banner_id = $(this).data('banner_id');
     $('#Modal_Delete').modal('show');
    $('[name="banner_id_delete"]').val(banner_id);
    });

    $("#delbanner").submit(function(e) {
     e.preventDefault();
    var  id = $('#banner_id_delete').val();
    if (!id == "") {
     var formData = new FormData(this);
     var id = $('#banner_id_delete').val();
    $.ajax({
        url: "/admin/banner/delete/" + id,
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
 

 });

 /// Status banner Active And Deactive ///
$(document).ready(function() {
    /// Active to deactive ///
    $('#showbanner_data').on('click', '.banner_status_ac', function() {
        var id = $(this).data('banner_id');   
        if (!id == "") { 
            
            // return false;
           $.ajax({
               url: "/admin/banner/status_active/" + id,
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
    $('#showbanner_data').on('click', '.banner_status_de', function() {
        var id = $(this).data('banner_id');   
        if (!id == "") { 
            // return false;
           $.ajax({
               url: "/admin/banner/status_deactive/" + id,
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