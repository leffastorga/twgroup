@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <h2>Publicaciones de TWGroup</h2>
    </div>
    <div class="col-sm-6">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Nueva publicación
        </button>
    </div>
  </div>

<div class="push-top">
  @if (session()->has('success'))
      <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <strong>
              {!! session()->get('success') !!}
          </strong>
      </div>
  @endif
  @if($publication->count() > 0)
  <div class="card-deck">
  @foreach($publication as $publications)
    <div class="card" style="min-width: 18rem; margin-top:20px;">
        <div class="card-body">
            <h5 class="card-title">{{$publications->title}}</h5>
            <p class="card-text">{{$publications->content}}</p>
            <div>
                <div class="float-left">
                <a href="{{ route('publications.show', $publications->id)}}" class="btn btn-primary btn-sm">Seguir leyendo</a>    
                </div>
                <div class="float-right">
                <form action="{{ route('publications.destroy', $publications->id)}}" method="post" style="display: inline-block">
                <a href="{{ route('publications.edit', $publications->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm float-right" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@else
<p>No se han encontrado publicaciones</p>
@endif
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva publicidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('publications.store') }}">
        <div class="modal-body">
                <div class="form-group">
                    @csrf
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection