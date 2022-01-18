@extends('dashboard.base')

@section('content')

  
  <div class="container-fluid">
    <div class="fade-in">
      <div class="card-columns cols-3">

        @foreach ($estadisticas as $estadistica)
          <div class="card">
            <div class="card-header">{{$estadistica->test_tipo}}
              <div class="card-header-actions"></div>
            </div>
            <div class="card-body">
              <div class="c-chart-wrapper">
                <canvas id="{{$estadistica->test_tipo}}"></canvas>
              </div>
            </div>
          </div>                    
        @endforeach

      </div>
    </div>
  </div>
  

@endsection

@section('javascript')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>    
    @foreach ($estadisticas as $estadistica)
    <script>
      const {{$estadistica->test_tipo . 'Pie'}} = new Chart(document.getElementById('{{$estadistica->test_tipo}}'), {
        type: 'pie',
        data: {
          labels: ['MariaDB', 'MongoDB', 'PostgresSQL'],
          datasets: [{
            data: [ {{ $estadistica->tiempo_maria . ',' . $estadistica->tiempo_mongo .','. $estadistica->tiempo_postgres }} ],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
          }]
        },
        options: {
          responsive: true
        }
      })
    </script>
    @endforeach
@endsection