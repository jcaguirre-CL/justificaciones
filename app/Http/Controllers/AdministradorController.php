<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Justification;
use DB;
use App\Traits\Justificaciones;

class AdministradorController extends Controller
{
    use Justificaciones;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $coordinadores =  self::getCoordinadoresJustifications();
      $cantAprobadas  = $this->contarJustificaciones('Aprobado');
      $cantRechazadas = $this->contarJustificaciones('Rechazado');
      $cantPendientes = $this->contarJustificaciones('Pendiente');
      $cantEmitidas   = $this->contarJustificaciones('');
      return view('administrador.index',[
          'coordinadores'  => $coordinadores,
          'cantEmitidas'   => $cantEmitidas,
          'cantAprobadas'  => $cantAprobadas,
          'cantRechazadas' => $cantRechazadas,
          'cantPendientes' => $cantPendientes
      ]);
    }


    public function getCoordinadoresJustifications()
    {

      $subQuery = DB::table('justifications')
                  ->select('nfolio', 'ESTADO', 'CORREO_COR')
                  ->groupby('nfolio', 'ESTADO', 'CORREO_COR');

      return DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
      ->mergeBindings($subQuery)
      ->select(DB::raw("CORREO_COR,
	                      count(if(estado = 'Aprobado',1, null))  as Aprobadas,
	                      count(if(estado = 'Rechazado',1, null)) as Rechazadas,
                        count(if(estado = 'Pendiente',1, null)) as Pendientes,
                        count(*) as Total"))
      ->where('correo_cor','!=', ' ')
      ->groupby('correo_cor')
      ->get();
    }
}
