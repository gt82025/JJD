<!DOCTYPE html>
<html class="no-js" lang="zh-Hant-TW">

<head>
    <!-- 測試站防止被爬蟲搜尋 -->
    <!-- 
        上線後刪除此段Meta與註解
        參考文件：https://developers.google.com/search/reference/robots_meta_tag?hl=zh-tw
     -->
    <meta name="robots" content="noindex, nofollow,noarchive,nosnippet,noimageindex,noodp">
    <meta name="googlebot" content="noindex, nofollow">
    <!-- /End 測試站防止被爬蟲搜尋 -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="{{$meta->keywords}}">
    <meta name="author" content="Wade,Linus,金錦町">
    <meta name="copyright" content="{{$meta->title}}" />
    <meta name="URL" content="">

    <!-- for search engine -->
    <meta name="description" content="{{$meta->description}}">
    <link rel="author" href="google plus 個人頁網址/posts">
    <link rel="publisher" href="google plus 個人頁網址">
    <!-- for facebook -->
    <!-- 參考https://developers.facebook.com/docs/reference/opengraph/object-type/business.business/ -->
    <!-- 參考 https://webcode.tools/open-graph-generator/business -->

    <meta property="og:title" content="@yield('title'){{$meta->title}}">
    <meta property="og:url" content="{{url('')}}">
    <meta property="og:image" content="{{url($meta->image)}}">
    <meta property="og:description" content="{{$meta->description}}">
    <meta property="og:site_name" content="{{$meta->title}}" />
    <meta property="og:type" content="business.business" />
    <meta property="business:contact_data:street_address" content="Sample Contact data: Street Address" />
    <meta property="business:contact_data:locality" content="Sample Contact data: Locality" />
    <meta property="business:contact_data:postal_code" content="Sample Contact data: Postal Code" />
    <meta property="business:contact_data:country_name" content="Sample Contact data: Country Name" />
    <meta property="place:location:latitude" content="Sample Location: Latitude" />
    <meta property="place:location:longitude" content="Sample Location: Longitude" />

    <!-- for google plus -->
    <meta itemprop="name" content="@yield('title'){{$meta->title}}">
    <meta itemprop="image" content="{{url($meta->image)}}">
    <meta itemprop="description" content="{{$meta->description}}">
    <title>@yield('title'){{$meta->title}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon" href="images/touch-icon.png" />
    <!-- Css -->
    <!-- <link rel="stylesheet" href="css/loading.min.css"> -->

    <link rel="stylesheet" href="css/style.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet"> -->
    <style>
    html, body{
        margin: 0;
        padding: 0;
        border: 0;
        height: 100%;
        width: 100%;
        background-color: #C5AE91;
    }
    </style>
</head>

<body>
<iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fc3sos00p&bgcolor=EEEEEE&t=1536658011" width="100%" height="100%" seamless="seamless" scrolling="no" frameBorder="0" allowFullScreen="true"></iframe>
</body>

</html>
