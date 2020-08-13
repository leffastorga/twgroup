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
<div class="container">
  <div class="card push-top">
    <div class="card-header">
      Crear una nueva publicación
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
      <div class="row">
        <div class="col-sm-6">
          <form method="post" action="{{ route('publications.store') }}">
              <div class="form-group">
                  @csrf
                  <label for="title">Titulo</label>
                  <input type="text" class="form-control" required="required" name="title"/>
              </div>
              <div class="form-group">
                  <label for="content">Contenido</label>
                  <textarea class="form-control" required="required" name="content"></textarea>
              </div>
              <button type="submit" class="btn btn-block btn-danger btn-sm">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection