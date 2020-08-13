@extends('layouts.app')

@section('content')


<section class="content-item push-top" id="comments">
<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $publication->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <p>{{ $publication->content }}</p>
            </div>
        </div>
    	<div class="row">
            <div class="col-sm-8">   
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
            @if($publication->comments_aprobados_user(Auth::user()->id)->count() === 0)
                <form method="post" action="{{ route('publications.comments.store', $publication->id) }}">
                	<h3 class="pull-left">Déjanos tu comentario</h3>
                    <fieldset>
                        <div class="row">
                        @csrf
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" id="content" name="content" required="required"></textarea>
                            </div>
                        </div>  	
                    </fieldset>
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                </form>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">   
                @if ($publication->comments_aprobados->count() === 1)
                <h3>{{ $publication->comments_aprobados->count() }} Comentario</h3>
                @elseif ($publication->comments_aprobados->count() > 1)
                <h3>{{ $publication->comments_aprobados->count() }} Comentarios</h3>
                @endif
                <div class="list-group">
                @foreach($publication->comments_aprobados as $comment)
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $comment->user->name }}</h5>
                    <small>{{ $comment->created_at->format('d-m-Y H:i') }}</small>
                    </div>
                    <p class="mb-1">{{ $comment->content }}</p>
                    <small></small>
                </a>
                @endforeach
                </div>       
            </div>
        </div>
    </div>
</section>



@endsection
