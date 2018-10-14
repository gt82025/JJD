@extends('layouts.page')

@section('title', '加入會員 - ')

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
<div class="PersonalCapitalMain close">
    <div class="mainContent">
        <a href="javascript:;" class="closeBtn"></a>
        <h2>個人資料保護聲明</h2>
        <p>
            金錦町(金鉑國際股份有限公司)非常尊重消費者的隱私權，對於會員資料的蒐集、處理及利用均遵守中華民國政府之「個人資料保護法」及相關法令規範，您可以參照以下隱私權政策，了解我們如何蒐集、處理、利用您的個人資料及對您的隱私資料的保護措施：
        </p>
        <p class="section" num="1.">
            本公司基於契約或類似契約履行事項、行政管理、資訊提供、統計調查及分析，及其他合於本公司營業活動所需之特定目的內，蒐集您的個人資料（資料類別請參照法務部公布「個人資料保護法之個人資料類別」代號C001至C116、C120、C121或C132等個人資料）。
        </p>
        <p class="section" num="2.">
            本公司就您的個人資料僅在上述開特定目的內，於台灣地區（包括澎湖、金門及馬祖等地區）或其他為完成上述開特定目的所必需之地區，供本公司以合法合理方式利用，並以完成上述開特定目的或本公司執行業務所必須之期間為利用期間。
        </p>
        <p class="section" num="3.">
            您可以選擇是否提供上開個人資料予本公司；然而，當您提供之個人資料未臻完備時，將可能影響前述特定目的之遂行，亦影響您後續相關權益。
        </p>
        <p class="section" num="4.">
            您可以選擇是否提供上開個人資料予本公司；然而，當您提供之個人資料未臻完備時，將可能影響前述特定目的之遂行，亦影響您後續相關權益。
        </p>
        <p class="section" num="5.">
            您並同意以電子文件作為表示個人資料保護法令或其他法令所規定書面同意之方法。
        </p>
        <p class="section" num="6.">
            您可以透過客服信箱 service@jinjinding.com.tw 或電話 0800-123-456 與我們聯繫，進行個人資料查詢閱覽、製給複製本，並補充或更正，或請求本公司停止蒐集、處理、利用或刪除您的個人資料，或停止寄發資料或資訊。
        </p>
    </div>
</div>
<div class="applyContainer">
    <form id="form" method="post" action="{{ url('register') }}">
    {!! csrf_field() !!}
    <div class="formContainer">
        
            <h3 class="Eng">Create Account</h3>
            <h3 class="Ch">加入會員</h3>

            @if (count($errors) >0)
            <div class="alert alert-danger">
                @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
                @endif
                @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
                @endif
                @if ($errors->has('phone'))
                <strong>{{ $errors->first('phone') }}</strong>
                @endif
                @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                @endif
               
                @if ($errors->has('agree'))
                <strong>{{ $errors->first('agree') }}</strong>
                @endif
            </div>
            @endif

            <div class="boxHead">
                會員資料
            </div>
            
            <div class="fillInfo">
                <div class="formBox">
                    <div class="title">
                        <label for="real_Name" class="text-right middle">姓名</label>
                    </div>
                    <div class="content">
                        <input type="text" id="real_Name" name="name" placeholder="請輸入您的真實姓名" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="title" class="text-right middle">稱謂</label>
                    </div>
                    <div class="content">
                        <select id="title" name="title">
                           
                            <option value="先生">先生</option>
                            <option value="小姐">小姐</option>
                        </select>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="birthday" class="text-right middle">生日</label>
                    </div>
                    <div class="content" id="birthday">
                        <select id="month" name="month"></select>
                        <select id="date" name="date"></select>
                        <select id="year" name="year"></select>
                    </div>
                </div>
                <div class="formBox ">
                    <div class="title">
                        <label for="Email" class="text-right middle">E-mail</label>
                    </div>
                    <div class="content">
                        <input type="text" id="Email" placeholder="請輸入您的電子信箱" aria-describedby="mailHelpText" name="email" value="{{ old('email') }}" required>
                        <p class="help-text" id="passwordHelpText">
                            ※E-mail將成為會員帳號
                        </p>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="phoneNumber" class="text-right middle" >手機</label>
                    </div>
                    <div class="content">
                        <input type="text" id="phoneNumber" placeholder="請輸入您的手機號碼" name="phone" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="lineId" class="text-right middle">Line ID</label>
                    </div>
                    <div class="content">
                        <input type="text" id="lineId" placeholder="請輸入您的Line ID" name="line" value="{{ old('line') }}">
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="apply-password" class="text-right middle">密碼</label>
                    </div>
                    <div class="content">
                        <input placeholder="請輸入您的密碼" type="password" name="password" id="apply-password" aria-describedby="passwordHelpText" required>
                        <p class="PwNotice">※請輸入8字以上20字以下的半形英文或數字。</p>
                        <p class="PwNotice">※請設定英文和數字混合的字串。</p>
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="rePassword" class="text-right middle">確認密碼</label>
                    </div>
                    <div class="content">
                        <input placeholder="請輸入您的密碼" type="password" name="password_confirmation" id="rePassword" aria-describedby="passwordHelpText">
                        <p class="PwNotice">※請再輸入一次密碼。</p>
                    </div>
                </div>
                <div class="linecontainer">
                    <div class="line"></div>
                </div>
                <fieldset class="fieldset agree">
                    <input id="agree_1" type="checkbox" name="agree">
                    <label for="agree_1">了解並同意我們的<a href="javscript:;" class="PersonalCapital">個資保護聲明。</a></label>
                    <br>
                    <input id="agree_2" type="checkbox" name="news" value="願意">
                    <label for="agree_2">願意收到金錦町相關優惠通知訊息。</label>
                </fieldset>
            </div>
        
    </div>
    <div class="sendContainer">
        <a class="send btnbox" href="javascript:;">
            <input  class="send btnbox" name="commit" tabindex="3" type="submit" value="註冊">
            <span class="line1">  </span>
            <span class="line2">  </span>
        </a>
    </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{url('js/birthday.js')}}"></script>
<script type="text/javascript">
      
    $(function () {

        $.ms_DatePicker({
            YearSelector: "#year",
            MonthSelector: "#month",
            DaySelector: "#date"
        });
        
    });
</script>
@endsection
