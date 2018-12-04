<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>感謝您 使用金錦町 JIN JIN DING線上訂購優質商品</h1>
		<p>親愛的 {{ $name }} 先生/小姐 您好：<br>
		已經收到您的訂購資訊，感謝您使用金錦町 JIN JIN DING訂購優質商品，<br>
		本通知函只是通知您本系統已經在{{ date('Y/m/d H:i:s') }}收到您的訂購訊息，
		並供您再次自行核對之用，不代表交易已經完成。
		</p>
		
		<h3>訂單資訊</h3>
		<table width="600" style="border:1px solid #c8c8c8">
			<tbody>
				<tr>
					<td style="border:1px solid #c8c8c8;width:100;"></td>
					<td style="border:1px solid #c8c8c8">商品資訊</td>
					<td style="border:1px solid #c8c8c8" align="center">數量</td>
					<td style="border:1px solid #c8c8c8" align="center">單價</td>
					<td style="border:1px solid #c8c8c8" align="center">總價</td>
				</tr>
				@foreach($cart as $k => $v)
				<tr>
				<td style="border:1px solid #c8c8c8">
				
					<img src="{{url($v['product']['cover'])}}" alt="{{$v['product']['name']}}" width="100"> 
				
				</td>
				<td style="border:1px solid #c8c8c8">
				{{$v['product']['name']}}<br>
				{{$v['product']['category']['name']}} {{$v['name']}}<br>
				{{$v['product']['taste']}}
				@if($v['content_detail'])
				<br><a href="{{url('member')}}">(口味詳細內容情查看訂單紀錄)</a>
				@endif
				</td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['qty']}} </td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['price']}} </td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['total']}} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br><br>

		<h3>付款資訊</h3>
		訂單編號：{{ $order_number }}<br>
		付款方式：{{ $PaymentType }}<br>
		商品小計：{{ $bill['subtotal'] }}<br>
		@if($bill['discount']>0)
		折扣金額：{{ $bill['discount'] }}<br>
		@endif
		常溫費用：{{ $bill['freight_normal'] }}<br>
		低溫費用：{{ $bill['freight_special'] }}<br>
		商品總額：{{ $bill['total'] }}<br>
		<br>
		<br>
		<h3>收件人資訊</h3>
		姓名：{{ $to_name }}<br>
		E-Mail：{{ $to_email }}<br>
		連絡電話：{{ $to_phone }}<br>
		收件地址：{{ $to_address }}<br>
		<br>
		<br>
		<h3>發票資訊</h3>
		{{ $invoice }}<br>
		公司抬頭：{{ $uniform_title }}<br>
		統一編號：{{ $uniform }}<br>
		收件人：{{ $uniform_name }}<br>
		收件地址：{{ $uniform_address }}<br>
		<br>
		<br>
		@if($PaymentType == '銀行匯款')
        <h3>匯款資訊</h3>
            戶名：金鉑國際股份有限公司<br>
            銀行：上海商業銀行 北中和分行<br>
            銀行代碼：011<br>
			帳戶號碼：56102000023608<br>
		<br>
		<br>
		@endif
		
		***系統自動發信，有問題請使用客服系統詢問***
		<br>
		<br>
		金錦町 JIN JIN DING<br>
		Website: http://www.jinjind.com/<br>
		E-mail: service@jinjind.com
		
		
		
		

    </body>
</html>