@extends('adminlte/layout')

@section('content')
    <div class="container-fluid">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Folio: <b>{{$entrega->suborden}}</b></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-1">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Producto</span>
                                <span class="info-box-number">
                                        {{$entrega->producto}} (#{{$entrega->cantidad}})
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-map-marker-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Direccion</span>
                                <span class="info-box-number">{{$entrega->direccion}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-friends"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cliente</span>
                                <span class="info-box-number">{{$entrega->nombreCliente}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-angle-down"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">SKU</span>
                                <span class="info-box-number">{{$entrega->sku}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div> <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- TABLE: LATEST ORDERS -->

        <p></p>
        @if($entrega->getEstado != null)
            @if($entrega->getEstado->estado == 'entregado')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Entregado</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="nombreReceptor">Recibe</label>
                            <input type="text" class="form-control" name="nombreReceptor" id="nombreReceptor" value="{{$entrega->getProductoEntregado->receptor}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="rutReceptor">Rut</label>
                            <input type="text" name="rutReceptor" class="form-control" id="rutReceptor" value="{{$entrega->getProductoEntregado->rutReceptor}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="fechaNac">Fecha de nacimiento</label>
                            <input type="date" name="fechaNac" class="form-control" id="fechaNac" value="{{$entrega->getProductoEntregado->fechaNacimientoReceptor}}" disabled>
                        </div>
                        <div class="d-flex">
                            @foreach($fotos as $f)
                                <a class="m-2 " target="_blank" href="{{(\Illuminate\Support\Facades\Storage::url($f))}}">
                                    <img class="img-thumbnail img-fluid" src="{{(\Illuminate\Support\Facades\Storage::url($f))}}"

                                         alt="texto alternativo de la imagen" />
                                </a>

                            @endforeach
                        </div>





                    </form>
                </div>
                <!-- /.card-body --> <!-- /.card-body -->
            </div>
                <!-- /.card -->
                    @elseif($entrega->getEstado->estado == 'rechazado')

                    @endif

                    @else
                        <td>PENDIENTE</td>
                    @endif
    </div>
    {{--    /.Container main--}}


@endsection

@section('scripts')
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });

    </script>

    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $(e.target).siblings('.custom-file-label').html(fileName);
        });
    </script>
@endsection
