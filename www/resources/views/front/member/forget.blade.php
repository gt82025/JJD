@extends('layouts.page')

@section('title', '忘記密碼 - ')

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
        
        <h3 class="Eng">FORGET</h3>
        <h3 class="Ch">忘記密碼</h3>
        
        @if (session('error'))
        <div class="alert alert-danger">
            <strong> {{ session('error') }} </strong>
        </div>
        @endif
        
        <div class="container">
            <div class="forgetPW " style="display:block">
              
                <p>如果您忘記密碼，請提供您的電子郵件地址， 我們將會寄給給您一封電子郵件， 提示您如何恢復恢復密碼。
                </p>
                <form  method="post" action="{{url('forget')}}">
                {!! csrf_field() !!}
                <label class="emailForm" for="email_1">E-mail
                    <input placeholder="" type="email" name="email" id="email_1" required>
                </label>
                <a class="send btnbox" href="javascript:;">
                
                    <span class="line1">  </span>
                    <span class="line2">  </span>
                    <input type="submit" value="確認">
                </a>
                </form>
               
            </div>
        </div>
    </div>

</div>

@endsection


