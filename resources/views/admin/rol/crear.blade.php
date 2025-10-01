@extends("theme.$theme.layout")

@section('titulo')
Sistema de Roles
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Roles</h3>
            </div>
            <form id="form-general" class="form-horizontal" action="{{ route('rol.guardar') }}" method="POST">
                @csrf
                <div class="box-body">
                    @include('admin.rol.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @include('admin.rol.boton-form-crear')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection