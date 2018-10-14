@extends('layouts.page')

@section('title', '預約訂製 - ')

@section('css')
<style>
.buttonContainer input[type="submit"] {
    width: 180px;
    height: 50px;
    position: static;
    border: none;
}
</style>
@endsection



@section('content')
<article class="appointment close">

    <div class="board">
        <a href="javascript:;" class="closeBtn cart">
            
        </a>
        <h1>Reservation </h1>
        <h3>預約品嚐</h3>
        <p>品嚐鑑賞金錦町的細緻與美味</p>
        <form action="{{url('reservation')}}" method="post">
        {!! csrf_field() !!}
            <div class="fillInfo">
                <div class="formBox">
                    <div class="title">
                        <label for="real_Name" class="text-right middle">姓名</label>
                    </div>
                    <div class="content">
                        <input type="text" id="real_Name" name="name" placeholder="姓名" required>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="Phone" class="text-right middle">電話</label>
                    </div>
                    <div class="content">
                        <input type="text" id="Phone" name="phone" placeholder="電話" required>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="date" class="text-right middle">日期</label>
                    </div>
                    <div class="content">
                        <input type="date" id="date" name="reserve" name="date" required>
                    </div>
                </div>
            </div>
            <div class="buttonContainer">
                <a href="#"><input type="submit" value="門市品嚐" name="subject"></a>
                <a href="#"><input type="submit" value="宅配品嚐" name="subject"></a>
            </div>
        </form>
    </div>
</article>
<article class="customize">
    <div class="mainContainer">
        <div class="textBox">
            <h3>We wrote the</h3>
            <h2>STORIES</h2>
            <a href="{{url('products#giftProduct')}}">喜餅禮盒</a>
            <a href="{{url('products#giftProduct')}}" >企業送禮</a>
            <a href="javascript:;" class="openPopup">預約品嚐</a>
        </div>
        <picture>
            <source srcset="{{url('images/element_49.jpg')}}" media="(max-width: 1025px)">
            <img src="{{url('images/cus_39.jpg')}}" alt="預約訂製" class="slider_pic" alt="預約訂製">
        </picture>
    </div>
</article>
@endsection

@section('script')
<script src="{{url('js/page/reservation.js')}}"></script>
@if (session('status'))
<script>
alert("{{ session('status') }}" );
</script>
@endif
@endsection

