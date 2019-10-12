<?php

namespace App\Http\Controllers;

use App\Justification;
use DB;

class CoordinadorController extends Controller
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


    // public function index()
    // {
    //     $verificar = DB::table('users')->select('activacion')->where('email', auth()->user()->email)->get();
    //     if (!json_decode($verificar, true)[0]['activacion']) {
    //         return view('contrasena.cambiar', []);
    //     }

    //     $listaJustificacionesValidando = DB::table('justifications')
    //         ->select('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         ->join('datos_semestre', 'justifications.correo_alum', 'datos_semestre.correo_alum')
    //         ->where([['justifications.correo_cor','like', auth()->user()->email],['estado', 'like', 'Pendiente']])
    //         ->groupBy('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         //->groupBy('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS','ESTADO')
    //         ->get();

    //     $listaJustificacionesAprobadas = DB::table('justifications')
    //         ->select('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         ->join('datos_semestre', 'justifications.correo_alum', 'datos_semestre.correo_alum')
    //         ->where([['justifications.correo_cor','like', auth()->user()->email],['estado', 'like', 'Aprobado']])
    //         ->groupBy('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         ->limit(1000)->get();

    //     $listaJustificacionesRechazadas = DB::table('justifications')
    //         ->select('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         ->join('datos_semestre', 'justifications.correo_alum', 'datos_semestre.correo_alum')
    //         ->where([['justifications.correo_cor','like', auth()->user()->email],['estado', 'like', 'Rechazado']])
    //         ->groupBy('justifications.ID_DATO','NFOLIO', 'RUT_ALU', 'justifications.NOMBRE_ALUM', 'FEC_SOL', 'FEC_JUS', 'ASIGNATURA','ESTADO')
    //         ->limit(1000)->get();

    //     return view('coordinador/index', [
    //         'listaJustificacionesValidando' => $listaJustificacionesValidando,
    //         'listaJustificacionesRechazadas' => $listaJustificacionesRechazadas,
    //         'listaJustificacionesAprobadas' => $listaJustificacionesAprobadas
    //     ]);
    // }
    public function index()
    {
        $verificar = DB::table('users')->select('activacion')->where('email', auth()->user()->email)->get();
        //     if (!json_decode($verificar, true)[0]['activacion']) {
        //         return view('contrasena.cambiar', []);
        //     }
        $listaJustificacionesValidando= self::listarJustificacionesPorEstado('Pendiente');
        $listaJustificacionesRechazadas= self::listarJustificacionesPorEstado('Rechazado');
        $listaJustificacionesAprobadas= self::listarJustificacionesPorEstado('Aprobado');
        logger($listaJustificacionesValidando);
        logger($listaJustificacionesRechazadas);
        logger($listaJustificacionesAprobadas);
        return view('coordinador/index', [
            'listaJustificacionesValidando' => $listaJustificacionesValidando,
            'listaJustificacionesRechazadas' => $listaJustificacionesRechazadas,
            'listaJustificacionesAprobadas' => $listaJustificacionesAprobadas 
        ]);
    }
    public function listarJustificacionesPorEstado($estado){
        return DB::table('justifications')
        ->select('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y") as fec_sol'),'motivo', 'ESTADO', 'FEC_JUS','NOMBRE_ALUM')
        ->where([['CORREO_COR','like', auth()->user()->email],['estado', 'like', '%'.$estado.'%']])
        ->groupby('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y")'),'motivo', 'ESTADO', 'FEC_JUS','NOMBRE_ALUM')
        ->orderby('fec_sol', 'desc')
        ->get();
      }
  
 
}
