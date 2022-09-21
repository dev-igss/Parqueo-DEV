<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Assignment, App\Http\Models\SecurityCheckpoint, App\Http\Models\ParkingLot;
use Validator,Auth, Session, DB, Response;

class AssigmentController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('IsAdmin');
        $this->middleware('UserStatus');
        $this->middleware('Permissions');
    }

    public function getHome(){        
        $assignments = Assignment::with('parking_lot')->get();

        //return $assignments;

        $data = [
            'assignments' => $assignments
        ];

        return view('admin.assigments.home',$data);
    }

    public function getAssignmentAdd(){        
        
        $lots = ParkingLot::with('security')->where('estado',0)->get();

        $data = [
            'lots' => $lots
        ];

        return view('admin.assigments.add',$data);
    }

    public function postAssignmentAdd(Request $request){
        $rules = [
    		'ibm' => 'required'
    	];
    	$messagess = [
    		'ibm.required' => 'Se requiere el ibm del usuario del parqueo.'
    	];

        $validator = Validator::make($request->all(), $rules, $messagess);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('messages', 'Se ha producido un error.')->with('typealert', 'danger');
        else: 
            $assg = new Assignment;
            $assg->ibm = $request->input('ibm');
            $assg->name_full = e($request->input('name'));
            $assg->job = e($request->input('job'));
            $assg->service = e($request->input('service'));
            $assg->parking_lot_id = $request->input('idlot');
            $assg->placa1 = e($request->input('placa1'));
            $assg->placa2 = e($request->input('placa2'));
            $assg->placa3 = e($request->input('placa3'));
            $assg->status = 0;

            if($assg->save()):
                $lot = ParkingLot::findOrFail($assg->parking_lot_id);
                $lot->estado = 1;
                $lot->save();

                return back()->with('messages', '¡Espacio de parqueo creado y guardado con exito!.')
                    ->with('typealert', 'success');
    		endif;
        endif;
    }

    public function getSecurityCheckpoint(){        
        $security = SecurityCheckpoint::all();

        //return $assignments;

        $data = [
            'security' => $security
        ];

        return view('admin.security_checkpoints.home',$data);
    }

    public function postSecurityCheckpoint(Request $request){
        $rules = [
    		'name' => 'required'
    	];
    	$messagess = [
    		'name.required' => 'Se requiere un nombre para el servicio general.'
    	];

        $validator = Validator::make($request->all(), $rules, $messagess);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('messages', 'Se ha producido un error.')->with('typealert', 'danger');
        else: 
            $sc = new SecurityCheckpoint;
            $sc->name = e($request->input('name'));

            if($sc->save()):
                return back()->with('messages', '¡Garita de seguridad creada y guardada con exito!.')
                    ->with('typealert', 'success');
    		endif;
        endif;
    }

    public function getParkingLot($id){      
        $security = SecurityCheckpoint::where('id',$id)->first();  
        $lots = ParkingLot::where('security_checkpoint_id', $id)->get();

        //return $assignments;

        $data = [
            'security' => $security,
            'lots' => $lots
        ];

        return view('admin.security_checkpoints.parking_lot',$data);
    }

    public function postParkingLot(Request $request){
        $rules = [
    		'number_park' => 'required'
    	];
    	$messagess = [
    		'number_park.required' => 'Se requiere un número de espacio para el parqueo.'
    	];

        $validator = Validator::make($request->all(), $rules, $messagess);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('messages', 'Se ha producido un error.')->with('typealert', 'danger');
        else: 
            $lot = new ParkingLot;
            $lot->security_checkpoint_id = $request->input('garita');
            $lot->number_park = $request->input('number_park');

            if($lot->save()):
                return back()->with('messages', '¡Espacio de parqueo creado y guardado con exito!.')
                    ->with('typealert', 'success');
    		endif;
        endif;
    }

    public function getRemoveAccess($id){      
        $assignment = Assignment::findOrFail($id);  
        $assignment->status = 1;        

        if($assignment->save()):

            $lot = ParkingLot::findOrFail($assignment->parking_lot_id);
            $lot->estado = 0;
            $lot->save();

            return back()->with('messages', '¡Cambio de estado guardado con exito!.')
                ->with('typealert', 'success');
        endif;
    }
}
