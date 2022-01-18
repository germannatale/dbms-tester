@extends('dashboard.base')

@section('content')

  
  <div class="container-fluid">
    <div class="fade-in">
      <div class="card-columns cols-3">

        @foreach ($estadisticas as $estadistica)
          <div class="card">
            <div class="card-header">{{ strtoupper($estadistica['test']) }}
              <div class="card-header-actions"><small class="text-muted"> {{ $estadistica['motor'] }}</small></div>
            </div>
            <div class="card-body">
              <div class="c-chart-wrapper">
                <canvas id="{{$estadistica['test']}}"></canvas>
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
        const {{ $estadistica['test'] . 'LineChart'}} = new Chart(document.getElementById('{{ $estadistica['test'] }}'), {
            type: 'line',
            data: {
              labels : {{ $estadistica['cant'] }},
              datasets : [
                {
                    label: '{{ $estadistica['motor'] }}',
                    backgroundColor : 'rgba(220, 220, 220, 0.2)',
                    borderColor : 'rgba(220, 220, 220, 1)',
                    pointBackgroundColor : 'rgba(220, 220, 220, 1)',
                    pointBorderColor : '#fff',
                    data : {{ $estadistica['tiempo'] }}
                }
              ]
            },
            options: {
              responsive: true
            }
        });      
      </script>
    @endforeach

@endsection