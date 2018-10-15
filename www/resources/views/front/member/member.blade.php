@extends('layouts.page')

@section('title', '會員中心 - ')

@section('css')
<style >
.alert-success{
    background: #c9c67a;
    padding: 15px;
    margin-top: 20px;
    color: #ffff;
    text-align: center;
}
input[type="submit"] {

    position: relative;
  
}
.cart li .des .contentDetialbtn {
    width: auto;
    height: 38px;
    padding-right: 10px;
    padding-left: 10px;
    display: inline-block;
    color: #fff;
    font-size: 1rem;
    line-height: 2.375rem;
    margin-left: 0;
    background-color: #4c4c4c;
    transition-property: all;
    transition-duration: 0.5s;
    transition-delay: 0s;
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
            
        </ul>
        
   
    </div>
</div>
<article class="dashboardContainer">
    <div class="memberBar">
        <p class="name">{{$user->name}}</p>
        <p class="gender">{{$user->title}}</p>
        <br>
        <p class="id">會員ID：</p>
        <p class="idNum">10000{{$user->id}}</p>
        <a href="{{url('logout')}}" class="logout">
        登出
    </a>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }} 
    </div>
    @endif

    <div class="dashboard">
        <div class="tabContainer">
            <a href="javascript:;" class="memberInfo active">會員資料</a>
            <a href="javascript:;" class="ordertracking">訂單查詢</a>
            <div class="cb"></div>
        </div>
        <div class="Info_content">
            <h2>會員資料修改</h2>
            <form accept-charset="UTF-8" action="{{url('member')}}"  method="post">
                {!! csrf_field() !!}
            <div class="editContent">
                <div class="notice">
                    <p>＊</p>必填資料
                </div>
               
                <div class="left">
                    <div class="box">
                        <div class="title">
                            <label for="fullName" class="text-right middle"><i>*</i>姓名</label>
                        </div>
                        <div class="content">
                            <input type="text" id="fullName" value="{{$user->name}}" name="name" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="title" class="text-right middle"><i>*</i>稱謂</label>
                        </div>
                        <div class="content">
                            <select id="title" name="title">
                                <option value="{{$user->title}}">{{$user->title}}</option>
                                <option value="先生">先生</option>
                                <option value="小姐">小姐</option>
                            </select>
                        </div>
                    </div>
                    <!--
                    <div class="box">
                        <div class="title">
                            <label for="birthday" class="text-right middle"><i>*</i>生日</label>
                        </div>
                        <div class="content" id="birthday">
                            <select id="month">
                                <option value="husker">月</option>
                                <option value="starbuck">一月</option>
                                <option value="hotdog">二月</option>
                                <option value="apollo">三月</option>
                            </select>
                            <select id="date">
                                <option value="husker">日</option>
                                <option value="starbuck">一月</option>
                                <option value="hotdog">二月</option>
                                <option value="apollo">三月</option>
                            </select>
                            <select id="year">
                                <option value="husker">年</option>
                                <option value="starbuck">一月</option>
                                <option value="hotdog">二月</option>
                                <option value="apollo">三月</option>
                            </select>
                        </div>
                    </div>
                    -->
                    <div class="box">
                        <div class="title">
                            <label for="Email" class="text-right middle"><i>*</i>生日</label>
                        </div>
                        <div class="content">
                            <input type="text"  placeholder="{{$user->birthday}}" aria-describedby="mailHelpText" readonly>
                            <p>※會員生日無法變更</p>
                        </div>
                    </div>
                    
                </div>
                <div class="right">
                    
                    <div class="box">
                        <div class="title">
                            <label for="phoneNumber" class="text-right middle"><i>*</i>手機</label>
                        </div>
                        <div class="content">
                            <input type="text" id="phoneNumber" value="{{$user->phone}}"  name="phone" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="lineId" class="text-right middle">Line ID</label>
                        </div>
                        <div class="content">
                            <input type="text" id="lineId" vlaue="{{$user->line}}" name="line" aria-describedby="mailHelpText">
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="Email" class="text-right middle"><i>*</i>E-mail</label>
                        </div>
                        <div class="content">
                            <input type="text" id="Email" placeholder="{{$user->email}}" aria-describedby="mailHelpText" readonly>
                            <p>※會員帳號無法變更</p>
                        </div>
                    </div>
                    <!--
                    <div class="box">
                        <div class="title">
                            <label for="dashboard-password" class="text-right middle"><i>*</i>密碼</label>
                        </div>
                        <div class="content">
                            <input type="password" id="dashboard-password" placeholder="*********" aria-describedby="mailHelpText">
                            <p class="gray">※請輸入8字以上20字以下的半形英文或數字。</p>
                            <p class="gray">※請設定英文和數字混合的字串。</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="re-Password" class="text-right middle"><i>*</i>密碼確認</label>
                        </div>
                        <div class="content" id="birthday">
                            <input type="password" id="re-Password" placeholder="" aria-describedby="mailHelpText">
                        </div>
                    </div>
                        -->
                </div>
                <div class="line">
                </div>
                <div class="btnContainer">
                    <a href="javascript:;" class="prevStep btnbox">
                    取消
                    <span class="line1">  </span>
                    <span class="line2">
                        </a>
                            <a class=" nextStep btnbox" >
                            <input  class="send btnbox" name="commit" tabindex="3" type="submit" value="儲存">
                            <span class="line1">  </span>
                    <span class="line2">
                        </a>
                </div>
                
            </div>
            </form>
        </div>
        <div class="orderTracking">
            <h2>訂單查詢</h2>
            @foreach($orders as $k =>$v)
            <div class="trackingList ">
                <a href="javascript:;" class="hideBar">
                    訂單編號：{{$v->order_number}}
                    <div class="arrowUp">
                        <i class="data-icon-arrow_left data-icon"></i>
                    </div>
                </a>
                <div class="detial">
                    <div class="boxW">
                        <p>訂購日期 : {{date('Y/m/d  A H:i:s', strtotime($v->order_date))}}</p>
                        <p>付款方式 : 信用卡</p>
                        <a class="status">
                        {{$v->category->name}}
                    </a>
                    </div>
                    <div class="left">
                        <h3>
                            訂購人資料
                        </h3>
                        <div class="box">
                            <div class="title">
                            姓名
                            </div>
                            <div class="content">
                            {{$v->name}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                稱謂
                            </div>
                            <div class="content">
                            {{$v->title}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$v->address}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                聯絡電話
                            </div>
                            <div class="content">
                            {{$v->tel?$v->tel:'-'}} / {{$v->phone?$v->phone:'-'}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                E-mail
                            </div>
                            <div class="content">
                            {{$v->email}}
                            </div>
                        </div>
                    </div>
                    <div class="left">
                        <h3>
                            貨運時間
                        </h3>
                        <div class="box">
                            <div class="title">
                                到貨時間
                            </div>
                            <div class="content">
                            {{$v->ship_time}}
                            </div>
                        </div>
                        <div class="notice">
                            <p>貨運公司因每日貨量、交通或突發天候因素，有延遲送達的情況， 敬請見諒。
                            </p>
                            <p>
                                離島及偏遠地區配送，依貨運公司安排，可能延遲1~2天。
                            </p>
                        </div>
                    </div>
                    <div class="left">
                        <h3>
                            收件人資料
                        </h3>
                        <div class="box">
                            <div class="title">
                            姓名
                            </div>
                            <div class="content">
                            {{$v->to_name}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                稱謂
                            </div>
                            <div class="content">
                            {{$v->to_title}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$v->to_address}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                聯絡電話
                            </div>
                            <div class="content">
                            {{$v->to_tel?$v->to_tel:'-'}} / {{$v->to_phone?$v->to_phone:'-'}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                E-mail
                            </div>
                            <div class="content">
                            {{$v->to_email}}
                            </div>
                        </div>
                    </div>
                    <div class="left">
                        <h3>
                            發票地址
                        </h3>
                        <div class="box">
                            
                            <div class="content">
                            {{$v->invoice}}
                            </div>
                        </div>
                        @if($v->invoice_number)
                        <div class="box">
                            <div class="title">
                                統一編號
                            </div>
                            <div class="content">
                            {{$v->invoice_number}}
                            </div>
                        </div>
                        @endif
                        @if($v->invoice_name)
                        <div class="box">
                            <div class="title">
                                姓名
                            </div>
                            <div class="content">
                            {{$v->invoice_name}}
                            </div>
                        </div>
                        <div class="box">
                            <div class="title">
                                地址
                            </div>
                            <div class="content">
                            {{$v->invoice_address}}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="orderContainer">
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
                        </ul>
                        <ul class="cart">
                            @foreach($v->detail as $k2 => $v2)
                            <li>
                                <div class="pd">
                                    <picture>
                                        <img src="{{url($v2->product->cover)}}" alt="{{$v2->product->name}}">
                                    </picture>
                                </div>
                                <div class="des">
                                    <div class="Container">
                                        <h3>
                                        {{$v2->product->name}}
                            </h3>
                                        <h4>
                                        {{$v2->product->category->name}} {{$v2->spec->name}}
                            </h4>
                                        <p class="taste">
                                        {{$v2->product->taste}}
                                        </p>
                                        @if($v2->detail)
                                        <a href="javascript:;" class="contentDetialbtn " onclick="common.tasteDetial2('{{$v2->id}}');">
                                            <img src="{{url('images/productsDetial.png')}}" alt=""> 口味選擇
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="price">
                                    <p data-title="價格:"> NT${{number_format($v2->selling)}}</p>
                                </div>
                                <div class="quantity">
                                    <p data-title="數量:"> {{$v2->qty}}</p>
                                </div>
                                <div class="check">
                                    <p data-title="小計:"> NT${{number_format($v2->total)}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <section class="total_box">
                            <div class="result">
                                <div class="order_price">
                                    <span class="title">訂單金額</span><span class="result">NT${{number_format($v->subtotal)}}</span>
                                </div>
                                @if($v->discount> 0)
                                <div class="order_price">
                                    <span class="title">折扣金額</span><span class="result">NT${{number_format($v->discount)}}</span>
                                </div>
                                @endif
                                <div class="order_price">
                                    <span class="title">常溫運費</span><span class="result">NT${{number_format($v->shipping_fee)}}</span>
                                </div>
                                <div class="order_price">
                                    <span class="title">低溫運費</span><span class="result">NT${{number_format($v->shipping_fee_temp)}}</span>
                                </div>
                                <br>
                                <div class="order_total">
                                    <span class="title">Total</span><span class="result">NT${{number_format($v->total)}}</span>
                                </div>
                            </div>
                        </section>
                        <div class="closebtn">
                            <div class="close">
                            </div>
                            <p>
                                Close
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</article>
@endsection

@section('script')
<script src="{{url('js/page/member.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
@endsection