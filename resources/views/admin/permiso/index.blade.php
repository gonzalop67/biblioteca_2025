@extends("theme.$theme.layout")

@section('titulo')
    Permisos
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
                    <h3 class="box-title">Permisos</h3>
                    <a class="btn btn-success btn-sm pull-right" href="{{ route('crear_permiso') }}">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear permiso
                    </a>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table id="tabla-data" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $permiso)
                                <tr>
                                    <td>{{ $permiso->id }}</td>
                                    <td>{{ $permiso->nombre }}</td>
                                    <td>{{ $permiso->slug }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('editar_permiso', $permiso->id) }}" class="btn btn-warning btn-sm"
                                                title="Editar"><span class="fa fa-pencil"></span>
                                            </a>
                                            <form method="post" action="{{ route('eliminar_permiso', $permiso->id) }}"
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
