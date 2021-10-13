<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="ingrese el nombre de un post">
        </div>
        @if ($posts->count())
            <div class="card-bpdy">
                <table class="table table-striped" id="usuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td width="10px"><a class="btn btn-primary"
                                        href="{{ route('admin.posts.edit', $post) }}">Editar</a></td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>


        @else
            <div class="card-body">
                <strong>No hay registro, para el término seleccionado </strong>
            </div>
        @endif
    </div>
</div>
