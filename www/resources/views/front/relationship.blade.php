@extends('layouts.page')

@section('title', '幾何關係 - ')


@section('content')
<article class="appointment close ">
    <div class="board">
        <a href="#" class="closeBtn cart"> 
        </a>      
        <h1>Reservation </h1> 
        <h3>預約品嚐</h3>
        <p>品嚐鑑賞金錦町的細緻與美味</p>
        <form action="">
            <div class="fillInfo">
                <div class="formBox">
                    <div class="title">
                        <label for="real_Name" class="text-right middle">姓名</label>
                    </div>
                    <div class="content">
                        <input type="text" id="real_Name" placeholder="請輸入您的真實姓名">
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="Phone" class="text-right middle">電話</label>
                    </div>
                    <div class="content">
                        <input type="text" id="Phone" placeholder="請輸入您的真實姓名">
                    </div>
                </div>
                <div class="formBox">
                    <div class="title">
                        <label for="date" class="text-right middle">日期</label>
                    </div>
                    <div class="content">
                        <input type="date" id="date" name="date">
                    </div>
                </div>
            </div>
            <div class="buttonContainer">
                <a href="#">門市品嚐</a>
                <a href="#">宅配品嚐</a>
            </div>
        </form>
    </div>
</article>
<article class="relation">
    <section class="main" id="Main">
        <div class="textBox">
            <h1>
                <span>To Make the</span><br>Relation 
        </div>
        <picture>
            <source srcset="images/relation_main.jpg" media="(max-width: 1025px)">
            <img src="images/relation_main.jpg" alt="產品名稱" class="slider_pic" alt="產品名稱">
        </picture>
    </section>
    <section class="Geometric" id="Geometric">
        <div class="svgContainerA a1">
            <div class="svgBox">
                <canvas class="complex_circle">
                    
                </canvas>
                <div class="item complex_circle">
                    <svg version="1.1" id="complex_circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="249.999" r="206.692" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M67.738,152.433" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M424.83,360.306" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="67.738" y1="152.433" x2="424.646" y2="360.597" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="213.381" y1="46.479" x2="445.044" y2="181.423" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="64.442" y1="341.153" x2="261.677" y2="456.423" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="56.06" y1="321.638" x2="96.53" y2="321.573" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="161.724,436.946 128.828,378.782 102.187,394.474 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.828" y1="264.736" x2="128.828" y2="417.466" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="113.835" y1="405.505" x2="193.77" y2="264.368" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="88.393" y1="378.896" x2="194.729" y2="378.985" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="238.738,456.692 226.971,435.917 194.729,378.985 259.563,264.313 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="160.162" y1="436.2" x2="293.402" y2="436.2" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="300.852" y1="450.39" x2="292.871" y2="436.2" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="292.715" y1="320.528" x2="217.08" y2="454.085" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="292.871" y1="436.2" x2="357.764" y2="321.587" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.613" y1="207.185" x2="96.53" y2="321.573" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.221" y1="377.511" x2="96.53" y2="321.573" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="353.866,428.739 325.316,378.655 259.796,378.655 227.145,321.903 161.613,321.903 128.828,264.736 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="129.072" y1="264.368" x2="62.961" y2="264.368" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="95.57" y1="207.329" x2="47.563" y2="291.921" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="63.304" y1="264.188" x2="44.163" y2="231.072" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="63.304" y1="161.196" x2="63.304" y2="263.809" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="66.34" y1="155.085" x2="95.57" y2="207.329" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="95.57,207.185 227.142,207.185 259.563,264.016 325.84,264.016 357.764,321.587 423.613,321.587 435.429,342.456 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="69.105,149.903 128.912,149.903 193.77,264.38 259.563,264.38 292.123,321.573 357.764,321.573 390.232,378.655 411.736,378.655 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="182.782" y1="54.483" x2="128.912" y2="149.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="226.248" y1="92.3" x2="161.613" y2="207.185" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="324.196" y1="149.428" x2="259.563" y2="264.313" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.225" y1="149.394" x2="325.59" y2="264.279" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="422.397" y1="206.702" x2="357.764" y2="321.587" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="313.621" y1="54.138" x2="227.142" y2="207.185" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="116.247,92.413 161.223,92.413 193.931,149.741 259.619,149.741 291.995,206.702 357.691,206.702 390.166,263.626 456.231,263.626 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="201.731,48.975 226.248,92.3 291.879,92.3 324.196,149.428 390.225,149.428 422.397,206.702 452.141,206.659 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="51.908" y1="309.192" x2="128.221" y2="264.38" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M72.525,259.089" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.619" y1="149.741" x2="63.304" y2="264.188" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="264.799,43.83 291.879,92.3 357.9,92.3 390.225,149.428 430.598,149.428 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.828" y1="378.782" x2="227.145" y2="321.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="227.145" y1="455.44" x2="227.145" y2="321.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="201.82" y1="451.046" x2="325.316" y2="378.655" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="357.907" y1="426.319" x2="357.907" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.223" y1="92.413" x2="161.223" y2="321.638" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.232" y1="378.655" x2="366.492" y2="420.761" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.796" y1="378.655" x2="456.231" y2="263.626" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="423.613" y1="321.587" x2="455.602" y2="264.736" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.613" y1="321.903" x2="357.691" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.652" y1="149.903" x2="259.796" y2="377.511" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="71.971" y1="144.927" x2="161.223" y2="92.413" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="193.931" y1="149.903" x2="193.931" y2="51.137" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="340.374" y1="64.063" x2="193.931" y2="149.741" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="291.879" y1="206.702" x2="291.879" y2="48.133" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="419.755" y1="132.048" x2="291.995" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.08" y1="98.015" x2="390.166" y2="262.46" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="357.59" y1="92.3" x2="365.457" y2="78.536" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="408.739" y1="116.536" x2="390.298" y2="149.569" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="455.602" y1="225.917" x2="391.145" y2="263.626" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="circle_group">
                    
                </canvas>
                <div class="item circle_group">
                    <svg version="1.1" id="circle_group" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="111.251" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="111.251" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="111.251" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="250" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="250" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="250" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="388.749" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="388.749" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="388.749" r="69.375" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="hexagon">
                    
                </canvas>                
                <div class="item hexagon">
                    <svg version="1.1" id="hexagon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="61.525" y1="358.928" x2="250" y2="31.954" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="61.166" y1="140.978" x2="250" y2="468.046" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="438.473" y1="358.928" x2="250" y2="31.954" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="438.834" y1="140.978" x2="250" y2="468.046" />
                        <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="61.166,359.023 250,468.046 438.834,359.023 438.834,140.978 250,31.954 61.166,140.978 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="375.686" y1="250" x2="124.213" y2="250" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="semicircle">
                    
                </canvas>                 
                <div class="item semicircle">
                    <svg version="1.1" id="semicircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M479.684,367.049C479.158,240.644,376.529,132.951,250,132.951c-126.529,0-229.158,107.693-229.684,234.098H479.684z" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="250" r="57.58" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="stick">
                    
                </canvas>                  
                <div class="item stick">
                    <svg version="1.1" id="stick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <g id="_x35_">
                            <rect x="1.392" y="205.839" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" width="497.217" height="88.321" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="diamond">
                    
                </canvas>                 
                <div class="item diamond ">
                    <svg version="1.1" id="diamond" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="193.775,100.372 122.898,135.811 83.523,224.406 248.9,399.628 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="195.531,100.372 306.127,100.372 377.004,135.811 416.379,224.406 251.002,399.628 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="83.523,224.406 166.213,196.843 195.531,100.372 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="416.477,224.406 333.789,196.843 304.469,100.372 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="249.131,399.628 333.789,196.843 166.213,196.843 250.869,399.628 " />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="box">
                    
                </canvas>                  
                <div class="item box ">
                    <svg version="1.1" id="box" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <rect x="55.723" y="127.845" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" width="388.555" height="244.311" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="heart">
                    
                </canvas>                   
                <div class="item heart ">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <g id="_x38_">
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="321.143,53.764 340.748,77.246 403.013,109.675 471.729,147.436     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="426.672,79.85 357.636,202.356 250,311.299 250,106.493 321.143,53.764 426.672,79.85 471.729,147.436 471.729,242.292 411.257,341.893 250.537,446.235 369.286,283.499     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="250,311.299 369.286,283.499 425.065,236.8 471.729,147.436   " />
                            <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="369.286,283.499 408.568,343.645 425.065,236.8 357.636,202.356   " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="357.636,202.356 250,135.619 360.864,63.583  " />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="425.065" y1="236.8" x2="471.729" y2="242.292" />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="178.857,53.764 159.253,77.246 96.988,109.675 28.271,147.436   " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="73.329,79.85 142.365,202.356 250,311.299 250,106.493 178.857,53.764 73.329,79.85 28.271,147.436 28.271,242.292 88.744,341.893 249.463,446.235 130.715,283.499     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="28.271,147.436 74.936,236.8 130.715,283.499 250,311.299     " />
                            <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="130.715,283.499 91.432,343.645 74.936,236.8 142.365,202.356    " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="142.365,202.356 250,135.619 139.137,63.583  " />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="74.936" y1="236.8" x2="28.271" y2="242.292" />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="250" y1="311.299" x2="250" y2="446.235" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <div class="svgContainerB b1">
            <div class="svgBox">
                <canvas class="complex_circle"></canvas>
                <div class="item complex_circle">
                    <svg version="1.1" id="complex_circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="249.999" r="206.692" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M67.738,152.433" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M424.83,360.306" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="67.738" y1="152.433" x2="424.646" y2="360.597" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="213.381" y1="46.479" x2="445.044" y2="181.423" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="64.442" y1="341.153" x2="261.677" y2="456.423" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="56.06" y1="321.638" x2="96.53" y2="321.573" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="161.724,436.946 128.828,378.782 102.187,394.474 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.828" y1="264.736" x2="128.828" y2="417.466" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="113.835" y1="405.505" x2="193.77" y2="264.368" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="88.393" y1="378.896" x2="194.729" y2="378.985" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="238.738,456.692 226.971,435.917 194.729,378.985 259.563,264.313 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="160.162" y1="436.2" x2="293.402" y2="436.2" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="300.852" y1="450.39" x2="292.871" y2="436.2" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="292.715" y1="320.528" x2="217.08" y2="454.085" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="292.871" y1="436.2" x2="357.764" y2="321.587" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.613" y1="207.185" x2="96.53" y2="321.573" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.221" y1="377.511" x2="96.53" y2="321.573" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="353.866,428.739 325.316,378.655 259.796,378.655 227.145,321.903 161.613,321.903 128.828,264.736 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="129.072" y1="264.368" x2="62.961" y2="264.368" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="95.57" y1="207.329" x2="47.563" y2="291.921" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="63.304" y1="264.188" x2="44.163" y2="231.072" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="63.304" y1="161.196" x2="63.304" y2="263.809" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="66.34" y1="155.085" x2="95.57" y2="207.329" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="95.57,207.185 227.142,207.185 259.563,264.016 325.84,264.016 357.764,321.587 423.613,321.587 435.429,342.456 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="69.105,149.903 128.912,149.903 193.77,264.38 259.563,264.38 292.123,321.573 357.764,321.573 390.232,378.655 411.736,378.655 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="182.782" y1="54.483" x2="128.912" y2="149.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="226.248" y1="92.3" x2="161.613" y2="207.185" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="324.196" y1="149.428" x2="259.563" y2="264.313" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.225" y1="149.394" x2="325.59" y2="264.279" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="422.397" y1="206.702" x2="357.764" y2="321.587" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="313.621" y1="54.138" x2="227.142" y2="207.185" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="116.247,92.413 161.223,92.413 193.931,149.741 259.619,149.741 291.995,206.702 357.691,206.702 390.166,263.626 456.231,263.626 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="201.731,48.975 226.248,92.3 291.879,92.3 324.196,149.428 390.225,149.428 422.397,206.702 452.141,206.659 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="51.908" y1="309.192" x2="128.221" y2="264.38" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M72.525,259.089" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.619" y1="149.741" x2="63.304" y2="264.188" />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="264.799,43.83 291.879,92.3 357.9,92.3 390.225,149.428 430.598,149.428 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="128.828" y1="378.782" x2="227.145" y2="321.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="227.145" y1="455.44" x2="227.145" y2="321.903" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="201.82" y1="451.046" x2="325.316" y2="378.655" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="357.907" y1="426.319" x2="357.907" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.223" y1="92.413" x2="161.223" y2="321.638" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.232" y1="378.655" x2="366.492" y2="420.761" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.796" y1="378.655" x2="456.231" y2="263.626" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="423.613" y1="321.587" x2="455.602" y2="264.736" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="161.613" y1="321.903" x2="357.691" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="259.652" y1="149.903" x2="259.796" y2="377.511" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="71.971" y1="144.927" x2="161.223" y2="92.413" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="193.931" y1="149.903" x2="193.931" y2="51.137" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="340.374" y1="64.063" x2="193.931" y2="149.741" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="291.879" y1="206.702" x2="291.879" y2="48.133" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="419.755" y1="132.048" x2="291.995" y2="206.702" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="390.08" y1="98.015" x2="390.166" y2="262.46" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="357.59" y1="92.3" x2="365.457" y2="78.536" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="408.739" y1="116.536" x2="390.298" y2="149.569" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="455.602" y1="225.917" x2="391.145" y2="263.626" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="circle_group"></canvas>
                <div class="item circle_group">
                    <svg version="1.1" id="circle_group" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="111.251" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="111.251" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="111.251" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="250" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="250" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="250" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="111.251" cy="388.749" r="69.375" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="388.749" r="69.374" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="388.749" cy="388.749" r="69.375" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="hexagon"></canvas>
                <div class="item hexagon">
                    <svg version="1.1" id="hexagon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="61.525" y1="358.928" x2="250" y2="31.954" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="61.166" y1="140.978" x2="250" y2="468.046" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="438.473" y1="358.928" x2="250" y2="31.954" />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="438.834" y1="140.978" x2="250" y2="468.046" />
                        <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="61.166,359.023 250,468.046 438.834,359.023 438.834,140.978 250,31.954 61.166,140.978 " />
                        <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="375.686" y1="250" x2="124.213" y2="250" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="semicircle"></canvas>
                <div class="item semicircle">
                    <svg version="1.1" id="semicircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <path fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" d="M479.684,367.049C479.158,240.644,376.529,132.951,250,132.951c-126.529,0-229.158,107.693-229.684,234.098H479.684z" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" cx="250" cy="250" r="57.58" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="stick"></canvas>
                <div class="item stick">
                    <svg version="1.1" id="stick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <g id="_x35_">
                            <rect x="1.392" y="205.839" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" width="497.217" height="88.321" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="diamond"></canvas>
                <div class="item diamond ">
                    <svg version="1.1" id="diamond" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="193.775,100.372 122.898,135.811 83.523,224.406 248.9,399.628 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="195.531,100.372 306.127,100.372 377.004,135.811 416.379,224.406 251.002,399.628 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="83.523,224.406 166.213,196.843 195.531,100.372 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="416.477,224.406 333.789,196.843 304.469,100.372 " />
                        <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="249.131,399.628 333.789,196.843 166.213,196.843 250.869,399.628 " />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="box"></canvas>
                <div class="item box ">
                    <svg version="1.1" id="box" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <rect x="55.723" y="127.845" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" width="388.555" height="244.311" />
                    </svg>
                </div>
            </div>
            <div class="svgBox">
                <canvas class="heart"></canvas>
                <div class="item heart ">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                        <g id="_x38_">
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="321.143,53.764 340.748,77.246 403.013,109.675 471.729,147.436     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="426.672,79.85 357.636,202.356 250,311.299 250,106.493 321.143,53.764 426.672,79.85 471.729,147.436 471.729,242.292 411.257,341.893 250.537,446.235 369.286,283.499     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="250,311.299 369.286,283.499 425.065,236.8 471.729,147.436   " />
                            <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="369.286,283.499 408.568,343.645 425.065,236.8 357.636,202.356   " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="357.636,202.356 250,135.619 360.864,63.583  " />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="425.065" y1="236.8" x2="471.729" y2="242.292" />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="178.857,53.764 159.253,77.246 96.988,109.675 28.271,147.436   " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="73.329,79.85 142.365,202.356 250,311.299 250,106.493 178.857,53.764 73.329,79.85 28.271,147.436 28.271,242.292 88.744,341.893 249.463,446.235 130.715,283.499     " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="28.271,147.436 74.936,236.8 130.715,283.499 250,311.299     " />
                            <polygon fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="130.715,283.499 91.432,343.645 74.936,236.8 142.365,202.356    " />
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" points="142.365,202.356 250,135.619 139.137,63.583  " />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="74.936" y1="236.8" x2="28.271" y2="242.292" />
                            <line fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-miterlimit="10" x1="250" y1="311.299" x2="250" y2="446.235" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    
        <div class="textBox">
            <h2>
                Geometric
            </h2>
            <h3>
                幾何，是自然萬物的基本型態 <br>
