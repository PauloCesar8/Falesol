@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-70">
        <div class="container">
          <div class="row">
            <div class="col-x1-2 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <p class="mb-0">Olá, Como podemos ajudar?</p>
                  <a href="/solicitação" class="btn bg-gradient-info w-100 mt-4 mb-0">Enviar um solicitação</a>
                      <button type="button" class="btn btn-primary w-100 mt-3 mb-0">Visualizar solicitações existentes</button>   
                </div>
                <div class="card-body">
                    <div class="text-center">
                        </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
