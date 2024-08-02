<!-- Navbar -->
<nav class="navbar navbar-expand-lg top-0 z-index-3 my-3 bg-warning" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-2 px-0">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <img src="../assets/img/NOVA-LOGO-PMS-SEM-ASSINATURA.png" class="navbar-brand-img h-100"style="max-width: 120px; max-height: alt="...">               
            <div class="ms-3 input-group">
                <input type="text" class="form-control" placeholder="BUSCAR">
                <a href="/pesquisa" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true" ></i></a>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu bg-warning">
                  <li><a class="dropdown-item" href="/dashboard" >Início</a></li>
                  <li><a class="dropdown-item" href="#" >Perfil</a></li>
                  <li><a class="dropdown-item" href="{{'/logout'}}">Sair</a></li>
                </ul>
              </li>
        </div>
    </div>        
</nav>

<!-- End Navbar -->