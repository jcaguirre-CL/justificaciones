<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Justification;
use DB;
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
        $justificacion  = self::listarJustificacionesPorEstado('');
        $cantAprobadas  = self::contarJustificaciones('Aprobado');
        $cantRechazadas = self::contarJustificaciones('Rechazado');
        $cantPendientes = self::contarJustificaciones('Pendiente');
        $cantEmitidas   = self::contarJustificaciones('');
        logger($justificacion);
        //preguntar a ale que es logger
        return view('alumno.index', [
            'justificacion'  => $justificacion,
            'cantEmitidas'   => $cantEmitidas,
            'cantAprobadas'  => $cantAprobadas,
            'cantRechazadas' => $cantRechazadas,
            'cantPendientes' => $cantPendientes
        ]);
    }
    // Redirije al registro de justificaciones del alumno
    public function revisar(){
      return view('alumno.revisarJustificacion', ['justificacion'  => self::listarJustificacionesPorEstado('')]);
    }

    public function show($id)
    {

        // Datos de la justificacion
         $datosJustificacion = DB::table('justifications')
          ->where('nfolio', 'like', $id)
          ->first();

         $listaAsignaturasJustificadas = DB::table('justifications')
          ->select('ASIGNATURA')
          ->where('nfolio', 'like', $id)
          ->groupby('ASIGNATURA')
          ->get();


        // Datos del semestre del alumno

        $datosAlumno = DB::table('datos_semestre')->where([
          ['correo_alum', 'like', auth()->user()->email]
          ])->first();

        $imagenes = DB::table('documento')
            ->select('url','nfolio')
            ->where('nfolio','like', $id)
            ->get();
        //dd($imagenes) ;
        return view('alumno/verJustificaciones', [
            'justifications' => $datosJustificacion,
            'listaAsignaturasJustificadas' => $listaAsignaturasJustificadas,
            'datosAlumno' => $datosAlumno,
            'imagenes' => $imagenes,
            'folio' => $id,
        ]);
    }

    public function listarJustificacionesPorEstado($estado){
      return DB::table('justifications')
      ->select('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y") as fec_sol'),'motivo', 'ESTADO', 'FEC_JUS')
      ->where([['correo_alum','like', auth()->user()->email],['estado', 'like', '%'.$estado.'%']])
      ->groupby('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y")'),'motivo', 'ESTADO', 'FEC_JUS')
      ->orderby('fec_sol', 'desc')
      ->get();
    }

    public function contarJustificaciones($estado){
        $sub = DB::table('justifications')
                    ->select('nfolio')
                    ->where([['correo_alum','like', auth()->user()->email],['estado', 'like', '%'.$estado.'%']])
                    ->groupby('nfolio');
        return DB::table( DB::raw("({$sub->toSql()}) as sub") )
        ->mergeBindings($sub)
        ->count();
    }


}
