<!-- Navbar -->
<nav class="navbar navbar-expand-lg top-0 z-index-3 my-3 bg-warning" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-2 px-0">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <img src="../assets/img/NOVA-LOGO-PMS-SEM-ASSINATURA.png" class="navbar-brand-img h-100"style="max-width: 120px; max-height: alt="...">
            <div class="ms-3 input-group">
                <input type="text" class="form-control" placeholder="BUSCAR">
                <a href="/pesquisa" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true" ></i></a>
            </div>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
            </ul>
         
            <ul class="navbar-nav d-flex flex-row justify-content-end justify-content-md-end align-items-center"> <!-- Adicionei a classe 'align-items-center' -->
                <li class="nav-item">
                    <a href="{{'/logout'}}" class="nav-link text-body font-weight-bold px-0 d-inline">
                        <i class="fa fa-user me-sm-1 fa-1x"></i>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 me-3">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item me-3">
                    <a href="javascript:;" class="nav-link text-body p-0 d-inline">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
            </ul>
     </div>
    </div>        
    </div>
</nav>

<!-- End Navbar -->