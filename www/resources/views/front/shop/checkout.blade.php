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
    <div class="stepContainer step4">
        <div class="step active" step-title="商品確認">
            1
        </div>
        <div class="step active" step-title="付款方式">
            2
        </div>
        <div class="step active" step-title="填寫資料">
            3
        </div>
        <div class="step active" step-title="確認訂單">
            4
        </div>
        <div class="step" step-title="完成訂單">
            5
        </div>
    </div>
    <h2>確認訂單</h2>
    <form action="">
        <section class="confirmList">
            <!--
            <div class="head">
                訂單編號：20180012345
            </div>
-->
            <div class="confirmDetial">
                <div class="orderInfo">
                    <h3>
                    訂購人資料
                    </h3>
                    <ul class="content">
                        <li>
                            <div class="title">
                                姓名
                            </div>
                            <div class="content">
                                {{$order['name']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                稱謂
                            </div>
                            <div class="content">
                            {{$order['title']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$order['address']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                聯絡電話
                            </div>
                            <div class="content">
                            {{$order['tel']?$order['tel']:'-'}} / {{$order['phone']?$order['phone']:'-'}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                E-mail
                            </div>
                            <div class="content">
                            {{$order['email']}}
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="delivery">
                    <h3>
                    貨運時間
                    </h3>
                    <ul class="content">
                        <li>
                            <div class="title">
                                到貨時間
                            </div>
                            <div class="content">
                            {{$order['ship_time']}}
                            </div>
                        </li>
                        <div class="notice">
                            <p>
                                貨運公司因每日貨量、交通或突發天候因素，有延遲送達的情況，敬請見諒。
                            </p>
                            <p>
                                離島及偏遠地區配送，依貨運公司安排，可能延遲1~2天。
                            </p>
                        </div>
                    </ul>
                </div>
                <div class="orderInfo">
                    <h3>
                    收件人資料
                    </h3>
                    <ul class="content">
                        <li>
                            <div class="title">
                                姓名
                            </div>
                            <div class="content">
                            {{$order['to_name']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                稱謂
                            </div>
                            <div class="content">
                            {{$order['to_title']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$order['to_address']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                聯絡電話
                            </div>
                            <div class="content">
                            {{$order['to_tel']?$order['to_tel']:'-'}} / {{$order['to_phone']?$order['to_phone']:'-'}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                E-mail
                            </div>
                            <div class="content">
                            {{$order['to_email']}}
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="orderInfo">
                    <h3>
                    發票地址
                    </h3>
                    <ul class="content">
                        <li>
                            <div class="title noColon">
                            {{$order['invoice']}}
                            </div>
                            <div class="content">
                                &nbsp;
                            </div>
                        </li>
                        @if(isset($order['uniform']))
                        <li>
                            <div class="title">
                                統一編號
                            </div>
                            <div class="content">
                            {{$order['uniform']}}
                            </div>
                        </li>
                        @endif
                        @if(isset($order['uniform_name']))
                        <li>
                            <div class="title">
                                姓名
                            </div>
                            <div class="content">
                            {{$order['uniform_name']}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$order['uniform_address']}}
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="confirmCart">
                <div class="head">
                    付款方式：信用卡
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
            </div>
            <div class="btnContainer">
                <a href="{{url('delivery')}}" class="ReShopping btnbox">上一步 <span class="line1">  </span>
            <span class="line2">  </span></a>
                <a class="checkOut btnbox" href="{{url('checkcheckout')}}">送出訂單 <span class="line1">  </span>
            <span class="line2">  </span></a>
            </div>
        </section>
    </form>
</article>
@endsection

@section('script')
<script src="{{url('js/page/checkout.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
@endsection