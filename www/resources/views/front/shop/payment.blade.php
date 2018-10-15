@extends('layouts.page')

@section('title', '付款方式 - ')



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
           
        </ul>
    </div>
</div>

<article class="checkout">
    <div class="stepContainer step3">
        <div class="step active" step-title="商品確認">
            1
        </div>
        <div class="step active" step-title="付款方式">
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
    <h2>付款方式</h2>
    <form action="">
        <section class="orderInfo">
            <h4>請選擇付款方式</h4>
            <div class="formContainer ">
                <div class="wide">
                    <fieldset class="">
                        <input id="credit_card" type="radio" value="信用卡" name="invoice" checked>
                        <label for="credit_card">信用卡</label>
                    </fieldset>
                    <p>可使用的信用卡:<img src="images/creditCard_73.png" alt="" class="credit_card_img"></p>
                </div>
                <div class="left hide">
                    <div class="box">
                        <div class="title credit">
                            <label for="fullName" class="text-right middle"><i>*</i>持卡人姓名</label>
                        </div>
                        <div class="content credit">
                            <input type="text" id="fullName" placeholder="" aria-describedby="mailHelpText">
                        </div>
                    </div>
                    <div class="box">
                        <div class="title credit">
                            <label for="credit_Number" class="text-right middle"><i>*</i>信用卡號碼</label>
                        </div>
                        <div class="content credit">
                            <input type="text" id="credit_Number" placeholder="" aria-describedby="mailHelpText">
                        </div>
                    </div>
                </div>
                <div class="right hide">
                    <div class="box">
                        <div class="title credit">
                            <label for="phoneNumber" class="text-right middle"><i>*</i>有效期限</label>
                        </div>
                        <div class="content credit">
                            <input type="text" id="expiry-Month" placeholder="月" aria-describedby="mailHelpText">
                            <input type="text" id="expiry-Year" placeholder="日" aria-describedby="mailHelpText">
                        </div>
                    </div>
                    <div class="box">
                        <div class="title credit">
                            <label for="CVV" class="text-right middle">
                                <i>*</i>安全識別碼(CVV)
                            </label>
                        </div>
                        <div class="content credit">
                            <input type="text" id="CVV" placeholder="CVV" aria-describedby="mailHelpText">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="confirmList">
            <div class="head">
                應付總金額
            </div>
            <div class="container">
                <ul class="ListTitle">
                    <li class="pd">商品</li>
                    <li class="des">描述</li>
                    <li class="price">價格</li>
                    <li class="quantity">數量</li>
                    <li class="check">小計</li>
                </ul>
                <ul class="cart">
                    @foreach($cart as $k => $v)
                    <li class="">
                        <div class="pd">
                            <picture>
                                <img src="{{$v->product->cover}}" alt="">
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
                        <div class="price"  dataTitle="單價">
                            <p>NT${{number_format($v->price)}}</p>
                        </div>
                        <div class="quantity" dataTitle="數量">
                            <p>{{$v->qty}}</p>
                        </div>
                        <div class="check" dataTitle="小計">
                            <p>NT ${{number_format($v->total)}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="total_box">
                    <div class="result">
                        <div class="order_price">
                            <span class="title">訂單金額</span><span class="result">NT${{number_format($order['bill']['subtotal'])}}</span>
                        </div>
                        @if($order['bill']['discount'] > 0)
                        <div class="order_price">
                            <span class="title">折扣金額</span><span class="result">NT${{number_format($order['bill']['discount'])}}</span>
                        </div>
                        @endif
                        <div class="order_price">
                            <span class="title">常溫運費</span><span class="result">NT${{number_format($order['bill']['freight_normal'])}}</span>
                        </div>
                        <div class="order_price">
                            <span class="title">低溫運費</span><span class="result">NT${{number_format($order['bill']['freight_special'])}}</span>
                        </div>
                        <br>
                        <div class="order_total">
                            <span class="title">Total</span><span class="result">NT${{number_format($order['bill']['total'])}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btnContainer">
                <a href="{{url('cart')}}" class="ReShopping btnbox">
            上一步
                                    <span class="line1">  </span>
            <span class="line2">  </span></a>
                </a>
                <a class="checkOut btnbox" href="{{url('delivery')}}">
            下一步
                                    <span class="line1">  </span>
            <span class="line2">  </span></a>
                </a>
            </div>
        </section>
    </form>
</article>
@endsection

@section('script')
<script src="{{url('js/page/checkout.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
@endsection