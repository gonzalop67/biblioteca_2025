@extends("theme.$theme.layout")

@section('titulo')
    Usuarios
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/index.js') }}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios</h3>
                    <a class="btn btn-success btn-sm pull-right" href="{{ route('crear_usuario') }}">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear usuario
                    </a>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table id="tabla-data" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->usuario }}</td>
                                    <td>{{ $data->nombre }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @foreach ($data->roles as $rol)
                                            {{ $loop->last ? $rol->nombre : $rol->nombre . ', ' }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('editar_usuario', $data->id) }}" class="btn btn-warning btn-sm"
                                                title="Editar"><span class="fa fa-pencil"></span>
                                            </a>
                                            <form method="post" action="{{ route('eliminar_usuario', $data->id) }}"
                                                class="d-inline form-eliminar">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm eliminar"
                                                    title="Eliminar"><span class="fa fa-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
