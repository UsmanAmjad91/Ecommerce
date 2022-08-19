<title>{{ $title }}</title>
@include('frontend_component.header')
@section('index', 'active')
<!-- menu -->
@include('frontend_component.menu')
<!-- / menu -->

@foreach ($product_view as $row)
    <input type="hidden" id="id" name="id" data-id={{$row->product_id}} >
    <input type="hidden" id="p_id" name="p_id" data-p_id={{$row->patrr_id}} >
    <!-- product category -->
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-12 text-center">
                                    @if (session()->has('msgcart'))
                                    <h1 class="ml-3 text-sm font-bold text-green" id="sessmsg">{{ session()->get('msgcart') }}</h1>
                                    @endif
                                    <h6 id="responseeditcheck"></h6>
                                  </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container">

                                                    <a id="bigshow"
                                                       href="javascript:void(0)" data-lens-image="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                        class="simpleLens-lens-image">
                                                        <img src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                            id="img1" class="simpleLens-big-image">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="gallery">
                                                <a  href="javascript:void(0)" data-big-image="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                    data-lens-image="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                    class="simpleLens-thumbnail-wrapper image1" href="#">
                                                    <img src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                        id="img1" style="height:50px; width:50px;">
                                                </a>
                                                <a   href="javascript:void(0)" data-big-image="{{ asset('admin_assets/product_images/' . $row->image2) }}"
                                                    data-lens-image="{{ asset('admin_assets/product_images/' . $row->image2) }}"
                                                    class="simpleLens-thumbnail-wrapper image2" href="#">
                                                    <img src="{{ asset('admin_assets/product_images/' . $row->image2) }}"
                                                        id="img2" style="height:50px; width:50px;">
                                                </a>
                                                <a  href="javascript:void(0)" data-big-image="{{ asset('admin_assets/product_images/' . $row->image3) }}"
                                                    data-lens-image="{{ asset('admin_assets/product_images/' . $row->image3) }}"
                                                    class="simpleLens-thumbnail-wrapper image3" href="#">
                                                    <img src="{{ asset('admin_assets/product_images/' . $row->image3) }}"
                                                        id="img3" style="height:50px; width:50px;">
                                                </a>
                                                <a  href="javascript:void(0)" data-big-image="img/view-slider/medium/polo-shirt-4.png"
                                                    data-lens-image="{{ asset('admin_assets/product_images/' . $row->image4) }}"
                                                    class="simpleLens-thumbnail-wrapper image4" href="#">
                                                    <img src="{{ asset('admin_assets/product_images/' . $row->image4) }}"
                                                        id="img4" style="height:50px; width:50px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3 id="name" data-name="{{ $row->product_name }}">{{ $row->product_name }}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price" data-price="{{$row->price}}" id="price">RS {{ $row->price }} </span> <span
                                                class="aa-product-view-price"><del class="text-danger"> RS
                                                    {{ $row->mrp }}</del></span>
                                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>

                                            @if ($row->lead_time != '')
                                                <p class="lead_time" data-lead="{{ $row->lead_time }}" id="lead_time"><span>Delivery Time : </span>
                                                    {{ $row->lead_time }}</p>
                                            @endif
                                            <p class="warranty" data-warranty="{{ $row->warranty }}" id="warranty"><span>Warranty : </span> {{ $row->warranty }}</p>
                                        </div>
                                        <p>
                                            {{ $row->short_desc }}
                                        </p>
                                        <h4>Size</h4>
                                        <div class="aa-prod-view-size">
                                              @php 
                                             $arr_size=array();
                                             foreach ($product_view as $row_size) {
                                                $arr_size[]=$row_size->size;
                                             }
                                           
                                             $arrsize = array_unique($arr_size);
                                             
                                            @endphp
                                          @foreach($arrsize as $rowsize)
                                            @if ($rowsize != '')
                                                <a href="javascript:void(0)" id="size_{{$rowsize}}" class="link_size" onclick="Showcolor('{{$rowsize}}')">{{ $rowsize }}</a>
                                            @endif
                                            @endforeach
                                        </div>
                                        <h6 id="sizecheck"></h6>
                                        <h4>Color</h4>
                                        <div class="aa-color-tag">
                                            @if ($row->color != '')
                                                <a href="javascript:void(0)" id="clr" class="aa-color-{{ $row->color }}  size_{{$row->size}}"
                                                    data-color="{{ $row->color }}"  onclick="changeimage_color('{{ asset('admin_assets/product_images/' . $row->imageatrr)}}')"></a>
                                            @endif
                                        </div>
                                        <h6 id="colorcheck"></h6>
                                        <div class="aa-prod-quantity">
                                            <label>Quantity</label>
                                            <h6 id="qtycheck"></h6>
                                                <select  class="selectpicker col-2" id="qty" name="qty">
                                                    <option  value="" selected>Select</option>
                                                    @for($i=1 ; $i<11 ; $i++ )
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>

                                               

                                            <p class="aa-prod-category">
                                                Category: <a href="#" data-category="{{$row->cat_name}}"   id="category">{{ $row->cat_name }}</a>
                                            </p>
                                            
                                            <p class="aa-prod-category">
                                                Brand: <a href="#"    data-brand="{{$row->brand}}"  id="brand">{{ $row->brand }}</a>
                                            </p>
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="addtocart('{{$row->product_id}}')">Add To Cart</a>
                                            {{-- <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                     <a class="aa-add-to-cart-btn" href="#">Compare</a> --}}
                                        </div>
                                        <h6 id="responsecheck"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a>
                                </li>
                                <li><a href="#uses" data-toggle="tab">Uses</a></li>
                                <li><a href="#review" data-toggle="tab">Reviews</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    {{ $row->desc }}
                                </div>
                                <div class="tab-pane fade in active" id="technical_specification">
                                    {{ $row->technical_specification }}
                                </div>
                                <div class="tab-pane fade in active" id="uses">
                                    {{ $row->uses }}
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4>2 Reviews for T-Shirt</h4>
                                        <ul class="aa-review-nav">
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object"
                                                                src="{{ asset('frontend/img/testimonial-img-3.jpg') }}"
                                                                alt="girl image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong>Marla Jobs</strong> -
                                                            <span>March 26, 2016</span></h4>
                                                        <div class="aa-product-rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                        <h4>Add a review</h4>
                                        <div class="aa-your-rating">
                                            <p>Your Rating</p>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </div>
                                        <!-- review form -->
                                        <form action="" class="aa-review-form">
                                            <div class="form-group">
                                                <label for="message">Your Review</label>
                                                <textarea class="form-control" rows="3" id="message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@gmail.com">
                                            </div>

                                            <button type="submit"
                                                class="btn btn-default aa-review-submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
