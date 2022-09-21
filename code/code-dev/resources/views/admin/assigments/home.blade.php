@extends('admin.master')
@section('title','Asignaciones de Parqueos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/diet_requests') }}" class="nav-link"><i class="fa-solid fa-car"></i> Asignaciones de Parqueos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">

        <div class="header">
                <h2 class="title"><i class="fa-solid fa-car"></i> <strong> Asignaciones de Parqueo</strong></h2>
                <ul>
                    <li>
                        <a href="#"><i class="fas fa-chevron-down"></i> Filtar</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/admin/solicitud_dietas/1')}}"><i class="fas fa-check-circle"></i> Registradas</a></li>
                            <li><a href="{{url('/admin/solicitud_dietas/2')}}"><i class="fas fa-check-circle"></i> Servidas</a></li>
                            <li><a href="{{url('/admin/solicitud_dietas/anuladas')}}"><i class="fas fa-trash-alt"></i> Anuladas</a></li>
                            <li><a href="{{url('/admin/solicitud_dietas/todas')}}"><i class="fas fa-boxes"></i> Todas</a></li>
                        </ul>
                    </li>
                    
                        <li>
                            <a href="{{url('/admin/garitas_de_seguridad')}}"><i class="fa-solid fa-person-military-pointing"></i> Garitas</a>
                        </li>

                        </li>
                    
                        <li>
                            <a href="{{ url('/admin/asignacion/nueva') }}" ><i class="fas fa-plus-circle"></i> Nueva Asignacion</a>
                        </li>
                    
                </ul>
            </div>

            <div class="inside">
                <table id="table-modules" class="table table-striped table-hover mtop16">
                    <thead>
                        <tr>
                            <td ><strong> OPCIONES </strong></td>
                            <td ><strong> PARQUEO ASIGNADO </strong></td>
                            <td ><strong> INFORMACIÓN DEL PERSONAL </strong></td>
                            <td ><strong> PLACAS AUTORIZADAS</strong></td>
                            <td ><strong> ESTADO </strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignments as $as)
                            <tr>
                                <td>
                                    <div class="opts">
                                        @if($as->status == 0)
                                            <a href="#" data-action="quitar_acceso" data-path="admin/asignacion" data-object="{{ $as->id }}" class="btn-deleted" data-toogle="tooltrip" data-placement="top" title="Quitar Acceso"><i class="fa-solid fa-circle-xmark"></i></a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    Número Parqueo: {{ $as->parking_lot->number_park }} <br>
                                    Número Garita: {{ $as->parking_lot->security->name }}
                                </td>
                                <td>
                                    IBM - Nombre: {{ $as->ibm.' - '.$as->name_full}}<br>
                                    Puesto: {{ $as->job }} <br>
                                    Servicio/Area: {{ $as->service }}
                                </td>
                                <td>
                                    Placa No. 1: {{ $as->placa1 }} <br>
                                    Placa No. 2: {{ $as->placa2 }} <br>
                                    Placa No. 3: {{ $as->placa3 }} 
                                </td>
                                <td>
                                    @if($as->status == 0)
                                        <span style="color: green"> Autorizado </span>
                                    @else
                                        <span style="color: red"> Sin Autorizacion </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
