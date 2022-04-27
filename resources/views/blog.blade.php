<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
        
        use App\Http\Controllers\idiomaController; 
        if (Session::has('idioma')){
        $idioma = Session::get('idioma');
        }else{
        $idioma = 'ESP';
        }
        use App\Http\Controllers\imagenesController; 
        
        $banner = imagenesController::traerImagen('banner_1');
    
    ?>
    <title>{{idiomaController::traerTexto('actividades',$idioma);}} | Organización Sin Fronteras</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{asset('assets/images/Logol2.png')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!--== Icofont CSS ==-->
    <link href="{{asset('assets/css/icofont.css')}}" rel="stylesheet"/>
    <!--== ElegantIcons CSS ==-->
    <link href="{{asset('assets/css/elegantIcons.css')}}" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet"/>
    <!--== Aos CSS ==-->
    <link href="{{asset('assets/css/aos.css')}}" rel="stylesheet"/>
    <!--== FancyBox CSS ==-->
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="{{asset('assets/css/slicknav.css')}}" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="{{asset('assets/css/style2.css')}}" rel="stylesheet" />

</head>

<body>

<!--wrapper start-->
<div class="wrapper blog-page-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
  	<div class="preloader">
	    <span class="dot"></span>
	    <div class="dots">
        <span></span>
        <span></span>
        <span></span>
	    </div>
  	</div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  @include('navbar')
  <!--== End Header Wrapper ==-->

  <main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="{{$banner->ruta}}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">{{idiomaController::traerTexto('actividades',$idioma);}}</h2>
              <div class="bread-crumbs"><a href="{{route('index')}}">{{idiomaController::traerTexto('inicio',$idioma);}}<span class="breadcrumb-sep">//</span></a><span class="active">{{idiomaController::traerTexto('actividades',$idioma);}}</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-grid-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="blog-content-column">
              <div class="blog-content-area post-items-style2">
                <!--== Start Blog Post Item ==-->
                @foreach ($resultado as $fila)
                    <div class="post-item">
                        <div class="thumb">
                            <a href="{{route('blog.detalle',['id'=>$fila->id])}}"><img src="{{$fila->principal()->ruta}}" alt="Givest-Blog"></a>
                            <div class="meta-date">
                            <a href="blog.html"><span>{{Carbon\Carbon::parse($fila->fecha)->format('d')}}</span> {{idiomaController::traerTexto(Carbon\Carbon::parse($fila->fecha)->format('M'),$idioma);}}</a>
                            </div>
                            <div class="shape-line"></div>
                        </div>
                        <div class="content">
                            <div class="inner-content">
                            <div class="meta">
                                <a class="post-category" href="blog.html">{{idiomaController::traerTexto($fila->programa,$idioma);}}</a>
                                <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="assets/images/icons/admin1.png" alt="Icon-Image"></span>By: {{$fila->escritor}}</a>
                            </div>
                            <h4 class="title">
                                <a href="{{route('blog.detalle',['id'=>$fila->id])}}">{{$fila->titulo_1}}</a>
                            </h4>
                            <p>{{$fila->resena}}</p>
                            <a href="{{route('blog.detalle',['id'=>$fila->id])}}" class="btn-theme btn-border-gradient btn-size-md"><span>{{idiomaController::traerTexto('leer_mas',$idioma);}} <img class="icon icon-img" src="assets/images/icons/arrow-line-right-gradient.png" alt="Icon"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <!--== End Blog Post Item ==-->

                <!--== Start Blog Post Item ==-->
                {{-- <div class="post-item">
                  <div class="thumb">
                    <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}"><img src="assets/img/blog/g2.jpg" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>15</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                    <a class="btn-play play-video-popup" href="https://player.vimeo.com/video/174392490?dnt=1&amp;app_id=122963"><span class="icon"><img src="assets/img/icons/play.png" alt="Icon"></span></a>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Education</a>
                        <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="assets/img/icons/admin1.png" alt="Icon-Image"></span>By: Marinda Roderick</a>
                      </div>
                      <h4 class="title">
                        <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}">Children Education Needs For Change The World.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has industry's standard dummy text ever since the 1500 an when an unknown printer took a galley scrambled it to make a type specimen book.</p>
                      <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}" class="btn-theme btn-border-gradient btn-size-md"><span>Read More <img class="icon icon-img" src="assets/img/icons/arrow-line-right-gradient.png" alt="Icon"></span></a>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->

                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}"><img src="assets/img/blog/g3.jpg" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>15</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Education</a>
                        <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="assets/img/icons/admin1.png" alt="Icon-Image"></span>By: Marinda Roderick</a>
                      </div>
                      <h4 class="title">
                        <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}">Children Education Needs For Change The World.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has industry's standard dummy text ever since the 1500 an when an unknown printer took a galley scrambled it to make a type specimen book.</p>
                      <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}" class="btn-theme btn-border-gradient btn-size-md"><span>Read More <img class="icon icon-img" src="assets/img/icons/arrow-line-right-gradient.png" alt="Icon"></span></a>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->

                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}"><img src="assets/img/blog/g4.jpg" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>15</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Education</a>
                        <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="assets/img/icons/admin1.png" alt="Icon-Image"></span>By: Marinda Roderick</a>
                      </div>
                      <h4 class="title">
                        <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}">Children Education Needs For Change The World.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has industry's standard dummy text ever since the 1500 an when an unknown printer took a galley scrambled it to make a type specimen book.</p>
                      <a href="{{route('blog.detalle', 'id'=>$fila->id)]}}" class="btn-theme btn-border-gradient btn-size-md"><span>Read More <img class="icon icon-img" src="assets/img/icons/arrow-line-right-gradient.png" alt="Icon"></span></a>
                    </div>
                  </div>
                </div> --}}
                <!--== End Blog Post Item ==-->

                <div class="pagination-area pt-0 pb-0">
                  <nav>
                    <ul class="page-numbers">
                      <li>
                        <a class="page-number" href="blog.html">1</a>
                      </li>
                      <li>
                        <a class="page-number" href="blog.html">2</a>
                      </li>
                      <li>
                        <a class="page-number" href="blog.html">3</a>
                      </li>
                      <li>
                        <a class="page-number next" href="blog.html">
                          <img src="assets/img/icons/arrow-line-right-gradient.png" alt="Icon-Image">
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="sidebar-area">
                <div class="widget">
                  <h3 class="widget-title">Search Here</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-search-box">
                    <form action="#" method="post">
                      <div class="form-input-item">
                        <label for="search2" class="sr-only">Search Here</label>
                        <input type="text" id="search2" placeholder="Search here">
                        <button type="submit" class="btn-src">
                          <i class="icofont-search-1"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="widget">
                  <h3 class="widget-title">Causes Categories</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-category">
                    <a href="causes-details.html">Clean Water <span>(18)</span></a>
                    <a href="causes-details.html">Children Education <span>(06)</span></a>
                    <a href="causes-details.html">Healty Food <span>(19)</span></a>
                    <a href="causes-details.html">Food And Water <span>(27)</span></a>
                    <a href="causes-details.html">National Charity <span>(27)</span></a>
                  </div>
                </div>
                <div class="widget">
                  <h3 class="widget-title">Urgent Causes</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-causes-item">
                    <div class="thumb">
                      <img src="assets/img/causes/w1.jpg" alt="Givest-HasTech">
                    </div>
                    <div class="content">
                      <h4 class="title"><a href="causes-details.html">Need School For Uganda Poor Children.</a></h4>
                      <ul class="donate-info">
                        <li class="info-item">
                          <span class="info-title">Goal:</span>
                          <span class="amount">$ 5,000</span>
                        </li>
                        <li class="info-item">
                          <span class="info-title">Raised:</span>
                          <span class="amount">$ 2,000</span>
                        </li>
                      </ul>
                      <!-- Start Progress Item -->
                      <div class="progress-item">
                        <div class="progress-line">
                          <div class="progress-bar-line" data-percent="75%"><span class="percent"></span></div>
                        </div>
                      </div>
                      <form action="#">
                        <div class="amount-info">
                          <div class="donate-amount">$20</div>
                          <div class="donate-amount">$35</div>
                          <div class="donate-amount">$48</div>
                          <div class="donate-amount me-0">$90</div>
                          <div class="donate-amount donate-custom-amount">
                            <input class="form-control" type="text" placeholder="Custome Amount">
                          </div>
                        </div>
                        <a class="btn-theme btn-gradient btn-slide" href="#"><span>Donate Now <img class="icon icon-img" src="assets/img/icons/arrow-line-right2.png" alt="Icon"></span></a>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="widget mb-0 pb-3">
                  <h3 class="widget-title">Popular Tags</h3>
                  <div class="separator-line">
                    <img class="me-1" src="assets/img/shape/line-t2.png" alt="Image-Givest">
                  </div>
                  <div class="widget-tags">
                    <ul>
                      <li><a href="#/">Clean Water</a></li>
                      <li><a href="#/">Education</a></li>
                      <li><a class="style2" href="#/">Health</a></li>
                      <li><a class="style2" href="#/">Medicine</a></li>
                      <li><a href="#/">Poor</a></li>
                      <li><a href="#/">Children</a></li>
                      <li><a class="style2" href="#/">Charity</a></li>
                      <li><a class="style2" href="#/">Non Profit</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  
  <!--== End Footer Area Wrapper ==-->
 @include('footer')
  <!--== Start Side Menu ==-->
  <aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
      <div class="off-canvas-overlay"></div>
      <!-- Start Off Canvas Content Wrapper -->
      <div class="off-canvas-content">
        <!-- Off Canvas Header -->
        <div class="off-canvas-header">
          <div class="logo-area">
            <a href="index.html"><img src="assets/img/logo.png" alt="Logo" /></a>
          </div>
          <div class="close-action">
            <button class="btn-close"><i class="icofont-close"></i></button>
          </div>
        </div>

        <div class="off-canvas-item">
          <!-- Start Mobile Menu Wrapper -->
          <div class="res-mobile-menu menu-active-one">
            <!-- Note Content Auto Generate By Jquery From Main Menu -->
          </div>
          <!-- End Mobile Menu Wrapper -->
        </div>
        <!-- Off Canvas Footer -->
        <div class="off-canvas-footer"></div>
      </div>
      <!-- End Off Canvas Content Wrapper -->
    </div>
  </aside>
  <!--== End Side Menu ==-->  
