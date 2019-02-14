@extends('layouts.home')

@section('css')
<style>
    .eventLightBox span.btnbox
    {
        display: block;
        background-color: #ba9142;
        padding: 12px 25px;
        float: left;
        color: #fff;
        letter-spacing: 1px;
        font-size: 1rem;
        margin-top: 30px;
        line-height: 1.25rem;
        transition-property: all;
        transition-duration: 1s;
        transition-delay: .8s;
        transition-timing-function: cubic-bezier(.19,.8,.22,1);
   
        
    }
</style>   
@endsection
@section('content')
<div class="eventLightBox">
    <div class="content">
        <a class="close" href="#" id="eventClose">
            <span class="btnBox"></span>
        </a>
        <div class="left" style="background-image: url(images/indexEvent.jpg)"></div>
        <div class="right" style="overflow-y: scroll;">
            <h3>新年限定合歡禮盒85折優惠中</h3>
            <p class="period">活動期間：2018/01/01-2018/02/19</p>
            <p class="eventContent">
                象徵喜悅的「金雀」搭上幸福滋養的「丹鶴」，在新的一年，獻給最重要珍愛的人。
            </p>
            <a class="box" href="">
            
            </a>
        </div>
        <div class="" style="clear:both;"></div>
    </div>
</div>

<div class="wrapper index">
  <article class="mainContainer" id="fullpage">
      <!--首頁slider -->
      <!-- news index -->
      <section class="indesSlider">
            <!--新聞START-->
            @if(count($post))
            <div class="swiper-container newsboard swiper-news " >
                <div class="swiper-wrapper">
                   
                    @foreach($post as $k => $v)
                    <a class="container swiper-slide newsContent" href="javascript:;" id="">
                        <input name="title" type="hidden" value="{{$v->title}}">
                        <input name="subtitle" type="hidden" value="{{$v->subtitle}}">
                        <input name="content" type="hidden" value=" {!! nl2br($v->content) !!}">
                        <input name="publish_at" type="hidden" value="{{date('Y.m.d',strtotime($v->publish_at))}}">
                        <input name="cover" type="hidden" value="{{url($v->cover)}}">
                        <input name="btn" type="hidden" value="{{$v->btn}}">
                        <input name="url" type="hidden" value="{{$v->url}}">

                      <div class="picContainer">
                          <img src="{{url($v->cover)}}" alt="{{$v->title}}">
                      </div>
                      <div class="detialContainer">
                          <p>EVENT</p>
                          <h3>{{$v->title}}</h3>
                          <span class="prev">{{$v->brief}}</span>
                          <span class="data">{{date('Y.m.d',strtotime($v->publish_at))}}</span>
                      </div>
                    </a>
                    @endforeach
                </div>
                 <div class="swiper-pagination-news newsDot"></div>
            </div>
            <!--新聞END-->
            @endif
          <!-- Slider main container -->
          <div class="swiper-container mainSlider">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach($banner as $k => $v)
                  <div class="swiper-slide">
                      <div class="slider-contain" title="{{$v->title}}">
                          <picture>
                              <source srcset="{{url($v->cover_mb)}}" media="(max-width: 1025px)">
                              <img src="{{url($v->cover)}}" alt="{{$v->title}}" class="slider_pic">
                          </picture>

                          <div class="sloganContain">
                              <a class="box" href="{{$v->url?$v->url:'javascript:;'}}">

                                  <div class="sloganBox">
                                      <p>
                                          {!! nl2br($v->title) !!}
                                      </p>
                                  </div>
                                  @if($v->btn)
                                  <div class="buybox">
                                      <span  class="btnbox">
                                          <span class="line1"></span>
                                          <span class="line2"></span>

                                          {{$v->btn}}
                                      </span>
                                  </div>
                                  @endif
                              </a>
                          </div>
                      </div>
                  </div>
                  @endforeach  
                  
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>
          </div>
      </section>
      <!--首頁 幾何關係 -->
      <section class="relation">
          <div class="mainBox" style="background-image: url(images/relation.jpg);">
          </div>
          <div class="darkMask"></div>
          <a class="titleBox" href="{{url('relationship')}}">
              <p class="first">To Make the</p>
              <p class="sec">RELATION</p>
              <span class="box">幾何關係</span>
          </a>
      </section>
      <!--首頁 預約訂製 -->
      <section class="stories">
          <div class="mainBox" style="background-image: url(images/3cut_gift_84.jpg);">
          </div>
          <div class="darkMask"></div>
          <a class="titleBox" href="{{url('reservation')}}">
              <p class="first">We wrote the</p>
              <p class="sec">STORIES</p>
              <span class="box">
                  預約訂製
              </span>
          </a>
      </section>
      <!--首頁 店鋪資訊 -->
      <section class="location">
          <div class="mainBox" style="background-image: url(images/location_bg_03.jpg);">
          </div>
          <div class="locationContainer">
              <div class="info">
                  <h3>店鋪資訊</h3>
                  <!--
                  <div class="address">
                      店鋪地址
                  </div>
                  <div class="addressContent">
                      台北市大安區金華街86號
                      <a href="https://goo.gl/maps/AicL93WR7U72"  target="_blank" class="mapLink">Google map</a>
                      <a href="https://goo.gl/maps/AicL93WR7U72" target="_blank" class="mapLinkMobile"><i class="data-icon data-icon-map"></i></a>
                  </div>
