@extends('admin.master')
@section('title','Espacio de Parqueos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/servicios_general') }}" class="nav-link"><i class="fas fa-bed"></i> Espacios de Parqueo</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                @if(kvfj(Auth::user()->permissions, 'park_list'))
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title"><i class="fas fa-plus-circle"></i><strong> Agregar Espacio de Parqueo</strong></h2>
                        </div>

                        <div class="inside">
                            {!! Form::open(['url' => '/admin/garita_de_seguridad/espacios/crear', 'files' => true]) !!} 
                                {!! Form::hidden('garita', $security->id, ['class'=>'form-control']) !!}
                                <label for="name"> <strong><sup style="color: red;">(*)</sup> Número de Parqueo: </strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                    {!! Form::text('number_park', null, ['class'=>'form-control']) !!}
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
                        <h2 class="title"><i class="fas fa-bed"></i><strong> Espacios de Parqueo de {{$security->name}}</strong></h2>
                        
                    </div>

                    <div class="inside">
                        <table id="table-modules" class="table table-bordered table-striped" style="background-color:#EDF4FB;">
                            <thead>
                                <tr>
                                    <td><strong>NÚMERO DE PARQUEO</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lots as $lot)
                                    <tr>
                                        
                                        <td>{{ $lot->number_park }}</td>
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