</div>

<!--=======================Javascript============================-->
<!--=== Modernizr Min Js ===-->
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{asset('assets/js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{asset('assets/js/jquery-migrate.js')}}"></script>
<!--=== Popper Min Js ===-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!--=== jquery Appear Js ===-->
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<!--=== jquery Swiper Min Js ===-->
<script src="{{asset('assets/js/swiper.min.js')}}"></script>
<!--=== jquery Fancybox Min Js ===-->
<script src="{{asset('assets/js/fancybox.min.js')}}"></script>
<!--=== jquery Aos Min Js ===-->
<script src="{{asset('assets/js/aos.min.js')}}"></script>
<!--=== jquery Tilt Animation Js ===-->
<script src="{{asset('assets/js/tilt-animation.js')}}"></script>
<!--=== jquery Scene Mouse Move Min Js ===-->
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
<!--=== jquery Slicknav Js ===-->
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<!--=== jquery Counterup Js ===-->
<script src="{{asset('assets/js/counterup.js')}}"></script>
<!--=== jquery Waypoint Js ===-->
<script src="{{asset('assets/js/waypoint.js')}}"></script>
<!--=== jquery Wow Min Js ===-->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!--=== jQuery EasyPieChart Min Js ===-->
<script src="{{asset('assets/js/jquery.easypiechart.min.js')}}"></script>

<!--=== Custom Js ===-->
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>