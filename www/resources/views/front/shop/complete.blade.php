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
    @if($order->PaymentType == '銀行匯款')
    <section class="shoppingEnd">
        <h3>感謝您的購買</h3>
        <p>您的訂單已成功提交，訂購紀錄已寄至您的E-mail，麻煩請您匯款至以下帳號，匯款完成後請來電(02-23961528)或粉絲團私訊您的匯款後五碼提供查帳使用。匯款完成後，將視商品庫存狀況於5-7個工作天送達。</p>
        
        <p>
            戶名：金鉑國際股份有限公司<br>
            銀行：上海商業銀行 北中和分行<br>
            銀行代碼：011<br>
            帳戶號碼：56102000023608
        </p>
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
                <div class="content">未付款 </div>
            </li>
            <li>
                <div class="title">付款方式</div>
                <div class="content">銀行匯款</div>
            </li>
            <li>
                <div class="title">商品總金額</div>
                <div class="content">NT${{number_format($order->total)}}</div>
            </li>
        </ul>
    </section>
    @else
    <section class="shoppingEnd">
        <h3>感謝您的購買</h3>
        <p>您的訂單已成功提交，付款成功紀錄已寄至您的E-mail，我們會在第一時間進行處理，並依貨品庫存狀況於5-7個工作天送達。</p>
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
    @endif
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
