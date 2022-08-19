<title>{{ $title }}</title>
@include('frontend_component.header')

@section('index', 'active')
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

                                <img data-seq src="{{ asset('admin_assets/banner_images/' . $row->banner_image1) }}"
                                    width="200px" height="200px" alt="{{ $row->banner_image1 }}" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Men Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="{{ $row->btn_link }}"
                                    class="aa-shop-now-btn aa-secondary-btn">{{ $row->btn_text }}</a>
                            </div>
                        </li>
                        <img src="{{ asset('admin_assets/banner_images/' . $row->banner_image1) }}" width="200px"
                            height="200px" />
                    @endforeach
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
                                            <img src="{{ asset('admin_assets/cat_images/' . $row->cat_image) }}"
                                                alt="img cat" width="200px" height="200px">
                                            <div class="aa-prom-content">
                                                <span>Exclusive Item</span>
                                                <h4><a href="{{ url('category/' . $row->cat_slug) }}">For
                                                        {{ $row->cat_name }}</a></h4>
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
                                    <li id="cate"><a href="#cat{{ $row->cat_id }}" id="ct"
                                            data-target="#cat{{ $row->cat_id }}"
                                            data-toggle="tab">{{ $row->cat_name }}</a></li>
                                    @php
                                        $cateid = $row->cat_id;
                                    @endphp
                                @endforeach
                                {{-- {{dd($cateid)}} --}}
                            </ul>
                            <div class="tab-content">
                                <!-- Start men product category -->
                                @php
                                    $loop_count = 1;
                                @endphp
                                @foreach ($home_categories as $list)
                                    @php
                                        $cat_class="";
                                        if ($loop_count == 1) {
                                            $cat_class="in active";
                                            $loop_count++;
                                        }
                                    @endphp
                                    <div class="tab-pane fade {{ $cat_class }}" id="cat{{ $list->cat_id }}">
                                        <ul class="aa-product-catg">
                                            @if (isset($home_categories_product[$list->cat_id][0]))
                                                @foreach ($home_categories_product[$list->cat_id] as $productArr)
                                                    <li>
                                                        <figure>

                                                            <a class="aa-product-img"
                                                                href="{{ url('/product' . $productArr->product_slug) }}"><img
                                                                    src="{{ asset('admin_assets/product_images/' . $productArr->image1) }}"
                                                                    alt="{{ $productArr->product_name }}"
                                                                    width="200px" height="200px"></a>
                                                            <a class="aa-add-card-btn" href="javascript:void(0);"
                                                                onclick="add_tocart('{{ $productArr->product_id }}','{{ $productArr->size }}','{{ $productArr->color }}','{{ $productArr->patrr_id }}')"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                            <figcaption>
                                                                <h4 class="aa-product-title"><a
                                                                        href="{{ url('/product' . $productArr->product_slug) }}">{{ $productArr->product_name }}</a>
                                                                </h4>

                                                                <span class="aa-product-price">Rs
                                                                    {{ $productArr->price }}</span><span
                                                                    class="aa-product-price"><del>Rs
                                                                        {{ $productArr->mrp }}</del></span>
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
                        <a href="#"><img src="{{ asset('frontend/img/fashion-banner.jpg') }}"
                                alt="fashion banner img"></a>
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
                                    @foreach ($featured as $row)
                                        @if (!empty($row->product_id))
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img"
                                                        href="{{ url('/product' . $row->product_slug) }}"><img
                                                            src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                            width="250px" height="120px"
                                                            alt="{{ $row->product_name }}"></a>
                                                    <a class="aa-add-card-btn" href="javascript:void(0)"
                                                        onclick="add_tocart_f('{{ $row->product_id }}','{{ $row->size }}','{{ $row->color }}','{{ $row->patrr_id }}')"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="{{ url('/product' . $row->product_slug) }}">{{ $row->product_name }}</a>
                                                        </h4>
                                                        <span class="aa-product-price">Rs
                                                            {{ $row->price }}</span><span
                                                            class="aa-product-price"><del>Rs
                                                                {{ $row->mrp }}</del></span>
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
                                    @foreach ($tranding as $row)
                                        @if (!empty($row->product_id))
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img"
                                                        href="{{ url('/product' . $row->product_slug) }}"><img
                                                            src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                            width="250px" height="120px"
                                                            alt="{{ $row->product_name }}"></a>
                                                    <a class="aa-add-card-btn" href="javascript:void(0)"
                                                        onclick="add_tocart_t('{{ $row->product_id }}','{{ $row->size }}','{{ $row->color }}','{{ $row->patrr_id }}')"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="{{ url('/product' . $row->product_slug) }}">{{ $row->product_name }}</a>
                                                        </h4>
                                                        <span class="aa-product-price">Rs
                                                            {{ $row->price }}</span><span
                                                            class="aa-product-price"><del>Rs
                                                                {{ $row->mrp }}</del></span>
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
                                    @foreach ($discounted as $row)
                                        @if (!empty($row->product_id))
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img"
                                                        href="{{ url('/product' . $row->product_slug) }}"><img
                                                            src="{{ asset('admin_assets/product_images/' . $row->image1) }}"
                                                            width="250px" height="120px"
                                                            alt="{{ $row->product_name }}"></a>
                                                    <a class="aa-add-card-btn" href="javascript:void(0)"
                                                        onclick="add_tocart_d('{{ $row->product_id }}','{{ $row->size }}','{{ $row->color }}','{{ $row->patrr_id }}')"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="{{ url('/product' . $row->product_slug) }}">{{ $row->product_name }}</a>
                                                        </h4>
                                                        <span class="aa-product-price">Rs
                                                            {{ $row->price }}</span><span
                                                            class="aa-product-price"><del>Rs
                                                                {{ $row->mrp }}</del></span>
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

<!-- Client Brand -->
<section id="aa-client-brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-client-brand-area">
                    <ul class="aa-client-brand-slider" id="brandapn">
                        @foreach ($brand as $row)
                            <li><a href="#"><img
                                        src="{{ asset('admin_assets/brand_images/' . $row->brand_image) }}"
                                        height="80px" width="80px" alt="{{ $row->brand }}"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="size_get">
<input type="hidden" id="color_get">
<input type="hidden" id="product_id">
<input type="hidden" id="pa_id">
<input type="hidden" id="qty" value="1">
<!-- / Client Brand -->
<script src="{{ asset('frontend/js/sequence.js') }}"></script>
<script src="{{ asset('frontend/js/sequence-theme.modern-slide-in.js') }}"></script>

<!-- footer -->
@include('frontend_component.footer')
