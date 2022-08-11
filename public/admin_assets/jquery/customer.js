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