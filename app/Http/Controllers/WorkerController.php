<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    public function index()
    {
        $worker = Worker::all();
        return response()->json([
            'message' => 'Trabajador creado',
            'worker' => $worker
        ], Response::HTTP_OK);
    }
    public function create(Request $request)
    {
        $request->validate([
            'ci' => 'required|number|min:000000','nombre' => 'required','apellido_paterno' => 'required','apellido_materno' => 'required','direccion' => 'required','tipo_sangre' => 'required','celular' => 'required','profesion' => 'required','estado_civil' => 'required','sexo' => 'required','nacionalidad' => 'required','fecha_nacimiento' => 'required',
        ]);
        $validator = Validator::make($request, [
            'ci' => 'required|number|min:000000','nombre' => 'required','apellido_paterno' => 'required','apellido_materno' => 'required','direccion' => 'required','tipo_sangre' => 'required','celular' => 'required','profesion' => 'required','estado_civil' => 'required','sexo' => 'required','nacionalidad' => 'required','fecha_nacimiento' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Trabajador creado',
                'worker' => 'Datos imcompletos'
            ], Response::HTTP_BAD_REQUEST);
        }
        //Creamos el nuevo usuario
        $worker = Worker::create([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido_apterno' => $request->apellido_apterno,
            'apellido_materno' => $request->apellido_materno,
            'direccion' => $request->direccion,
            'tipo_sangre' => $request->tipo_sangre,
            'celular' => $request->celular,
            'profesion' => $request->profesion,
            'estado_civil' => $request->estado_civil,
            'sexo' => $request->sexo,
            'nacionalidad' => $request->nacionalidad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);
        //Nos guardamos el usuario y la contraseña para realizar la petición de token a JWTAuth
        $newWorker = $request->only('nombre', 'apellido_apterno','apellido_materno');
        //Devolvemos la respuesta con el token del usuario
        return response()->json([
            'message' => 'Trabajador creado',
            'worker' => $newWorker
        ], Response::HTTP_OK);
    }

}
