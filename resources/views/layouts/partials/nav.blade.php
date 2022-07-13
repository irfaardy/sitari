<nav class="navbar navbar-expand-lg navbar-dark bg-transparent @if(Request::route()->getName() == 'landing') fixed-on-scroll @endif">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{asset('assets/logo/sitari.png')}}" height="60px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miriUiKitNavbar"
                    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beranda</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang Kami</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sejarah" >Sejarah</span></a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="#galery">Galery</span></a>
                        </li>
            
                        
            
                        <li class="nav-item">

                            <a class="nav-link nav-icon icon-fb" href="#"><i class="mdi mdi-facebook-box"></i></a>

                            <a class="nav-link nav-icon icon-twitter" href="#"><i class="mdi mdi-twitter-box"></i></a>
    
                            <a class="nav-link nav-icon icon-insta" href="#"><i class="mdi mdi-instagram"></i></a>
                            
                        </li>
            
                        <form action="#" class="form-inline ml-lg-3">
                            <a href="{{route('login')}}" class="btn btn-danger">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>