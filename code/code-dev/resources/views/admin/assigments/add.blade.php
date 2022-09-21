@extends('admin.master')
@section('title','Agendar Cita')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/equipments/all') }}" class="nav-link"><i class="fas fa-columns"></i> Citas</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/equipments/add') }}" class="nav-link"><i class="fas fa-plus-circle"></i> Agendar Nueva</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        

        {!! Form::open(['url'=>'/admin/asignacion/nueva']) !!}
        <div class="row mtop16">
            <div class="col-md-12 d-flex">
                <div class="panel shadow">
                    <!-- Modal -->

                    <div class="header">
                        <h2 class="title"><i class="fas fa-cogs"></i><strong> Registrar nueva asignación de parqueo</strong></h2>
                    </div>

                    

                </div>
            </div>

            <div class="col-md-4 mtop16">
                <div class="panel shadow">
                    <!-- Modal -->

                    <div class="header">
                        <h2 class="title"><i class="fas fa-cogs"></i><strong> Información del Personal</strong></h2>
                    </div>

                    <div class="inside">
                        <label for="name"> <strong><sup style="color: red;">(*)</sup> IBM: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('ibm', null, ['class'=>'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16"> <strong><sup style="color: red;">(*)</sup> Nombre Completo: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16"> <strong><sup style="color: red;">(*)</sup> Puesto: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('job', null, ['class'=>'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16"> <strong><sup style="color: red;">(*)</sup> Servicio: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('service', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 mtop16 d-flex" >
                <div class="panel shadow">
                    <!-- Modal -->

                    <div class="header">
                        <h2 class="title"><i class="fas fa-cogs"></i><strong> Información de los Vehiculos</strong></h2>
                    </div>

                    <div class="inside">
                        <label for="name"> <strong><sup style="color: red;">(*)</sup> Placa No. 1: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('placa1', null, ['class'=>'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16"> <strong>Placa No. 2: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('placa2', null, ['class'=>'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16"> <strong>Placa No. 3: </strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                            {!! Form::text('placa3', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 mtop16 d-flex">
                <div class="panel shadow">
                    <!-- Modal -->

                    <div class="header">
                        <h2 class="title"><i class="fas fa-cogs"></i><strong> Información del Parqueo</strong></h2>
                    </div>

                    <div class="inside">
                        <label for="idsupplier"><strong>Seleccione el parqueo a asignar:</strong></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-layer-group"></i></span>
                            <select name="idlot" id="idsupplier" style="width: 88%" >
                                @foreach ($lots as $l)
                                    <option value=""></option>
                                    <option value="{{$l->id}}">{{$l->number_park.' - '.$l->security->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                </div>
            </div>
            
        </div>

                
        <div class="row mtop16">
            

            <div class="col-md-12">
                     
                
                <div class="panel shadow mtop16">
                    <div class="inside">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-success', 'id'=>'btn_guardar']) !!}
                    </div>
                </div>                 
            </div>
        </div>

        
        {!! Form::close() !!}
    </div>



@endsection