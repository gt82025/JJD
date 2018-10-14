@extends('layouts.page')

@section('title', '商品確認')

@section('css')
<style>
.checkOut input[type="submit"]{
    position:relative;
}
.ship_remark h4{
    font-size:14px;
    margin-bottom:0px;
}
.ship_remark span{
    font-size:12px;
    display:block;
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
        
   
    </div>
</div>
<article class="checkout">
    <div class="stepContainer step1">
        <div class="step active" step-title="商品確認">
            1
        </div>
        <div class="step" step-title="付款方式">
            2
        </div>
        <div class="step" step-title="填寫資料">
            3
        </div>
        <div class="step" step-title="確認訂單">
            4
        </div>
        <div class="step" step-title="完成訂單">
            5
        </div>
    </div>
    <h2>商品確認</h2>
    <form method="post" action="{{ url('checkCart') }}">
        {!! csrf_field() !!}
        <section class="List ">
            <ul class="ListTitle">
                <li class="pd">
                    商品
                </li>
                <li class="des">
                    描述
                </li>
                <li class="price">
                    價格
                </li>
                <li class="quantity">
                    數量
                </li>
                <li class="check">
                    小計
                </li>
                <li class="delete">
                    刪除
                </li>
            </ul>
            <ul class="cart" id="checkoutStart">
           
                @if(count(Session::get('cart')))
                @foreach(Session::get('cart') as $k => $v)
                <li>
                    <div class="pd">
                        <picture>
                            <img src="{{url($v->product->cover)}}" alt="">
                        </picture>
                    </div>
                    <div class="des">
                        <div class="Container">
                            <h3>
                            {{$v->product->name}}
                        </h3>
                            <h4>
                            {{$v->product->category->name}} {{$v->name}}
                        </h4>
                            <p class="taste">
                            {{$v->product->taste}}
                            </p>
                            @if($v->content_detail)
                            <a href="javascript:;" class="contentDetialbtn " onclick="common.tasteDetial('{{$k}}');">
                                 <img src="{{url('images/productsDetial.png')}}" alt=""> 口味選擇
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="price">
                        <p>NT${{$v->price}}</p>
                    </div>
                    <div class="quantity">
                        @if(!$v->content_detail)
                        <label class="quantity_main">
                            <a href="javascript:;" class="minus"></a>
                            <input type="number" value="{{$v->qty}}"  name="qty[]" class="Quantity"> <a href="javascript:;" class="plus"></a>
                        </label>
                        @else
                        <label class="quantity_main">
                       
                            <input type="number" value="{{$v->qty}}"  name="qty[]" class="Quantity" readonly> 
                            
                        </label>
                        @endif
                    </div>
                    <div class="check">
                        <p data-price="{{$v->qty * $v->price}}">NT${{number_format($v->qty * $v->price)}}</p>
                    </div>
                    
                    <div class="delete">
                        <a class="delete cart-delete" title="刪除" data-id="{{$v->id}}" data-eq="{{$k}}" href="javascript:;" data-confirm="您確定要從購物車刪除此商品?">
                        <i class="data-icon data-icon-bin"></i>
                    </a>
                    </div>
                </li>
                @endforeach
                @else
                @endif

                
            </ul>
        </section>
        <section class="total_box">
            <div class="result">
                <div class="order_price">
                    <span class="title">訂單金額</span><span class="result wholePrice">NT$1,100</span>
                </div>
                <!--
                <div class="order_price">
                    <span class="title">常溫運費</span><span class="result">NT${{$bill['freight_normal']}}</span>
                </div>
                <div class="order_price">
                    <span class="title">低溫運費</span><span class="result">NT${{$bill['freight_special']}}</span>
                </div>
                -->
                <br>
                <div class="order_total">
                    <span class="title">Total</span><span class="result ">NT${{$bill['subtotal']}}</span>
                </div>
     
                <div class="ship_remark">
                <h4>常溫運費</h4>
                    @foreach($ship_normal as $k => $v)
                    <span class="title">{{$v->name}}</span>
                    @endforeach
                </div>
                <div class="ship_remark">
                <h4>低溫運費</h4>
                    @foreach($ship_special as $k => $v)
                    <span class="title">{{$v->name}}</span>
                    @endforeach
                </div>

               
            </div>
        </section>
        <div class="btnContainer">
            <a href="" class="ReShopping btnbox">繼續購買  <span class="line1"></span>
                            <span class="line2"></span></a>
            <a class="checkOut Register btnbox" href="javascript:;"><input  class="send btnbox" tabindex="3" type="submit" value="開始結帳">  <span class="line1"></span>
                            <span class="line2"></span></a>
        </div>
    </form>
</article>

@endsection

@section('script')
<script src="{{url('js/page/cart.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
@endsection