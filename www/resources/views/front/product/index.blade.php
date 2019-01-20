@extends('layouts.page')

@section('title', '商品資訊 - ')

@section('content')
<article class="mainContainer products">
    <section class="mainBanner" id="Banner">
        <div class="bgPic" style="background-image: url(images/products_el_06.jpg)">
            <img src="images/pdBanner_58.jpg" class="imgFit" alt="商品資訊">
        </div>
        <h1>
                Products
            </h1>
        <a href="#" class="scrollDown">
            <p>SCROLL</p>
            <img src="images/arrow_down_51.png" alt="">
        </a>
    </section>
    <!--蜂蜜蛋糕-->
    @if($item1)
    <section class="product_content" id="addProduct_1">
        <div class="mainPicContain mobileHidden" style="background-image: url({{url($item1->cover)}})" id="a_content1">
            <img src="{{url($item1->cover)}}" alt="{{$item1->name}} {{$item1->name_en}}">
            <div class="textContent right bottom">
                <div class="box">
                    <h3>{!! nl2br($item1->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item1->name) !!}</h2>
                    <p>{!! nl2br($item1->intro) !!}</p>
                </div>
            </div>
        </div>
        <div class="mainPicContain mobileShow" style="background-image: url({{url($item1->cover_mb)}})">
            <img src="{{url($item1->cover_mb)}}" alt="{{$item1->name}} {{$item1->name_en}}">
            <div class="textContent near_right bottom">
                <div class="box">
                    <h3>{!! nl2br($item1->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item1->name) !!}</h2>
                    <p>{!! nl2br($item1->intro) !!}</p>
                </div>
            </div>
        </div>

        <div class="productsBar">
            <!-- 產品清單 -->
            <div class="container swiper-container">
                <div class="BarNext"> <!-- 下一步按鈕 -->
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="BarPrev"> <!-- 上一步按鈕 -->
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="productsList swiper-wrapper">
                    @foreach($item1->product as $k => $v)
                    <a href="{{url('product',$v)}}" class="swiper-slide">
                        <picture>
                            <img src="{{url($v->cover)}}" alt="{{$v->name}} {{$v->taste}}">
                        </picture>
                        <div class="detial">
                            <h2 class="PdName">{{$v->name}}</h2>
                            <span class="taste">{{$v->taste}}</span>
                            <h4 class="slogan">{{$v->subtitle}}</h4>
                            <p class="profile" limit="800px-60">
                            {!! nl2br($v->intro) !!}
                            </p>
                            <span class="btn btnbox">
                                SHOP NOW
                                <span class="line1"></span>
                            <span class="line2"></span>
                            </span>
                        </div>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($item2)
    <!--土鳳梨-->
    <section class="product_content" id="addProduct_2">
        <div class="mainPicContain mobileHidden" style="background-image: url({{url($item2->cover)}})">
            <img src="{{url($item2->cover)}}" alt="{{$item2->name}} {{$item2->name_en}}">
            <div class="textContent near_left v_center">
                <div class="box">
                    <h3>{!! nl2br($item2->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item2->name) !!}</h2>
                    <p>{!! nl2br($item2->intro) !!}</p>
                </div>
            </div>
        </div>
        <div class="mainPicContain mobileShow" style="background-image: url({{url($item2->cover_mb)}})">
            <img src="{{url($item2->cover_mb)}}" alt="{{$item2->name}} {{$item2->name_en}}">
            <div class="textContent near_right bottom">
                <div class="box">
                    <h3>{!! nl2br($item2->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item2->name) !!}</h2>
                    <p>{!! nl2br($item2->intro) !!}</p>
                </div>
            </div>
        </div>
        <div class="productsBar ">
            <!-- 產品列表Start -->

            <div class="container swiper-container">
                <div class="BarNext">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="BarPrev">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>

                <div class="productsList swiper-wrapper">
                     <!-- 產品品項 -->
                     @foreach($item2->product as $k => $v)
                    <a href="{{url('product',$v)}}" class="swiper-slide">
                        <picture>
                            <img src="{{url($v->cover)}}" alt="{{$v->name}} {{$v->taste}}">
                        </picture>
                        <div class="detial">
                            <h2 class="PdName">{{$v->name}}</h2>
                            <span class="taste">{{$v->taste}}</span>
                            <h4 class="slogan">{{$v->subtitle}}</h4>
                            <p class="profile" limit="800px-60">
                            {!! nl2br($v->intro) !!}
                            </p>
                            <span class="btn btnbox">
                                SHOP NOW
                                <span class="line1"></span>
                            <span class="line2"></span>
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($item3)
    <!--琥珀堂-->
    <section class="product_content active productsIn" id="addProduct_3">
        <div class="mainPicContain " style="background-image: url({{url($item3->cover)}})">
            <img src="{{url($item3->cover)}}" alt="{{$item3->name}} {{$item3->name_en}}">
            <div class="textContent right bottom">
                <div class="box">
                    <h3>{!! nl2br($item3->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item3->name) !!}</h2>
                    <p>{!! nl2br($item3->intro) !!}</p>
                </div>
            </div>
        </div>
        <div class="productsBar ">
            <div class="container swiper-container">
                <div class="BarNext">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="BarPrev">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="productsList swiper-wrapper">
                    @foreach($item3->product as $k => $v)
                    <a href="{{url('product',$v)}}" class="swiper-slide">
                        <picture>
                            <img src="{{url($v->cover)}}" alt="{{$v->name}} {{$v->taste}}">
                        </picture>
                        <div class="detial">
                            <h2 class="PdName">{{$v->name}}</h2>
                            <span class="taste">{{$v->taste}}</span>
                            <h4 class="slogan">{{$v->subtitle}}</h4>
                            <p class="profile" limit="800px-60">
                            {!! nl2br($v->intro) !!}
                            </p>
                            <span class="btn btnbox">
                                SHOP NOW
                                <span class="line1"></span>
                            <span class="line2"></span>
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($item4)
    <!--組合禮盒-->
    <section class=" GiftCombin" id="giftProduct">
        <div class="pdPictureContainer">
        
            @foreach($item4->product as $k => $v)
            @if($k > 0)
            <div class="pdPicture" id="z{{$k}}" style="background-image: url({{url($v->cover)}}) ">
            @else
            <div class="pdPicture active" id="z{{$k}}" style="background-image: url({{url($v->cover)}}) ">
            @endif
                <img src="{{url($v->cover)}}" alt="{{$v->name}}" class="imgFit">
            </div>
            @endforeach
        </div>
        <div class="slideContainer">
            <a class="txtBox" href="{{url('product',$item4->product[0]->id)}}">
                <h3>{!! nl2br($item4->name_en) !!}</h3>
                <p>{!! nl2br($item4->name) !!}</p>
                <span>SHOP NOW</span>
            </a>
            <div class="swiper-container gift">
                <div class="swiper-wrapper">
                    @foreach($item4->product as $k => $v)
                    @if($k > 0)
                    <div class="swiper-slide giftslider" id="s{{$k}}" data-link="{{url('product',$v->id)}}">
                    @else
                    <div class="swiper-slide active giftslider" id="s{{$k}}" data-link="{{url('product',$v->id)}}">
                    @endif
                    <a href="{{url('product',$v->id)}}" class="insideBtn"></a>
                        <h3>{{$v->name}}</h3>
                        <p>{{$v->taste}}</p>
                        <p>{{$v->subtitle}}</p>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="swiper-button-next"><i class="data-icon data-icon-arrow-right-01"></i></div>
            <div class="swiper-button-prev"><i class="data-icon data-icon-arrow-right-01"></i></div>
        </div>
    </section>
    @endif

    @if($item5)
    <!--幾何蛋糕-->
    <section class="singleProduct" id="singleProduct">
        <div class="productsPhoto">
            @foreach($item5->product as $k => $v)
            <div class="pdPicture" id="z{{$k}}">
                <div class="txtContainer">
                    <div class="mainNameContainer">
                        <h2>
                        {!! nl2br($item5->name_en) !!}
                        </h2>
                        <p>
                        {!! nl2br($item5->name) !!}
                        </p>
                    </div>
                    <a class="shopBtn" href="{{url('product',$v->id)}}">
                        <h3>
                        {{$v->name}}
                        </h3>
                        <p>
                        {!! nl2br($v->intro) !!}
                        </p>
                        <span class="btnbox">
                            SHOP NOW
                            <span class="line1"></span>
                            <span class="line2"></span>
                        </span>
                    </a>
                </div>
                <img src="{{url($v->cover_bg)}}" alt="{{$v->name}}">
            </div>
            @endforeach
        </div>
        <div class="scrollList">
            <div class="wrapper">
                <div class="ListContainer">
                    <div class="swiper-wrapper" id="singlePdList">
                        @foreach($item5->product as $k => $v)
                        <a class="swiper-slide" href="javascript:;"><img src="{{url($v->cover)}}" alt="">
                            <h3>{{$v->name}}</h3>
                            <p class="size">{{$v->taste}}</p>
                        </a>
                        @endforeach
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper-button-next single-next"><i class="data-icon data-icon-arrow-right-01"></i></div>
                <div class="swiper-button-prev single-prev"><i class="data-icon data-icon-arrow-right-01"></i></div>
            </div>
        </div>
    </section>
    @endif

    @if($item6)
    <!--幾何慕絲-->
    <section class="product_content noList active productsIn" id="addProduct_4">
        <div class="mainPicContain " style="background-image: url( {{url($item6->cover)}} )">
            <img src="{{url($item6->cover)}}" alt="{{$item6->name}} {{$item6->name_en}}">
            <div class="textContent h_center bottom">
                <div class="box">
                    <h3>{!! nl2br($item6->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($item6->name) !!}</h2>
                    <a href="{{url('product',$item6->product[0]->id)}}" class="btnbox">SHOP NOW<span class="line1"></span><span class="line2"></span>
                </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($item7)
    @foreach($item7 as $k =>$v)
    <section class="product_content active productsIn" id="addProduct_5">
        <div class="mainPicContain mobileHidden" style="background-image: url({{url($v->cover)}})">
            <img src="{{url($v->cover)}}" alt="{{$v->name}} {{$v->name_en}}">
            <div class="textContent near_right bottom">
                <div class="box">
                    <h3>{!! nl2br($v->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($v->name_) !!}</h2>
                    <p>{!! nl2br($v->intro) !!}</p>
                </div>
            </div>
        </div>
        <div class="mainPicContain mobileShow" style="background-image: url({{url($v->cover)}})">
            <img src="{{url($v->cover_mb)}}" alt="{{$v->name}} {{$v->cover_mb}}">
            <div class="textContent near_right bottom">
                <div class="box">
                    <h3>{!! nl2br($v->name_en) !!}</h3>
                    <h2 class="pdName">{!! nl2br($v->name) !!}</h2>
                    <p>{!! nl2br($v->intro) !!}</p>
                </div>
            </div>
        </div>

        <div class="productsBar">
            <div class="container swiper-container">
                <div class="BarNext">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="BarPrev">
                    <i class="data-icon data-icon-arrow-right-01"></i>
                </div>
                <div class="productsList swiper-wrapper">
                    @foreach($v->product as $k2 => $v2)
                    <a href="{{url('product',$v2)}}" class="swiper-slide">
                        <picture>
                            <img src="{{url($v2->cover)}}" alt="{{$v2->name}} {{$v2->taste}}">
                        </picture>
                        <div class="detial">
                            <h2 class="PdName">{{$v2->name}}</h2>
                            <span class="taste">{{$v2->taste}}</span>
                            <h4 class="slogan">{{$v2->subtitle}}</h4>
                            <p class="profile" limit="800px-60">
                            {!! nl2br($v2->intro) !!}
                            </p>
                            <span class="btn btnbox">
                                SHOP NOW
                                <span class="line1"></span>
                            <span class="line2"></span>
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @endif

</article>
@endsection

@section('script')
<script src="js/page/product.min.js"></script>
@endsection