<!-- TABLE: LATEST ORDERS -->
<div class="card card-primary collapsed-card">
    <div class="card-header">
        <h3 class="card-title"><b>Entrega exitosa</b></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('productoEntregado.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{--                    Campos invisibles que se envian al controlador--}}
            <div hidden>
                <input type="text" value="{{$entregas->id}}" name="idEntrega">
                <input type="text" value="{{$entregas->patente}}" name="patente">
            </div>

            <div class="form-group">
                <label for="nombreReceptor">Recibe</label>
                <input type="text" class="form-control" name="nombreReceptor" id="nombreReceptor" required placeholder="Ingrese nombre y apellido">
            </div>

            <div class="form-group">
                <label for="rutReceptor">Rut</label>
                <input type="text" name="rutReceptor" class="form-control" id="rutReceptor" required placeholder="Ingrese rut sin puntos ni guion">
            </div>

            <div class="form-group">
                <label for="fechaNac">Fecha de nacimiento</label>
                <input type="date" name="fechaNac" class="form-control" id="fechaNac" required placeholder="dd-mm-aaaa">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Foto 1</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="fotos[]" type="file" capture="camera" class="custom-file-input" id="foto1" lang="es">
                        <label class="custom-file-label" for="fotos" data-browse="Elegir">Elegir archivo</label>
                    </div>
                </div>

                <label for="exampleInputFile">Foto 2</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="fotos[]" type="file" capture="camera" class="custom-file-input" id="foto1" lang="es">
                        <label class="custom-file-label" for="fotos" data-browse="Elegir">Elegir archivo</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <!-- /.card-body --> <!-- /.card-body -->
</div>
<!-- /.card -->
