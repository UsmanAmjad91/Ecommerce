
<title>{{ $title }}</title>
@include('frontend_component.header')

@section('index','active')
  <!-- menu -->
  @include('frontend_component.menu')
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @foreach ($banner as $row) 
            <li>
              <div class="seq-model">
               
                <img data-seq src="{{asset('admin_assets/banner_images/'.$row->banner_image1)}}" width="200px" height="200px" alt="{{$row->banner_image1}}" />
                </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Men Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="{{$row->btn_link}}" class="aa-shop-now-btn aa-secondary-btn">{{$row->btn_text}}</a>
              </div>
            </li>
            <img  src="{{asset('admin_assets/banner_images/'.$row->banner_image1)}}" width="200px" height="200px"  />
            @endforeach
            <!-- single slide item -->
            {{-- <li>
              <div class="seq-model">
                <img data-seq src="{{asset('frontend/img/slider/2.jpg')}}" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>                
                <h2 data-seq>Wristwatch Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('frontend/img/slider/3.jpg')}}" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Jeans Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('frontend/img/slider/4.jpg')}}" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Exclusive Shoes</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="{{asset('frontend/img/slider/5.jpg')}}" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50% Off</span>                
                <h2 data-seq>Best Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>                    --}}
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="aa-promo-area">
             <!-- promo right -->
              <div class="row">
              @foreach ($home_categories as $row) 
              
                <div class="col-lg-4 no-padding">
                  <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner" id="cat_image">                      
                      <img src="{{asset('admin_assets/cat_images/'.$row->cat_image)}}" alt="img cat" width="200px" height="200px">                     
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        <h4><a href="{{url('category/'.$row->cat_slug)}}">For {{$row->cat_name}}</a></h4>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  @endforeach
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab" id="apncat">
                  @foreach ($home_categories as $row) 
                    <li id="cate"><a href="#cat{{$row->cat_id}}"  id="ct" data-target="#cat{{$row->cat_id}}" data-toggle="tab">{{$row->cat_name}}</a></li>
                      @php 
                    $cateid = $row->cat_id;
                      @endphp
                     
                    @endforeach
                    {{-- {{dd($cateid)}} --}}
                  </ul>
                  <div class="tab-content">
                    <!-- Start men product category -->
                    @php
                    $loop_count=1;
                    @endphp
                    @foreach($home_categories as $list)
                    @php
                    $cat_class="";
                    if($loop_count==1){
                      $cat_class="in active"; 
                      $loop_count++;
                    }
                    @endphp
                    <div class="tab-pane fade {{$cat_class}}" id="cat{{$list->cat_id}}">
                      <ul class="aa-product-catg">
                      @if(isset($home_categories_product[$list->cat_id][0]))
                       @foreach($home_categories_product[$list->cat_id] as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->product_slug)}}"><img src="{{asset('admin_assets/product_images/'.$productArr->image1)}}" alt="{{$productArr->product_name}}" width="200px" height="200px"></a>
                            <a class="aa-add-card-btn" href="{{url('product/'.$productArr->product_slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->product_slug)}}">{{$productArr->product_name}}</a></h4>
                             
                              <span class="aa-product-price">Rs {{$productArr->price}}</span><span class="aa-product-price"><del>Rs {{$productArr->mrp}}</del></span>
                            </figcaption>
                          </figure>                          
                        </li>  
                        @endforeach    
                        @else
                        <li>
                          <figure>
                            No data found
                          <figure>
                        <li>
                        @endif
                      </ul>
                    </div>
                    @endforeach
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('frontend/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#tranding" data-toggle="tab">Tranding</a></li>
                <li><a href="#discounted" data-toggle="tab">Discounted</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men featured category -->
                <div class="tab-pane fade in active" id="featured">
                  <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                  @foreach($featured as $row)
                  @if(!empty($row->product_id))
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$row->product_slug)}}"><img src="{{asset('admin_assets/product_images/'.$row->image1)}}" width="250px" height="120px" alt="{{$row->product_name}}"></a>
                            <a class="aa-add-card-btn" href="{{url('product/'.$row->product_slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$row->product_slug)}}">{{$row->product_name}}</a></h4>
                              <span class="aa-product-price">Rs {{$row->price}}</span><span class="aa-product-price"><del>Rs {{$row->mrp}}</del></span>
                            </figcaption>
                          </figure>                          
                        </li>  
                        @else
                        <li>
                          <figure>
                            No data found
                          <figure>
                        <li>
                          @endif
                        @endforeach                                                                               
                  </ul>
                </div>
                <!-- / popular product category -->
                
                <!-- start tranding product category -->
                <div class="tab-pane fade" id="tranding">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @foreach($tranding as $row)
                  @if(!empty($row->product_id))
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$row->product_slug)}}"><img src="{{asset('admin_assets/product_images/'.$row->image1)}}" width="250px" height="120px" alt="{{$row->product_name}}"></a>
                            <a class="aa-add-card-btn" href="{{url('product/'.$row->product_slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$row->product_slug)}}">{{$row->product_name}}</a></h4>
                              <span class="aa-product-price">Rs {{$row->price}}</span><span class="aa-product-price"><del>Rs {{$row->mrp}}</del></span>
                            </figcaption>
                          </figure>                         
                        </li>  
                        @else
                        <li>
                          <figure>
                            No data found
                          <figure>
                        <li>
                          @endif
                          @endforeach                                                                                          
                  </ul>
                </div>
                <!-- / featured product category -->

                <!-- start discounted product category -->
                <div class="tab-pane fade" id="discounted">
                  <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @foreach($discounted as $row)
                    @if(!empty($row->product_id))
                    
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$row->product_slug)}}"><img src="{{asset('admin_assets/product_images/'.$row->image1)}}" width="250px" height="120px" alt="{{$row->product_name}}"></a>
                            <a class="aa-add-card-btn" href="{{url('product/'.$row->product_slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$row->product_slug)}}">{{$row->product_name}}</a></h4>
                              <span class="aa-product-price">Rs {{$row->price}}</span><span class="aa-product-price"><del>Rs {{$row->mrp}}</del></span>
                            </figcaption>
                          </figure>                             
                        </li>  
                        @else
                        <li>
                          <figure>
                            No data found
                          </figure>
                        <li>
                          @endif
                        @endforeach                                                                                    
                  </ul>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('frontend/img/testimonial-img-2.jpg')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('frontend/img/testimonial-img-1.jpg')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('frontend/img/testimonial-img-3.jpg')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  {{-- <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('frontend/img/promo-banner-1.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('frontend/img/promo-banner-3.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                     <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>         
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('frontend/img/promo-banner-1.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section> --}}
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider" id="brandapn">
              @foreach($brand as $row)
              <li><a href="#"><img src="{{asset('admin_assets/brand_images/'.$row->brand_image)}}" height="80px" width="80px" alt="{{$row->brand}}"></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
  <!-- footer -->  
 @include('frontend_component.footer')
 {{-- <script>
  $.ajax({
                url: "/brand",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(brand) {
               console.log(brand);
              var i;
              var html = '';
              for (i = 0; i < brand.length; i++) {   

                html += '<li>'+
                      '<a href="#"><img src="admin_assets/brand_images/'+brand[i].brand_image+'" alt="java img"  width="50px" height="50px"></a>'+
                 '</li>';
               
                }
                
                $('#brandapn').append(html);
              
              }
            });
            
   
 </script> --}}
 <script>
  // $(document).ready(function () {
//     $("li #ct").on('click', function(){ 
//       var href = $('#ct').attr('href');
//        alert(href);
// // });  
//   });

 </script>