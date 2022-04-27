
  <!--== Start Header Wrapper ==-->
  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-5 col-sm-3 col-md-3 col-lg-2 pr-0">
          <div class="header-logo-area">
            <a href="{{route('index')}}">
              <img class="logo-main" src="https://sinfronteras.s3.us-east-2.amazonaws.com/public/assets/images/Logol.png" alt="Logo" />
              <img class="logo-light" src="https://sinfronteras.s3.us-east-2.amazonaws.com/public/assets/images/Logol.png" alt="Logo" />
            </a>
          </div>
        </div>
        <?php 
          use App\Http\Controllers\idiomaController; 
          if (Session::has('idioma')){
            $idioma = Session::get('idioma');
          }else{
            $idioma = 'ESP';
          }

          $inicio = idiomaController::traerTexto('inicio',$idioma);     

          
                            
                                
        ?>
        <div class="col-7 col-sm-9 col-md-9 col-lg-10">
          <div class="header-align">
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
              

                
                  <li @if (Request::is('/')) class="active"  @endif><a href="{{route('index')}}">{{$inicio}}</a></li>
                  <li @if (Request::is('aboutUs')) class="active"  @endif><a href="{{route('about')}}">{{idiomaController::traerTexto('nosotros',$idioma);}}</a></li>
                  <li @if (Request::is('contact')) class="active"  @endif><a href="{{route('contact')}}">{{idiomaController::traerTexto('contactanos',$idioma);}}</a></li>  
                  <li @if (Request::is('actividades')) class="active"  @endif><a href="{{route('blog.index')}}">{{idiomaController::traerTexto('actividades',$idioma);}}</a></li>
                   
                  <li class="has-submenu"><a>{{idiomaController::traerTexto('idioma',$idioma);}}</a>
                    <ul class="submenu-nav">
                      <li><a href="idioma/ESP">{{idiomaController::traerTexto('espanol',$idioma);}}</a></li>
                      <li><a href="idioma/ENG">{{idiomaController::traerTexto('ingles',$idioma);}}</a></li>
                      
                    </ul>
                  </li>
                
               
              </ul>
            </div>
            <div class="header-action-area">
              <button class="btn-menu d-xl-none">
                
              </button>
              
              <a href="{{route('inicio')}}" class="btn-theme btn-border btn-black btn-style">{{idiomaController::traerTexto('ingresar',$idioma);}} <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-right-line-dark.png')}}" alt="Icon"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  