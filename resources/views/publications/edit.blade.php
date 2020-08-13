@extends('layouts.app')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Actualizar publicación
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('publications.update', $publication->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Titulo</label>
              <input type="text" class="form-control" name="title" value="{{ $publication->title }}"/>
          </div>
          <div class="form-group">
              <label for="content">Contenido</label>
              <textarea class="form-control" name="content">{{ $publication->content }}</textarea>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Actualizar</button>
      </form>
  </div>
</div>
@endsection