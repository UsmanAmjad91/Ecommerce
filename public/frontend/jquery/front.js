setTimeout(function() { 
   $('#sessmsg').hide();
}, 5000);
  
     var id =$('#id').data('id');
     $('#product_id').val(id);
     var p_id =$('#p_id').data('p_id');
      $('#pa_id').val(p_id);
 
    var gaProperty = 'UA-120201777-1';
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }

    function gaOptout() {
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2045 23:59:59 UTC; path=/';
        window[disableStr] = true;
        alert('Google Tracking has been deactivated');
    }
    


    $("#clr").css("background", $("#clr").attr("data-color"));
    $("#clr").css("border", '3px solid black');
 
  
    $(".image2").mouseenter(function() {
        var image2 = $(this).data('lens-image');
        $('#img1').attr('src', image2);
        $("#bigshow").attr('data-lens-image', image2);
    });
    $(".image3").mouseenter(function() {
        var image3 = $(this).data('lens-image');
        $('#img1').attr('src', image3);
        $("#bigshow").attr('data-lens-image', image3);
    });
    $(".image4").mouseenter(function() {
        var image4 = $(this).data('lens-image');
        $('#img1').attr('src', image4);
        $("#bigshow").attr('data-lens-image', image4);
    });
    $(".image1").mouseenter(function() {
        var image1 = $(this).data('lens-image');
        $('#img1').attr('src', image1);
        $("#bigshow").attr('data-lens-image', image1);
    });
 
  
  function changeimage_color(img){
    // console.log("welcome");
    $('.simpleLens-big-image-container').html('<a  href="javascript:void(0)" id="bigshow" data-lens-image="'+img+'"class="simpleLens-lens-image"><img src=""id="'+img1+'" class="simpleLens-big-image"></a>')
   var color = $('#clr').data('color');
    $('#color_get').val(color);
    
}

  function Showcolor(size){
    $('#size_get').val(size);
   $('#clr').hide();
   $('.size_'+size).show();
   $('.link_size').css("border",'0');
   $('#size_'+size).css("border",'2px solid black');
   
  }
 
  
    
   function addtocart(id,size_str,color_str){
   
    var product_id =$('#product_id').val();
    var pa_id = $('#pa_id').val();
    var name = $('#name').data('name');
    var price = $('#price').data('price');
    var warranty = $('#warranty').data('warranty');
    var lead_time = $('#lead_time').data('lead');
    var qty =$('#qty').val();
    var category =$('#category').data('category');
    var brand =$('#brand').data('brand');
    var color = $('#color_get').val();
    var size =$('#size_get').val();
      // console.log(size,color,brand,category,qty,lead_time,warranty,price,name);
      if((size == 0) && (color == 0)){
        size_str = "no";
        color_str = 'no';
      }

      if ((size.length == "") && (size != 'no')) {  
            $("#sizecheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#sizecheck").html('** Please Select Size').css("color", "red");
            $('#sizecheck').focus();
        }else{
            $('#sizecheck').hide();
        } 
       if ((color.length == "") && (color != 'no')) {  
            $("#colorcheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#colorcheck").html('** Please Select Color').css("color", "red");
            $('#colorcheck').focus();
        }else{
            $('#colorcheck').hide();
        }  
         
        if ((qty.length == "") || (qty.length == null)) {  
            $("#qtycheck").show().delay(5000).queue(function(n) {
                $(this).hide(); n();
              });
            $("#qtycheck").html('** Please Select Qty').css("color", "red");
            $('#qtycheck').focus();
        }else{
            $('#qtycheck').hide();
        }  


        if((size != '') && (color !='') && (qty !='')){
            $.ajax({
                url: "/addto_cart",
                type: 'post',
                data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(msg) {
                    if (msg.status == 200) {                    
                        $("#responseeditcheck").show().delay(5000).queue(function(n) {
                            $(this).hide(); n();
                          });
                          $('#responseeditcheck').html("Added Successfully ").css("color", "green"); 
                          
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

   }
   function add_tocart(id,size_str,color_str,patrr_id){
   
      $('#size_get').val(size_str);
      $('#color_get').val(color_str);
      $('#product_id').val(id);
      $('#pa_id').val(patrr_id);
     
     var size = $('#size_get').val();
     var color = $('#color_get').val();
     var product_id = $('#product_id').val();
      var qty = $('#qty').val();
     var pa_id = $('#pa_id').val();
     if((size == 0) && (color == 0)){
      size_str = "no";
      color_str = 'no';
    }

    if ((size.length == "") && (size != 'no')) {  
          $("#sizecheck").show().delay(5000).queue(function(n) {
              $(this).hide(); n();
            });
          $("#sizecheck").html('** Please Select Size').css("color", "red");
          $('#sizecheck').focus();
      }else{
          $('#sizecheck').hide();
      } 
     if ((color.length == "") && (color != 'no')) {  
          $("#colorcheck").show().delay(5000).queue(function(n) {
              $(this).hide(); n();
            });
          $("#colorcheck").html('** Please Select Color').css("color", "red");
          $('#colorcheck').focus();
      }else{
          $('#colorcheck').hide();
      }  
       
      if ((qty.length == "") || (qty.length == null)) {  
          $("#qtycheck").show().delay(5000).queue(function(n) {
              $(this).hide(); n();
            });
          $("#qtycheck").html('** Please Select Qty').css("color", "red");
          $('#qtycheck').focus();
      }else{
          $('#qtycheck').hide();
      }  


      if((size != '') && (color !='') && (qty !='')){
         // alert("hello");
          $.ajax({
              url: "/addto_cart",
              type: 'post',
              data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              dataType: 'json',
              success: function(msg) {
                  if (msg.status == 200) {                    
                      $("#responseeditcheck").show().delay(5000).queue(function(n) {
                          $(this).hide(); n();
                        });
                        $('#responseeditcheck').html("Added Successfully ").css("color", "green"); 
                        // console.log(msg)
                        
                  } else{
                     
                  if (msg.error) { 
                     // console.log(error)   
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
  
   
  }

  function add_tocart_f(id,size_str,color_str,patrr_id){
   
   $('#size_get').val(size_str);
   $('#color_get').val(color_str);
   $('#product_id').val(id);
   $('#pa_id').val(patrr_id);
  
  var size = $('#size_get').val();
  var color = $('#color_get').val();
  var product_id = $('#product_id').val();
   var qty = $('#qty').val();
  var pa_id = $('#pa_id').val();
  if((size == 0) && (color == 0)){
   size_str = "no";
   color_str = 'no';
 }

 if ((size.length == "") && (size != 'no')) {  
       $("#sizecheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#sizecheck").html('** Please Select Size').css("color", "red");
       $('#sizecheck').focus();
   }else{
       $('#sizecheck').hide();
   } 
  if ((color.length == "") && (color != 'no')) {  
       $("#colorcheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#colorcheck").html('** Please Select Color').css("color", "red");
       $('#colorcheck').focus();
   }else{
       $('#colorcheck').hide();
   }  
    
   if ((qty.length == "") || (qty.length == null)) {  
       $("#qtycheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#qtycheck").html('** Please Select Qty').css("color", "red");
       $('#qtycheck').focus();
   }else{
       $('#qtycheck').hide();
   }  


   if((size != '') && (color !='') && (qty !='')){
      // alert("hello");
       $.ajax({
           url: "/addto_cart",
           type: 'post',
           data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           dataType: 'json',
           success: function(msg) {
               if (msg.status == 200) {                    
                   $("#responseeditcheck").show().delay(5000).queue(function(n) {
                       $(this).hide(); n();
                     });
                     $('#responseeditcheck').html("Added Successfully ").css("color", "green"); 
                     // console.log(msg)
                     
               } else{
                  
               if (msg.error) { 
                  // console.log(error)   
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


}
 
function add_tocart_t(id,size_str,color_str,patrr_id){
   
   $('#size_get').val(size_str);
   $('#color_get').val(color_str);
   $('#product_id').val(id);
   $('#pa_id').val(patrr_id);
  
  var size = $('#size_get').val();
  var color = $('#color_get').val();
  var product_id = $('#product_id').val();
   var qty = $('#qty').val();
  var pa_id = $('#pa_id').val();
  if((size == 0) && (color == 0)){
   size_str = "no";
   color_str = 'no';
 }

 if ((size.length == "") && (size != 'no')) {  
       $("#sizecheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#sizecheck").html('** Please Select Size').css("color", "red");
       $('#sizecheck').focus();
   }else{
       $('#sizecheck').hide();
   } 
  if ((color.length == "") && (color != 'no')) {  
       $("#colorcheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#colorcheck").html('** Please Select Color').css("color", "red");
       $('#colorcheck').focus();
   }else{
       $('#colorcheck').hide();
   }  
    
   if ((qty.length == "") || (qty.length == null)) {  
       $("#qtycheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#qtycheck").html('** Please Select Qty').css("color", "red");
       $('#qtycheck').focus();
   }else{
       $('#qtycheck').hide();
   }  


   if((size != '') && (color !='') && (qty !='')){
      // alert("hello");
       $.ajax({
           url: "/addto_cart",
           type: 'post',
           data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           dataType: 'json',
           success: function(msg) {
               if (msg.status == 200) {                    
                   $("#responseeditcheck").show().delay(5000).queue(function(n) {
                       $(this).hide(); n();
                     });
                     $('#responseeditcheck').html("Added Successfully ").css("color", "green"); 
                     // console.log(msg)
                     
               } else{
                  
               if (msg.error) { 
                  // console.log(error)   
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


}

function add_tocart_d(id,size_str,color_str,patrr_id){
   
   $('#size_get').val(size_str);
   $('#color_get').val(color_str);
   $('#product_id').val(id);
   $('#pa_id').val(patrr_id);
  
  var size = $('#size_get').val();
  var color = $('#color_get').val();
  var product_id = $('#product_id').val();
   var qty = $('#qty').val();
  var pa_id = $('#pa_id').val();
  if((size == 0) && (color == 0)){
   size_str = "no";
   color_str = 'no';
 }

 if ((size.length == "") && (size != 'no')) {  
       $("#sizecheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#sizecheck").html('** Please Select Size').css("color", "red");
       $('#sizecheck').focus();
   }else{
       $('#sizecheck').hide();
   } 
  if ((color.length == "") && (color != 'no')) {  
       $("#colorcheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#colorcheck").html('** Please Select Color').css("color", "red");
       $('#colorcheck').focus();
   }else{
       $('#colorcheck').hide();
   }  
    
   if ((qty.length == "") || (qty.length == null)) {  
       $("#qtycheck").show().delay(5000).queue(function(n) {
           $(this).hide(); n();
         });
       $("#qtycheck").html('** Please Select Qty').css("color", "red");
       $('#qtycheck').focus();
   }else{
       $('#qtycheck').hide();
   }  


   if((size != '') && (color !='') && (qty !='')){
      // alert("hello");
       $.ajax({
           url: "/addto_cart",
           type: 'post',
           data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           dataType: 'json',
           success: function(msg) {
               if (msg.status == 200) {                    
                   $("#responseeditcheck").show().delay(5000).queue(function(n) {
                       $(this).hide(); n();
                     });
                     $('#responseeditcheck').html("Added Successfully ").css("color", "green"); 
                     // console.log(msg)
                     
               } else{
                  
               if (msg.error) { 
                  // console.log(error)   
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


}

function updateqty(id,patrr_id,size_str,color_str,totalprice){
$('#size_get').val(size_str);
$('#color_get').val(color_str);
$('#product_id').val(id);
$('#pa_id').val(patrr_id);
 var qt = $("#update_qty"+patrr_id).val()
 $('#qty').val(qt);

var size = $('#size_get').val();
var color = $('#color_get').val();
var product_id = $('#product_id').val();
var qty = $('#qty').val();
var pa_id = $('#pa_id').val();

if((size == 0) && (color == 0)){
size_str = "no";
color_str = 'no';
}
//    console.log(price) ;
// return false;
if((size != '') && (color !='') && (qty !='')){
     $.ajax({
         url: "/addto_cart",
         type: 'post',
         data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         dataType: 'json',
         success: function(msg) {
            $('#totalprice_'+patrr_id).html(qty*totalprice);
             if (msg.status == 200) {                    
                 $("#responseeditcheck").show().delay(5000).queue(function(n) {
                     $(this).hide(); n();
                   });
                   $('#responseeditcheck').html("Qty Update Successfully ").css("color", "green"); 
                   // console.log(msg)
                   
             } else{
                
             if (msg.error) { 
                // console.log(error)   
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
}
function del_pro_cart(id,patrr_id,size_str,color_str){
    $('#size_get').val(size_str);
    $('#color_get').val(color_str);
    $('#product_id').val(id);
    $('#pa_id').val(patrr_id);
    $('#qty').val(0);
     var qt = $("#cart_box"+patrr_id).hide();

 var size = $('#size_get').val();
var color = $('#color_get').val();
var product_id = $('#product_id').val();
var qty = $('#qty').val();
var pa_id = $('#pa_id').val();


    $.ajax({
        url: "/addto_cart",
        type: 'post',
        data:{product_id:product_id,pa_id:pa_id,color:color,size:size,qty:qty},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(msg) {
          
            if (msg.status == 200) {                    
                $("#responseeditcheck").show().delay(5000).queue(function(n) {
                    $(this).hide(); n();
                  });
                  $('#responseeditcheck').html("Product cart Deleted ").css("color", "green");   
            } else{
               
            if (msg.error) { 
               // console.log(error)   
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