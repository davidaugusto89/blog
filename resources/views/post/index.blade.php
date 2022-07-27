@extends('layouts.app')

@section('title', ' > Posts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Posts

                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Novo Post</a>
                    @endauth
                </div>

                <div class="card-body">

                    <form action="" method="get" id="formSearch" class="mb-2">
                        <div class="input-group">
                            <input class="form-control py-2 border-right-0 border" type="search" name="search" placeholder="Procurar" value="{{ $search }}">
                            <div class="input-group-append">
                                <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-search"></i></div>
                            </div>
                        </div>
                    </form>

                    <div class="row p-3">
                        @foreach ($posts as $post)
                        <!--
                        <div class="post">
                            <div class="thumb-post">
                                <img src="{{ asset('images/'.$post->image) }}" class="img-fluid cursor-pointer">
                            </div>

                            <div class="body">
                                <strong class="d-block">{{ $post->title  }}</strong>
                                <small class="d-block mb-1">Data de publicação: {{ $post->created_at->format('d/m/Y H:i') }} | Autor: {{ $post->authors->name }}</small>
                                <a href="./posts/{{ $post->id }}">Ver Post</a>
                                @auth
                                    @if (Auth::user()->id === $post->user_id || Auth::user()->type === 'A')
                                        | <a href="./posts/edit/{{ $post->id }}">Editar</a>
                                        | <a href="#" data-id="{{ $post->id }}" class="lnk_remove">Remover</a>
                                    @endif
                                @endauth
                            </div>

                            <div class="clearfix"></div>
                        </div>-->
                        <div class="col-md-6">
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3 class="mb-0">
                                        <a class="text-dark" href="#">{{ $post->title  }}</a>
                                    </h3>
                                    <div class="mb-0 text-muted">{{ $post->created_at->format('d/m/Y H:i') }}</div>
                                    <div class="mb-5 text-muted"><small>Autor: {{ $post->authors->name }}</small></div>
                                    
                                    <div class="mb-4 text-muted">
                                        @auth
                                            @if (Auth::user()->id === $post->user_id || Auth::user()->type === 'A')
                                                <a href="./posts/edit/{{ $post->id }}">Editar</a> |
                                                <a href="#" data-id="{{ $post->id }}" class="lnk_remove">Remover</a>
                                            @endif
                                        @endauth
                                    </div>

                                    <a href="./posts/{{ $post->id }}">Continuar lendo</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-md-block" alt="{{ $post->title }}" style="width: 200px; height: 250px;" src="{{ asset('images/'.$post->image) }}" data-holder-rendered="true">
                            </div>
                        </div>
                        @endforeach

                        @if (count($posts) <= 0) Nenhum Post cadastrado! @endif </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(".lnk_remove").on('click', function(event) {
        let id = $(this).data('id');
        Swal.fire({
            title: `Deseja remover o Post (${id})?`,
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                deletePost(id);
            }
        })
    });

    function deletePost(id) {
        $.ajax({
            type: 'DELETE',
            url: `{{ route('posts.index') }}/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                location.reload(true);
            },
            error: function(request, status, error) {
                location.reload(true);
            }
        });
    }

    $('#btnGroupAddon2').on('click', function(event) {
        $('#formSearch').submit();
    });
</script>
@endsection