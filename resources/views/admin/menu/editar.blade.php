@extends("theme.$theme.layout")

@section('titulo')
Sistema de Menús
@endsection

@section("scripts")
<script src="{{asset(" assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Menú</h3>
            </div>
            <form id="form-general" class="form-horizontal" action="{{ route('menu.actualizar', ['id' => $data->id]) }}" method="POST">
                @csrf @method('PUT')
                <div class="box-body">
                    @include('admin.menu.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @include('admin.menu.boton-form-editar')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection