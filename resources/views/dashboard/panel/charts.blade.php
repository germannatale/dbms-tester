@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="card-columns cols-2">
                <div class="card">
                  <div class="card-header">Line Chart
                    <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
                  </div>
                  <div class="card-body">
                    <div class="c-chart-wrapper">
                      <canvas id="canvas-1"></canvas>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">Radar Chart
                    <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
                  </div>
                  <div class="card-body">
                    <div class="c-chart-wrapper">
                      <canvas id="canvas-4"></canvas>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/resultados.js') }}"></script>

@endsection