@extends('adminlte/layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Subir archivo</h5>

                        <p class="card-text">
                            Seleccione un archivo de Excel
                        </p>
{{--                        Form para subir el archivo, se debera elegir una fecha dormato Y-m-d por defecto la de hoy --}}

                        <form action="{{route('subirEntregas')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(Session::has('message'))
                                <div class="row">
                                    <div class="alert alert-success col-md-6" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>

                            @endif

                            <div class="row">
                                <div class="custom-file col-md-6">
                                    <input type="file" class="custom-file-input" required name="file" lang="es">
                                    <label class="custom-file-label" for="file" data-browse="Elegir">Elegir archivo</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" name="fecha" required value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" type="date">
                                    <label  for="fecha" >Escoja fecha</label>
                                </div>
                                <p>{{\Carbon\Carbon::now()}}</p>
                            </div>
                            <p></p>

                                <div class="mt-3 col-md-3 p-0">
                                    <button class="btn btn btn-primary">Subir entregas</button>
                                </div>
                        </form> <!-- End form -->
                    </div>
                </div><!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