<!-- Related product -->
<input type="hidden" id="size_get" >
<input type="hidden" id="color_get" >
<input type="hidden" id="product_id" name="product_id">
<input type="hidden" id="pa_id" name="pa_id">
<div class="aa-product-related-item">
    <h3>Related Products</h3>
    <ul class="aa-product-catg aa-related-item-slider">
        <!-- start single product item -->
        @foreach ($product_relate as $row)
            <li>
                <figure>
                    <a class="aa-product-img" href="{{ url('/product' . $row->product_slug) }}"><img
                            src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                            style="height: 160px; width:250px; " alt="{{ $row->image1 }}"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a
                                href="{{ url('/product' . $row->product_slug) }}">{{ $row->product_name }}</a></h4>
                        <span class="aa-product-price">RS {{ $row->price }}</span><span
                            class="aa-product-price"><del>{{ $row->mrp }}</del></span>
                    </figcaption>
                </figure>
                {{-- <div class="aa-product-hvr-content">
                   <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                   <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                   <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                 </div> --}}
                <!-- product badge -->
                <span class="aa-badge aa-sale" href="#">SALE!</span>
            </li>
        @endforeach
    </ul>

    <!-- quick view modal -->
    @foreach ($product_view as $row)
        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                        <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div class="simpleLens-gallery-container" id="demo-1">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container">
                                                {{-- <a class="simpleLens-lens-image" data-lens-image="{{asset('admin_assets/product_images/'.$row->image1)}}"> --}}
                                                <img src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                    class="simpleLens-big-image">
                                                {{-- </a> --}}
                                            </div>
                                        </div>
                                        <div class="simpleLens-thumbnails-container">
                                            {{-- <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="{{asset('admin_assets/product_images/'.$row->image2)}}"
                                    data-big-image="{{asset('admin_assets/product_images/'.$row->image2)}}"> --}}
                                            <img src="{{ asset('admin_assets/product_images/' . $row->image2) }}">
                                            {{-- </a> --}}
                                            {{-- <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="{{asset('admin_assets/product_images/'.$row->image3)}}"
                                    data-big-image="{{asset('admin_assets/product_images/'.$row->image3)}}"> --}}
                                            <img src="{{ asset('admin_assets/product_images/' . $row->image3) }}">
                                            {{-- </a> --}}

                                            {{-- <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="{{asset('admin_assets/product_images/'.$row->image4)}}"
                                    data-big-image="{{asset('admin_assets/product_images/'.$row->image4)}}"> --}}
                                            <img src="{{ asset('admin_assets/product_images/' . $row->image4) }}">
                                            {{-- </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="aa-product-view-content">
                                    <h3>T-Shirt</h3>
                                    <div class="aa-price-block">
                                        <span class="aa-product-view-price">RS {{ $row->price }}</span>
                                        <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                    </div>
                                    <p>RS {{ $row->short_desc }}</p>
                                    <h4>RS {{ $row->product_name }}</h4>
                                    <div class="aa-prod-view-size">
                                        <a href="#">S</a>
                                        <a href="#">M</a>
                                        <a href="#">L</a>
                                        <a href="#">XL</a>
                                    </div>
                                    <div class="aa-prod-quantity">
                                        <form action="">
                                            <select name="" id="">
                                                <option value="0" selected="1">1</option>
                                                <option value="1">2</option>
                                                <option value="2">3</option>
                                                <option value="3">4</option>
                                                <option value="4">5</option>
                                                <option value="5">6</option>
                                            </select>
                                        </form>
                                        <p class="aa-prod-category">
                                            Category: <a href="#">Polo T-Shirt</a>
                                        </p>
                                    </div>
                                    <div class="aa-prod-view-bottom">
                                        <a href="#" class="aa-add-to-cart-btn"><span
                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- / quick view modal -->
</div>
</div>
</div>
</div>
</div>
</section>
<!-- / product category -->

<!-- footer -->
@include('frontend_component.footer')
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '{{asset('frontend/js/analytics.js') }}', 'ga');
ga('create', 'UA-120201777-1', 'auto');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview');
