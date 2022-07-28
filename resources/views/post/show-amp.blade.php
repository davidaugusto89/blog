@extends('layouts.app')

@section('title', " > Post > $post->title")

@section('style')
<style>
    .bg {
        background-image: url('<?=asset('images/'.$post->image)?>');
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">

                <div class="jumbotron p-3 m-0 p-md-5 text-white rounded bg-dark bg">
                    <div class="py-5">
                        <h1 class="display-4">{{ $post->title  }}</h1>
                    </div>
                </div>

                <p class="mb-0">Data de publicação: {{ $post->created_at->format('d/m/Y H:i') }}</p>
                <p class="mb-2">Autor: {{ $post->authors->name }}</p>

                    <div class="row p-3">
                        {!! nl2br(e($post->body)) !!}
                    </div>

                    
                    <a href="{{ route('posts.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection