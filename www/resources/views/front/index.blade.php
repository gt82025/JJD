@extends('layouts.home')

@section('content')
<div class="wrapper index">
  <article class="mainContainer" id="fullpage">
      <!--首頁slider -->
      <!-- news index -->
      <section class="indesSlider">
          <div class="newsboard">
              <a class="container">
                  <div class="picContainer">
                      <img src="images/news_pic.jpg" alt="">
                  </div>
                  <div class="detialContainer">
                      <p>NEWS</p>
                      <h3>{{$post->title}}</h3>
                      <span class="data">{{$post->publish_at}}</span>
                  </div>
              </a>
          </div>
          <!-- Slider main container -->
          <div class="swiper-container">
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
          <a class="titleBox" href="#">
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
