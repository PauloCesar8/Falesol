@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
{{-- Pagina principal: menu com solicitção de serviços,   --}}

<div class="page-header min-vh-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-6 mx-auto mt-1">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left bg-transparent">
            <p class="mb-0">Olá, como podemos ajudar?</p>
              @if (Auth::user()->conta == 1)
                <a href="/solicitação" class="btn bg-gradient-info w-100 mt-4">Enviar uma solicitação</a>
                <a href="/consulta-protocolo" class="btn bg-gradient-info w-100 mt-4">Consulta de Protocolo</a>
              @elseif (Auth::user()->conta == 2)
                <a href="/solicitação" class="btn bg-gradient-info w-100 mt-4">Painel de Solicitações</a>
                <a href="/consulta-solicitacao" class="btn bg-gradient-info w-100 mt-4">Consulta de Protocolo</a>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-5">
  <div class="card">
    <div class="card-header d-flex justify-content-center align-items-center toggle-icon" id="cardHeader">
      <h6 class="mb-0">Outros Serviços</h6>
      <i class="fa fa-chevron-down ms-2" id="trocarIcone"></i>
    </div>
    <div class="card-body collapse" id="CardConteudo">
      <div class="d-flex flex-row flex-wrap justify-content-between mt-3">
        <a href="/Saúde">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-heart me-sm-1 fa-4x"></i>
            <span>Saúde</span>
          </div>
        </a>
        <a href="/Vacinação"> 
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-syringe me-sm-1 fa-4x"></i>
            <span>Vacinação</span>
          </div>
        </a>
        <a href="/serviços">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa-solid fa-headphones me-sm-1 fa-4x"></i>
            <span>Serviços</span>
          </div>
        </a>
        <a href="/Trânsito">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-bus me-sm-1 fa-4x"></i>
            <span>Trânsito</span>
          </div>
        </a>
        <a href="/Educação">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-school me-sm-1 fa-4x"></i>
            <span>Educação</span>
          </div>
        </a>
        <a href="/Seguranca">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa-solid fa-building-columns me-sm-1 fa-4x"></i>
            <span>Segurança</span>
          </div>
        </a>
        <a href="/Saúde">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-trash me-sm-1 fa-4x"></i>
            <span>Coleta</span>
          </div>
        </a>
        <a href="/Saúde">
          <div class="d-flex flex-column me-3 mb-3 align-items-center">
            <i class="fa fa-phone me-sm-1 fa-4x"></i>
            <span>Contatos</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>


<script>
  document.querySelector('#cardHeader').addEventListener('click', function () {
    let cardBody = document.querySelector('#CardConteudo');
    let toggleIcon = document.querySelector('#trocarIcone');

    if (cardBody.classList.contains('show')) {
      cardBody.classList.remove('show');
      toggleIcon.classList.remove('fa-chevron-up');
      toggleIcon.classList.add('fa-chevron-down');
    } else {
      cardBody.classList.add('show');
      toggleIcon.classList.remove('fa-chevron-down');
      toggleIcon.classList.add('fa-chevron-up');
    }
  });
</script>



@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
