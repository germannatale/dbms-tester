<!-- Exito en variable cuando se manda en la vista -->
@if (isset($exito) && !empty($exito))
    @if (is_array($exito))                                                                       
        @foreach ($exito as $m)
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-check'> </i>
            <span> {{$m}} </span>
        </div>
        @endforeach
    @else                                    
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-check'> </i><span> {{$exito}} </span>
        </div>
    @endif
@endif

<!-- Mensaje en variable cuando se manda en la vista -->
@if (isset($mensaje) && !empty($mensaje))
    @if (is_array($mensaje))                                                                       
        @foreach ($mensaje as $m)
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-warning'> </i>
            <span> {{$m}} </span>
        </div>
        @endforeach
    @else                                    
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-warning'> </i><span> {{$mensaje}} </span>
        </div>
    @endif
@endif

<!-- Error en variable cuando se manda en la vista -->
@if (isset($error) && !empty($error))
    @if (is_array($error))                                                                      
        @foreach ($error as $e)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-times-circle'> </i>
            <span> {{$e}} </span>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-times-circle'> </i><span> {{$error}} </span>
        </div>
    @endif
@endif

<!-- withExito en la session cuando se manda en la ruta -->
@if(session()->get('exito'))
    @if(is_array(session()->get('exito')))                                                                      
        @foreach (session()->get('exito') as $exito)
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-check'> </i>
            <span> {{ $exito }} </span>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-check'> </i><span> {!! session()->get('exito') !!} </span>
        </div>
    @endif    
@endif

<!-- whitMensaje en la session cuando se manda en la ruta -->
@if(session()->get('mensaje'))
    @if(is_array(session()->get('mensaje')))                                                                      
        @foreach (session()->get('mensaje') as $mensaje)       
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-warning'> </i>
            <span> {{ $mensaje }} </span>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-warning'> </i><span> {!! session()->get('mensaje') !!} </span>
        </div>
    @endif    
@endif

<!-- withError en la session cuando se manda en la ruta -->
@if(session()->get('error'))
    @if(is_array(session()->get('error')))                                                                      
        @foreach (session()->get('error') as $mensaje)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-times-circle'> </i>
            <span> {{ $mensaje }} </span>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class='fa fa-times-circle'> </i><span> {!! session()->get('error') !!} </span>
        </div>
    @endif    
@endif