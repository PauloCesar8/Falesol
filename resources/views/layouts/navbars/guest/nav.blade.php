<!-- Navbar -->

<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3  bg-warning {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4': ' blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <img src="../assets/img/NOVA-LOGO-PMS-SEM-ASSINATURA.png" class="navbar-brand-img h-100"style="max-width: 120px; max-height: alt="...">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
        Falesol
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto">
        @if (auth()->user())
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ url('dashboard') }}">
                <i class="fa fa-chart-pie opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                Dashboard
             </a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2" href="{{ url('profile') }}">
                <i class="fa fa-user opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                Profile
            </a>
            </li>
        @endif
        @if(request()->url() === (auth()->user() ? url('static-sign-up') : url('login')))
          <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-up') : url('register')}}">
            <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Inscrever-se
          </a>
        @endif
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