-->
                  <div class="time">
                      營業時間
                  </div>
                  <div class="timeContent">
                  Mon. ~ Sun.  11:00 ~ 21:00
                  </div>
                  <div class="phone">
                      客服電話
                  </div>
                  <div class="phoneContent">
                  (02)2396-1528
                  </div>
                  <div class="mail">
                      電子郵件
                  </div>
                  <div class="mailContent">
                      <a href="mailto:jinjindingtw@gmail.com">jinjindingtw@gmail.com</a>
                  </div>
              </div>
          </div>
          <footer id="footer" class="index">
              <div class="mainContainer">
                  <div class="logo">
                      <picture>
                          <source type="image/svg+xml" srcset="images/logo-f.svg">
                          <img src="images/footer_logo_30.png" alt="My default image">
                      </picture>
                  </div>
                  <div class="right">
                      <div class="share">
                          <p>Follow us：</p>
                          @foreach($social as $k => $v)
                          <a href="{{$v->url}}" class="btn" title="{{$v->name}}"><i class="data-icon"><img src="{{url($v->icon)}}" alt="{{$v->name}}" /></i></a>
                          @endforeach
                       
                      </div>
                      <div class="copyright">
                          Copyright © JINJINDING All Rights Reserved
                      </div>
                  </div>
                  <div class="clear"></div>
              </div>
          </footer>
      </section>
  </article>
</div>
@endsection

@section('script')
<script>
$('.swiper-slide').click(function(){
    //console.log($(this).find( "input[name='title']" ).val());
   
    $('.eventLightBox').find('.left').css( 'background-image', 'url(' + $(this).find( "input[name='cover']" ).val() + ')');
    $('.eventLightBox').find('h3').text($(this).find( "input[name='title']" ).val());
    $('.eventLightBox').find('.period').text($(this).find( "input[name='subtitle']" ).val());
    $('.eventLightBox').find('.eventContent').html($(this).find( "input[name='content']" ).val());
    
    if($(this).find( "input[name='url']").val()){
        $('.eventLightBox').find('.box').attr('href',$(this).find( "input[name='url']").val());
        $btn = '<div class="buybox"><span  class="btnbox"><span class="line1"></span><span class="line2"></span>'+$(this).find( "input[name='btn']").val()+'</span></div>'
        $('.eventLightBox').find('.box').html($btn);
    }else{
        $('.eventLightBox').find('.box').html('');
    }
   
  

    
                
                    
                    

                    
                
            



});

</script>
@endsection