@extends('layouts.page')

@section('title', $result->name.' - ')

@section('css')
<style>
article.shopping .main div.preview .buy_price .contentDetialbtn {
    width: 340px;
    height: 60px;
    padding-right: 10px;
    padding-left: 10px;
    display: inline-block;
    color: #fff;
    text-align: center;
    font-size: 1.5625rem;
    line-height: 60px;
    background-color: #4c4c4c;
    transition-property: all;
    transition-duration: 0.5s;
    transition-delay: 0s;
}

@media screen and (max-width: 37.5em){
    article.shopping .main div.preview .buy_price .contentDetialbtn {
        width: 80%;
        font-size: 1.25rem;
    }
}

</style>
@endsection

@section('content')
<div class="contentDetial">
    <div class="detial">
        <a href="javascript:;" class=" closeBtn cart"></a>
        <div class="title">
            口味選擇
            <br>
            <span>請選擇欲購買的三個蛋糕，可重複選擇。</span>
        </div>
        <form id="inside">
        <ul class="set" id="tasteList">
            <!--
            <li>
                <div class="head">
                    <p>盒1口味</p>
                    <p class="errorNotice ">*單一盒內蛋糕總數不論口味一定需剛好4個</p>
                </div>
                <div class="tastContent">
                    <div class="single taste">
                        <img src="{{url('images/products_el_41.jpg')}}" alt="">
                        <label class="quantity_main">
                            <a href="javascript:;" class="minus"></a>
                            <input type="number" value="1" class="Quantity"> <a href="javascript:;" class="plus"></a>
                        </label>
                    </div>
                    <div class="single taste">
                        <img src="{{url('images/products_el_45.jpg')}}" alt="">
                        <label class="quantity_main">
                            <a href="javascript:;" class="minus"></a>
                            <input type="number" value="1" class="Quantity"> <a href="javascript:;" class="plus"></a>
                        </label>
                    </div>
                    <div class="single taste">
                        <img src="{{url('images/products_el_43.jpg')}} " alt="">
                        <label class="quantity_main">
                            <a href="javascript:;" class="minus"></a>
                            <input type="number" value="1" class="Quantity"> <a href="javascript:;" class="plus"></a>
                        </label>
                    </div>
                    <div class="single taste">
                        <img src="{{url('images/products_el_36.jpg')}}" alt="">
                        <label class="quantity_main">
                            <a href="javascript:;" class="minus"></a>
                            <input type="number" value="1" class="Quantity"> <a href="javascript:;" class="plus"></a>
                        </label>
                    </div>
                </div>
            </li>
            -->
        </ul>
        <div class="btnContainer">

            <a href="javascript:;" class="confirm btnbox not-active" data-confirm="您已確定商品內容?確認後將無法再進行修改">
            加入購物車<span class="line1">  </span>
            <span class="line2">  </span>

            </a>
        </div>
        </form>
    </div>
</div>


