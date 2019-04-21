<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Justification;
use DB;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $coordinadores =  self::getCoordinadoresJustifications();
      $justificationsDataSummary = self::getJustificationsDataSummary();
      return view('administrador.index', [ 'coordinadores' => $coordinadores,
                                           'justificationsDataSummary' => $justificationsDataSummary
                                         ]);
    }


    public function getCoordinadoresJustifications()
    {
      return Justification::selectRaw(' CORREO_COR,
                                        count(if(estado = ?, 1, null)) Aprobadas,
                                        count(if(estado = ?, 1, null)) Rechazadas,
                                        count(if(estado = ?, 1, null)) Pendientes,
                                        count(*) Total',
                                        ['Aprobado', 'Rechazado', 'Pendiente'])->groupBy('CORREO_COR')
                                        ->where('correo_cor','!=', ' ')
                                        ->get();
    }

    public function getJustificationsDataSummary()
    {
      return Justification::selectRaw(' count(if(estado = ?, 1, null)) Aprobadas,
                                        count(if(estado = ?, 1, null)) Rechazadas,
                                        count(if(estado = ?, 1, null)) Pendientes,
                                        count(*) Total',
                                        ['Aprobado', 'Rechazado', 'Pendiente'])
                                        ->where('correo_cor','!=', ' ')
                                        ->first();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
