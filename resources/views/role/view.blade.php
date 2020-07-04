@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ver rol</div>

                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{route('role.update', $role->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container">
                                <h4>Datos</h4>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                           value="{{old('name', $role->name)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                                           value="{{old('slug', $role->slug)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <textarea readonly class="form-control" id="description" placeholder="descripcion"
                                              name="description" rows="3">{{old('description', $role->description)}}</textarea>
                                </div>

                                <hr>

                                <h5>Full access</h5>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="fullAccessYes" name="full-access"
                                           class="custom-control-input" value="yes"
                                           @if($role['full-access']=="yes")
                                           checked
                                           @elseif(old('full-access')=='yes')
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="fullAccessYes">YES</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="fullAccessNo" name="full-access"
                                           class="custom-control-input" value="no"
                                           @if($role['full-access']=="no")
                                           checked
                                           @elseif(old('full-access')=='no')
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="fullAccessNo">NO</label>
                                </div>

                                <hr>

                                <h5>Lista de permisos</h5>

                                @foreach($permissions as $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input disabled type="checkbox"
                                               class="custom-control-input"
                                               id="permission_{{$permission->id}}"
                                               value="{{$permission->id}}"
                                               name="permission[]"
                                               @if(is_array(old('permission')) && in_array("$permission->id",old('permission')))
                                               checked

                                               @elseif(is_array($permission_role) && in_array("$permission->id",$permission_role))
                                               checked
                                            @endif

                                        >
                                        <label class="custom-control-label" for="permission_{{$permission->id}}">
                                            {{$permission->id}}
                                            -
                                            {{$permission->name}}
                                            <em>({{$permission->description}})</em>
                                        </label>
                                    </div>
                                @endforeach

                                <hr>

                                <a href="{{route('role.edit', $role->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('role.index')}}" class="btn btn-danger">Atras</a>


                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