<article class="shopping">
    <section class="PhotoContent close">
        <div class="swiper-container photaContainer">
            <div class="swiper-wrapper">
                @foreach($result->album as $k => $v)
                <div class="swiper-slide">
                    <img src="{{url($v)}}" alt="{{$result->name}}">
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next">
                <i class="data-icon data-icon-arrow-right-01"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="data-icon data-icon-arrow-right-01"></i>
            </div>
            <!-- Add Close btn -->
            <a href="javascript:;" class="closeBtn"></a>
        </div>
    </section>
    <section class="main" style="background-image: url({{url($result->background)}});">
        <form>
        <img src="{{url($result->background)}}" alt="{{$result->name}}" class="productsBg">
        <div class="preview">
            <div class="buy_price">
                <span class="class">{{$result->name}}</span>
                <h2 class="PdName">{{$result->category->name}}({{$result->taste}})</h2>
                <p class="des">{!! nl2br($result->intro) !!}</p>
                <div class="line">
                </div>
                <span class="minTitle">
                售價
            </span>
                <div class="price">
                    @foreach($result->spec as $k => $v)
                    <div class="priceContent">@if($v->name)<span>{{$v->name}}</span>@endif
                        <p>NT${{$v->price}}</p>
                    </div>
                    @endforeach
                   
                </div>
                <span class="minTitle">
                尺寸
            </span>
                
                <label class="pdSpec" id="PdSpec" for="size">
                    <span class="dropDownbtn"> 
                        <i class="data-icon-arrow_down-01 data-icon"> </i>
                    </span>
                
                    <span class="NowSelected">
                    {{$result->spec[0]->name}} <p>{{$result->spec[0]->size}}</p>
                    </span>
                    <div class="optionContainer">
                        @foreach($result->spec as $k => $v)
                        <span class="option" id="{{$v->name}}">
                        {{$v->name}} <p>{{$v->size}}</p>
                        </span>
                        @endforeach
                    </div>
                    <select form="" id="size">
                        @foreach($result->spec as $k => $v)
                        <option value="{{$v->id}}" data-name="{{$v->name}}">{{$v->name}} {{$v->size}}</option>
                        @endforeach
                    </select>
                </label>
                <span class="minTitle">
                    數量
                </span>
                
                <label class="Quantity" for="">
                    <a href="javascript:;" class="minus"></a>
                    <input type="number" value="1" class="Quantity" name="quantity">
                    <input type="hidden" value="{{$result->spec[0]->id}}" name="size"> 
                    <input type="hidden" value="{{$result->spec[0]->name}}" name="size_name">
                    <input type="hidden" value="{{$result->name}}" name="name">
                    <input type="hidden" value="{{$result->category->name}}" name="category_name">
                    
                    <a href="javascript:;" class="plus"></a>
                    
                </label>
                
                @if($result->temp)
                <div class="temperature">
                    <img src="{{url('images/freezing.png')}}" alt="低溫宅配">
                    <p>商品以低溫宅配</p>
                </div>
                @else
                <div class="temperature">
                    <img src="{{url('images/normal.png')}}" alt="低溫宅配">
                    <p>商品以常溫宅配</p>
                </div> 
                @endif

                @if($result->name == '幾何慕斯蛋糕(三入裝)' || $result->name == '幾何慕斯蛋糕')
                <a href="javascript:;" class="contentDetialbtn">
                    <img src="{{url('images/productsDetial.png')}}" alt=""> 口味選擇
                </a>
                
                @else
                <a href="javascript:;" class="shoppingNow btnbox" onclick="common.submitForm(this)">
                    <span class="line1">  </span>
                    <span class="line2">  </span>
                加入購物車 </a>
                @endif
                
                <div class="line" style="margin-top: 25px;">
                </div>
                <div class="share">
                    <span class="minTitle">
                分享: 
            </span><a href="" class="shareBtn"><i class="data-icon data-icon-Ei-sc-facebook"></i></a>
                    <a href="" class="shareBtn instagram"><i class="data-icon data-icon-iconmonstr-instagram-11"></i></a>
                    <a href="" class="shareBtn Weibo"><i class="data-icon data-icon-Weibo_font_awesome-01"></i></a>
                    <a href="" class="shareBtn linelogo"><i class="data-icon data-icon-line-logo"></i></a>
                </div>
            </div>
            <a href="javascript:;" class="detialPhoto btnbox">
                
                    <span class="line1">    </span>
                    <span class="line2">    </span>
               
                產品細節
            </a>
        </div>
        <form>
    </section>
    <section class="Info">
        <div class="InfoDetial">
            <h3>產品規格</h3>
            <table class="spec">
                <tr class="column">
                    <td class="title">禮盒內容物</td>
                    <td class="content">{!! nl2br($result->content) !!}</td>
                </tr>
                <tr class="column">
                    <td class="title">內容物淨重</td>
                    <td class="content">{!! nl2br($result->weight) !!}</td>
                </tr>
                <tr class="column">
                    <td class="title" valign="top">成份</td>
                    <td class="content">{!! nl2br($result->element) !!}</td>
                </tr>
                <tr class="column">
                    <td class="title">保存期限</td>
                    <td class="content">{!! nl2br($result->life) !!}</td>
                </tr>
            </table>
        </div>
    </section>
    <!-- PRODUCTS PICKS 商品推薦 -->
    <section class="picks">
        <div class="mainContent">
            <h2>
                Products Picks

            </h2>
            <h3>商品推薦</h3>
            <div class="pickNext swiper-button-next">
                <i class="data-icon data-icon-arrow-right-01"></i>
            </div>
            <div class="pickPrev swiper-button-prev">
                <i class="data-icon data-icon-arrow-right-01"></i>
            </div>
            <div class="Picks_slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach($result->picks as $k => $v)
                    <a class="swiper-slide" href="{{url('product',$v->id)}}" title="{{$v->name}}-{{$v->category->name}}">
                        <div class="imgContainer">
                            <img src="{{url($v->thumb)}}" alt="{{$v->name}}-{{$v->category->name}}">
                        </div>
                        <section class="infoContent">
                            <h3 class="PdName">{{$v->name}}</h3>
                            <h4 class="Taste">{{$v->category->name}}</h4>
                            <p>{{$v->taste}}</p>
                        </section>
                        <span class="more">
                            <i class="data-icon data-icon-arrow_left">
                                
                            </i>
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</article>
@endsection

@section('script')
<script src="{{url('js/page/shopping.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
@endsection

