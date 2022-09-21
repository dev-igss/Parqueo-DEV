<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Assignment;

class ParkingLotsController extends Controller
{

    public function getConsulta($id){
        $asignacion = Assignment::where('id', $id)->get();

        $data = [
            'asignacion' => $asignacion
        ];

        return view('parqueo.consultas', $data);
    }

}
