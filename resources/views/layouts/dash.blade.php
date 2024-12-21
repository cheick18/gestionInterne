<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css" />
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
 !-->  
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>

    <style>
        .dropdown-menu:hover{
            display: block;
        }
    </style>
    <div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
         <a href="/dashboard" class="navbar-brand"><img src="{{asset('unnamed.jpg')}}" width="200" /></a></div>
        <div class="list-group list-group-flush my-3">
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/all" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
               <!-- <i class="fas fa-project-diagram me-2"></i>-->Inscrits</a>
            <a href="/all_master" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <!--<i class="fas fa-project-diagram me-2"></i-->Master</a>
            <a href="/all_licence" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
               <!-- <i class="fas fa-project-diagram me-2"></i>-->Licence</a>
            <a href="/all_stage" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
               <!-- <i class="fas fa-project-diagram me-2"></i>-->Stage</a>
            <a href="/all_formation" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
               <!-- <i class="fas fa-project-diagram me-2"></i>-->Formations</a>
                    <a href="/all_certification" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><!--<i
                        class="fas fa-gift me-2"></i>-->Certifications</a>
          <!--

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                           
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                                {{ __('Se doconnecter') }}
                            </x-dropdown-link>
                        
                        </form>
                    -->
                    
                    <!--
            <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
            -->
        </div>
    </div>
    <!-- page content  -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                     @if(Auth::user()->name=='admin')
                    
                     <a href="/registre"  class="nav-link second-text fw-bold"> <i class="fas fa-user-plus me-2 "></i>Inscription</a>
                    @else
                    <a class="nav-link  second-text fw-bold" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2 "></i>{{Auth::user()->name}}
            </a>

                    @endif
                    </li>
                    
                    <li class="">
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                           
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="nav-link  second-text fw-bold">
                                 <i class="fas fa-sign-out-alt"></i> {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/inscrire" style="text-decoration: none" >
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background: #E62E36">
                        <div>
                            <h3 class="fs-2 text-light ">Inscrire</h3>
                          
                        </div>

                      
                    </div>
                </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/payment" style="text-decoration: none" >
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background: #E62E36">
                        <div>
                          
                            <h3 class="fs-2 text-light">Paiement</h3>
                        </div>
                      
                    </div>
                </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/facture" style="text-decoration: none" >
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background: #E62E36">
                        <div>
                          
                            <h3 class="fs-2 text-light">Recherche</h3>
                        </div>
                     
                    </div>
                </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/add_formation" class="block text-decoration-none">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background: #E62E36">
                        <div>
                        
                            <h3 class="fs-2 text-light">Formation</h3>
                        </div>
                       
                    </div>
                    </a>
                </div>
            </div>
<!-- Content -->
<button  id="scrollToTopButton"> <i class="fas fa-arrow-up"></i></button>

<style>
    #scrollToTopButton{
        display: none;
        position: fixed;z-index:300;right:20px; bottom:20px;
         color:white; background-color:#E62E36;border:none; 
         width:40px; 
         height:40px;
         border-radius:50%; 
         cursor: pointer;font-size:24px;    
    }
</style>
<script>
    $(document).ready(function () {
   
    $(window).scroll(function () {
        if ($(this).scrollTop() > 70) {
            $('#scrollToTopButton').fadeIn();
        } else {
            $('#scrollToTopButton').fadeOut();
        }
    });

 
    $('#scrollToTopButton').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600); 
    });
});

</script>
<div class="row my-5">
    @yield('content')
</div>
          
<!-- End content-->

        </div>
    </div>
</div>
</div>
<!--
<div class="text-end p-3 border-top border-black">
   Tout droits reservés © <a class="text-decoration-none" href="https://www.linkedin.com/feed/">cheick</a>
  </div>
-->
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>


</body>
</html>