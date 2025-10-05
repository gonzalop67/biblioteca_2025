@extends("theme.$theme.layout")

@section('titulo')
Permisos
@endsection

@section("scripts")
<script>
    const base_url = "{{ env('APP_URL') }}";
</script>
<script src="{{asset("assets/pages/scripts/admin/permiso/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Permisos</h3>
            </div>
            <div class="box-body">
                <form action="{{route('guardar_permiso')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    <div class="box-body">
                        @include('admin.permiso.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('admin.permiso.boton-form-crear')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection