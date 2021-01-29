@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Importar excel</div>

                    <div class="card-body">
                        <form action="{{route('users.import.excel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(Session::has('message'))

                                <p>{{Session::get('message')}}</p>

                            @endif

                            <input type="file" name="file">
                            <button>Importar usuarios</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
