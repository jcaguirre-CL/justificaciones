<?php

namespace App\Traits;
use DB;

trait Justificaciones
{

  public function contarJustificaciones($estado){

      $userEmail = (auth()->user()->rol == 0)?auth()->user()->email:'%%';
      $sub = DB::table('justifications')
                  ->select('nfolio')
                  ->where([['correo_alum','like',$userEmail],
                           ['estado', 'like', '%'.$estado.'%'],
                           ['correo_cor','not like', '']])
                  ->groupby('nfolio');
      return DB::table( DB::raw("({$sub->toSql()}) as sub") )
      ->mergeBindings($sub)
      ->count();
  }

  public function listarJustificacionesPorEstado($estado){
    return DB::table('justifications')
    ->select('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y") as fec_sol'),'motivo', 'ESTADO', 'FEC_JUS', 'CORREO_COR')
    ->where([['correo_alum','like', auth()->user()->email],
             ['estado', 'like', '%'.$estado.'%'],
             ['correo_cor','!=', ' ']])
    ->groupby('nfolio',DB::raw('DATE_FORMAT(fec_sol,"%d-%m-%Y")'),'motivo', 'ESTADO', 'FEC_JUS', 'CORREO_COR')
    ->orderby('fec_sol', 'desc')
    ->get();
  }
}

 ?>