萬物間的生生律動，來自點線面的多重演變
            </h3>
        </div>
    </section>
    <section class="People" id="People">
        <div class="openDoor">
            <div class="hexagon_intro">
                <div class="hexagon">
                    <img src="images/hexagon_2.png" alt="">
                    <div class="textBox">
                        <h2>
                            Geometric
& people
                        </h2>
                        <h3>從幾何的微物隱喻，<br>
到人與人之間的幾何關係<br>
我們透過甜點，穿越人情的象限</h3>
                    </div>

                    
                </div>
                

            </div>
            <div class="left ">
                <div class="picConteiner">
                    <img src="images/people_left.png" alt="">

                </div>
                </div>
                <div class="right ">
                    <div class="picConteiner">
                        <img src="images/people_right.png" alt="">
                </div>
                    </div>
                </div>
                <div class="content">
                    <div class="colorfulground">
                        <div class="hexagonContainer">
                            <div class="hexagon1">
                                <img src="images/hexagon.png" alt="">
                            </div>
                           <div class="hexagon2">
                                    <img src="images/hexagon.png" alt="">
                            </div>
                            <div class="hexagon3">
                                        <img src="images/hexagon.png" alt="">
                            </div>
                            <div class="hexagon4">
                                            <img src="images/hexagon.png" alt="">
                            </div>
                            <div class="hexagon5">
                                                <img src="images/hexagon.png" alt="">
                            </div>
                            <div class="hexagon6">
                                                    <img src="images/hexagon.png" alt="">
                            </div>
                        </div>
                        <div class="girlContainer">
                            <div class="hand_cake_1 cake">
                                <img src="images/people_girl_h1.png" alt="">
                            </div>
                            <div class="hand_cake_2 cake">
                                <img src="images/people_girl_h2.png" alt="">
                            </div>
                            <div class="hand_cake_3 cake">
                                <img src="images/people_girl_h3.png" alt="">
                            </div>
                            <div class="hand_cake_4 cake">
                                 <img src="images/people_girl_h4.png" alt="">
                            </div>
                            <div class="hand_cake_5 cake">
                                <img src="images/people_girl_h5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <section class="feelingStory" id="FeelingStory">
        <div class="container">
            <canvas id="ballContainer">
                
            </canvas>
            <div class="dotItemBig a">
                <img src="images/ballItems_3.png" alt="">  
            </div>
            <div class="dotItemBig b">
                <img src="images/ballItems_2.png" alt="">  
            </div>
            <div class="dotItemBig c">
                <img src="images/ballItems_1.png" alt="">  
            </div>            
            <div class="picOuter1">
              <img src="images/diamond_history.png" alt="" class="feeling_pic_1">   
            </div>
            <div class="picOuter2">
                <img src="images/red_history.png" alt="" class="feeling_pic_2">   
            </div>
            <div class="textBox FS">
                <h2>feeling & story</h2>
                <h3>將產品型態趨向最簡、將質地與色彩極簡堆疊
