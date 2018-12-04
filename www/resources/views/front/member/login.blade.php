@extends('layouts.page')

@section('title', '會員登入 - ')

@section('css')
<style >
.alert-danger{
    background: #a15739;
    padding: 15px;
    margin-top: 20px;
    color: #ffff;
    text-align: center;
}
.alert-danger strong{
   display:block;
}
</style>
@endsection


@section('content')

<div class="applyContainer">
    
    <div class="formContainer" id="memberPage">
        
        <h3 class="Eng">LOGIN</h3>
        <h3 class="Ch">會員登入</h3>
        
        @if (session('error'))
        <div class="alert alert-danger">
            <strong> {{ session('error') }} </strong>
        </div>
        @endif
        
        <div class="container">
            <div class="loginPop ">
                <form  method="post" action="{{ url('login') }}">
                {!! csrf_field() !!}
                <label class="emailForm" for="email_9">E-mail
                    <input placeholder="請輸入您註冊的E-mail" type="email" name="email" id="email_9" required>
                </label>
                <label class="emailForm" for="password8">密碼
                    <input placeholder="請輸入您的密碼" type="password" name="password" id="password8" aria-describedby="passwordHelpText" required>
                </label>
                <a class="login btnbox" href="javascript:;">
                    
                    <span class="line1"> </span>
                    <span class="line2"> </span>
                    <input type="submit" value="登入">
                </a>
                </form>
                <a href="{{url('forget')}}" class="forget">
                    忘記密碼
                </a>
                <div class="line">
                    <div class="main"></div>
                    <div class="or">or</div>
                </div>
                <div class="share">
                    <a class="g_login" href="{{url('fbRedirect')}}">
                        <img src="{{url('images/login_social_32.png')}}" alt="">
                    </a>
                    <a href="{{url('gRedirect')}}" class="fb_login">
                        <img src="{{url('images/login_social_30.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>

        
        <!--
        <div class="fillInfo">
            <div class="formBox">
                <div class="title">
                    <label for="real_Name" class="text-right middle">E-mail</label>
                </div>
                <div class="content">
                    <input type="text" id="real_Name" name="email" placeholder="請輸入您註冊的E-mail" value="{{ old('email') }}" required>
                </div>
            </div>
            
            <div class="formBox">
                <div class="title">
                    <label for="apply-password" class="text-right middle">密碼</label>
                </div>
                <div class="content">
                    <input placeholder="請輸入您的密碼" type="password" name="password" id="apply-password" aria-describedby="passwordHelpText" required>
                    
                </div>
            </div>
        </div>
        -->
        
    </div>

</div>

@endsection
