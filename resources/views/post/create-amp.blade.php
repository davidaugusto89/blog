@extends('layouts.app')

@section('title', ' > Novo Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Novo Post</div>

                <div class="card-body">
                    
                    <form method="post" action="{{ route('posts.store') }}/" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Texto</label>
                            <textarea class="form-control" id="body" name="body" rows="10" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Imagem</label>
                            <input type="file" class="form-control" id="image" name="image" aria-describedby="image" value="" required>
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