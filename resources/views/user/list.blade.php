@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->type === 'A')
                                    <span class="badge badge-info">Admin</span>
                                @else
                                    <span class="badge badge-light">User</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->id !== Auth::user()->id)
                                    <button type="button" class="btn btn-sm btn-primary lnk_change" data-id="{{ $user->id }}">Mudar Perfil</button>
                                @else
                                <button type="button" class="btn btn-sm disabled">Não disponível</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
      $(".lnk_change").on('click', function(event) {
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `{{ route('user.list') }}/${id}`,
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
      });
</script>
@endsection