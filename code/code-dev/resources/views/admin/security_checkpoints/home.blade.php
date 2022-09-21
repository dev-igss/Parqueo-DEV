@extends('admin.master')
@section('title','Servicios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/servicios_general') }}" class="nav-link"><i class="fas fa-bed"></i> Servicios General</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                @if(kvfj(Auth::user()->permissions, 'park_list'))
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title"><i class="fas fa-plus-circle"></i><strong> Agregar Garita de Seguridad</strong></h2>
                        </div>

                        <div class="inside">
                            {!! Form::open(['url' => '/admin/garita_de_seguridad/crear', 'files' => true]) !!}
                                <label for="name"> <strong><sup style="color: red;">(*)</sup> Nombre: </strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                </div>

                                {!! Form::submit('Guardar', ['class'=>'btn btn-success mtop16']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-bed"></i><strong> Garitas de Seguridad</strong></h2>
                        
                    </div>

                    <div class="inside">
                        <table id="table-modules" class="table table-bordered table-striped" style="background-color:#EDF4FB;">
                            <thead>
                                <tr>
                                    <td><strong>OPCIONES</strong></td>
                                    <td><strong>NOMBRE</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($security as $sec)
                                    <tr>
                                        <td>
                                            <div class="opts">                                                
                                                <a href="{{ url('/admin/garita_de_seguridad/'.$sec->id.'/espacios') }}"  title="Espacios de Parqueo"><i class="fas fa-list-ul"></i></a>                                               
                                            </div>
                                        </td>
                                        <td>{{ $sec->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
