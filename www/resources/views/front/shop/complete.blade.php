@extends('layouts.page')

@section('title', '完成訂單 - ')



@section('content')
<article class="checkout">
    <div class="stepContainer step5">
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
        <div class="step active" step-title="完成訂單">
            5
        </div>
    </div>
    <h2>完成訂單</h2>
    <section class="shoppingEnd">
        <h3>感謝您的購買</h3>
        <p>您的訂單已成功提交，付款成功紀錄已寄至您的E-mail，我們會在第一時間進行處理，貨品將於3-5個工作天送到。</p>
        <br>
        <h3>訂購資訊</h3>
        <ul class="shoppingInfo">
            <li>
                <div class="title">訂單編號</div>
                <div class="content">{{$order->order_number}}</div>
            </li>
            <li>
                <div class="title">訂購日期</div>
                <div class="content">
                    <p class="data"> {{date('A H:i:s', strtotime($order->order_date))}}</p>
                    <p>{{date('Y-m-d', strtotime($order->order_date))}}</p>
                </div>
            </li>
            <li>
                <div class="title">付款狀態</div>
                <div class="content">{{$order->RtnCode}} </div>
            </li>
            <li>
                <div class="title">付款方式</div>
                <div class="content">信用卡</div>
            </li>
            <li>
                <div class="title">商品總金額</div>
                <div class="content">NT${{number_format($order->TradeAmt)}}</div>
            </li>
        </ul>

    </section>
            <div class="btnContainer">
            <a class="checkOut btnbox" href="{{url('')}}">回首頁<span class="line1">  </span>
            <span class="line2">  </span></a>
        </div>
</article>
@endsection
@section('script')
<script src="{{url('js/page/checkout.js')}}"></script>
<!-- Resource jQuery -->
@endsection
