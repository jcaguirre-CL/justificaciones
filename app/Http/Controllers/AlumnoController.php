<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Justification;

class AlumnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verificar = User::select('activacion')->where('email', auth()->user()->email)->get();
        logger(json_decode($verificar, true)[0]['activacion']);
        if (!json_decode($verificar, true)[0]['activacion']) {
            return view('contrasena.cambiar', []);
        }

        $justificacion  = Justification::where([['correo_alum','like', auth()->user()->email]])->get();
        $cantEmitidas   = Justification::where('correo_alum','like', auth()->user()->email)->count();
        $cantAprobadas  = Justification::where([['correo_alum','like', auth()->user()->email],['estado', 'like', 'Aprobado' ]])->count();
        $cantRechazadas = Justification::where([['correo_alum','like', auth()->user()->email],['estado', 'like', 'Rechazado']])->count();
        $cantValidando  = Justification::where([['correo_alum','like', auth()->user()->email],['estado', 'like', 'Pendiente' ]])->count();
        logger($justificacion);

        return view('alumno.index', [
            'justificacion'  => $justificacion,
            'cantEmitidas'   => $cantEmitidas,
            'cantAprobadas'  => $cantAprobadas,
            'cantRechazadas' => $cantRechazadas,
            'cantValidando'  => $cantValidando
        ]);
    }

    public function listarJustificaciones($value='')
    {
      // code...
    }
}
