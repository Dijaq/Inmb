@extends('layoutintranettim')

@section('contenido')

  <div class="row">
    <div class="offset-md-3 col-md-6">
      <div class="card ">
          <div class="card-header ">
            <h4 class="card-title">Nuevo Tipo</h4>
          </div>
    @if(session()->has('info'))
      <h3>{{session('info')}}</h3>
    @else
        <div class="card-body ">
            <form style="width: 100%;" method="POST" action="{{route('tipo.update', $tipo->id)}}">    
                {!! method_field('PUT') !!}
                {!!csrf_field()!!}     

                <label for="nombre" style="text-align:left;">
                Nombre Tipo
                </label>
                <div class="form-group"><input class="form-control" type="text" name="nombre" value="{{$tipo->nombre}}">
                {!! $errors->first('nombre', '<span class="error">:message</span>') !!}</div>
                <br>
                <input class="btn btn-primary" type="submit" value="Editar">        
            </form>
        </div>  
      </div>
    </div>
    @endif
  </div>
@stop