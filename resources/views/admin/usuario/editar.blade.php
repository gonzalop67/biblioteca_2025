@extends("theme.$theme.layout")

@section('titulo')
Usuarios
@endsection

@section("scripts")
<script>
    const base_url = "{{ env('APP_URL') }}";
</script>
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Usuarios</h3>
            </div>
            <div class="box-body">
                <form action="{{route('actualizar_usuario', $data->id)}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.usuario.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('admin.usuario.boton-form-editar')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection