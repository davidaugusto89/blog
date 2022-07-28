@extends('layouts.app')

@section('title', " > Editar Post > $post->title")


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Editar Post -> {{ $post->title }}</div>

                <div class="card-body">

                    <form method="post" action="{{ route('posts.index') }}/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="" required value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <label for="body">Texto</label>
                            <textarea class="form-control" id="body" name="body" rows="10" required>
                                {{ $post->body }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <div class="thumb my-2">
                                <img src="{{ asset('images/'.$post->image) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Nova imagem (opcional)</label>
                            <input type="file" class="form-control" id="image" name="image" aria-describedby="image">
                        </div>
                        
                        <a href="{{ route('posts.index') }}" type="post" class="btn btn-danger">Cancelar</a>

                        <button type="post" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection