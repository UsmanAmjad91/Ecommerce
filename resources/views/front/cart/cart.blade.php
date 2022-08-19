<title>{{ $title }}</title>
@include('frontend_component.header')
<!-- menu -->
@include('frontend_component.menu')
<!-- / menu -->
<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <form action="">
                @if(!empty($cart))
                <div class="table-responsive">
                 
                   <table class="table">
                     <thead>
                       <tr>
                         <th>Delete</th>
                         <th>Image</th>
                         <th>Product</th>
                         <th>Price</th>
                         <th>Quantity</th>
                         <th>Total Price</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                      @foreach($cart as $row)
                      <h6 id="responseeditcheck"></h6>
                       <tr id="cart_box{{$row->patrr_id}}">
                         <td><a class="remove" onclick="del_pro_cart('{{$row->product_id}}','{{$row->patrr_id}}','{{$row->size }}','{{ $row->color }}')" href="javascript:void(0)" > <fa class="fa fa-close"></fa></a></td>
                         <td><a href="{{url('/product'.$row->product_slug)}}"><img src="{{asset('admin_assets/product_images/'.$row->image1)}}" alt="img"></a></td>
                         <td><a class="aa-cart-title" href="{{url('/product'.$row->product_slug)}}">{{$row->product_name}}</a><br>
                       
                          @if(!empty($row->size)) 
                        <p ><span class="text-danger">SIZE : </span>{{$row->size }}</p>
                        @endif
                      
                        @if(!empty($row->color)) 
                         <p ><span class="text-danger">Color : </span>{{ $row->color }}</p>
                        @endif
                         </td>
                         <td>RS {{$row->price}}</td>
                         <td><input class="aa-cart-quantity" type="number" value="{{$row->qty_cart}}" id="update_qty{{$row->patrr_id}}" onchange="updateqty('{{$row->product_id}}','{{$row->patrr_id}}','{{$row->size }}','{{ $row->color }}','{{$row->price}}')"></td>
                       
                         <td id="totalprice_{{$row->patrr_id}}" >RS {{$row->price * $row->qty_cart}}</td>
                       </tr>
                       @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Checkout">
                        </td>
                      </tr>
                     
                       </tbody>
                   </table>
                  
                 </div>
                   <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Cart Totals</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <tr>
                      <th>Subtotal</th>
                      <td>$450</td>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <td>$450</td>
                    </tr>
                  </tbody>
                </table>
                <a href="{{url('/checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
              </div>
                 @else
                 <h3>Cart Empty</h3>
                 @endif
              </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" id="size_get" >
  <input type="hidden" id="color_get" >
  <input type="hidden" id="product_id">
  <input type="hidden" id="pa_id" >
  <input type="hidden" id="qty" >
  <!-- / Cart view section -->
  <!-- footer -->
@include('frontend_component.footer')