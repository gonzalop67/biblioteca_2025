@extends("theme.$theme.layout")

@section('titulo')
Libros
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/scripts/libro/index.js') }}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Libros</h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-block btn-success btn-sm" href="{{ route('crear_libro') }}">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table id="tabla-data" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->titulo }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('editar_libro', $data->id) }}" class="btn btn-warning btn-sm"
                                                title="Editar"><span class="fa fa-pencil"></span></a>
                                            <form method="post" action="{{ route('eliminar_libro', $data->id) }}"
                                                class="d-inline form-eliminar">
                                                @csrf @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm eliminar" title="Eliminar"><span
                                                        class="fa fa-trash"></span></button>
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
