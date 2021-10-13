<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <input type="text" wire:model="search" class="form-control"
                placeholder="ingrese el nombre o correo de un usuario">
        </div>
        @if ($users->count())
            <div class="card-bpdy">
                <table class="table table-responsive"  id="usuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px"><a class="btn btn-primary"
                                        href="{{ route('admin.users.edit', $user) }}">Rol</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>


        @else
            <div class="card-body">
                <strong>No hay registro, para el término seleccionado </strong>
            </div>
        @endif
    </div>
</div>