加上一點點情感調味、一點點故事點綴</h3>
            </div>
        </div>
    </section>
    <section class="relationSweeter" id="relationSweeter">
        <div class="container">
            <div class="box item1">
                <div class="bgColor">
                    <div class="picLayer2">
                        
                    </div>
                    <div class="pic">
                </div>
                </div>

            </div>
            <div class="box item2">
                <div class="bgColor">
                                    <div class="textBox">
                    Relation<br>Sweeter
                </div>
                <div class="picLayer2"></div>
                <div class="picPeople">
                </div>
                </div>

            </div>
            <div class="box item3">
                <div class="bgColor">
                                                    <div class="textBox">
                    Relation Sweeter
                </div>
                <div class="picLayer2"></div>
                <div class="picPeople">
                </div>
                    
                </div>

            </div>
            <div class="box item4">
                <div class="bgColor">
                   <div class="pic">
                </div>      
                <div class="picLayer2"></div>           
                </div>

            </div>
            <div class="box item5">
                <div class="bgColor">
                <div class="picLayer2"></div>                
                    <div class="pic">
                </div></div>

            </div>
            <div class="box item6">
                <div class="bgColor">
                    <div class="picLayer2"></div>    
                    <div class="pic">
                </div></div>

            </div>
            <div class="box item7">
                <div class="bgColor">
                    <div class="picLayer2"></div>
                    <div class="pic">
                </div></div>
                
            </div>
            <div class="box item8">
                <div class="bgColor">
                    <div class="picLayer2"></div>
                    <div class="pic"></div>
                </div>
                
            </div>
            <div class="box item9">
                <div class="bgColor">
                    <div class="picLayer2"></div>
                    <div class="pic"></div></div>
                                
            </div>
            <div class="box item10">
                <div class="bgColor">
                    <div class="picLayer2"></div>
                    <div class="pic"></div>
                </div>
                                                
            </div>
        </div>
    </section>
    <section class="Last_cut" id="Last_Cut">
        <div class="container" id="girlContainer">
            <div class="textbox">
                <p class="des1">
                    To Make the 
                    
                </p>
                <h2>
                    Relation Sweeter
                    
                </h2>
                <p class="des2">
                    讓人與人之間的送禮，像是純粹且明白的幾何關係
                </p>
                
            </div>
        </div>
        
    </section>
</article>
@endsection

@section('script')
<script src="{{url('js/page/relationship.min.js')}}"></script>
@endsection

