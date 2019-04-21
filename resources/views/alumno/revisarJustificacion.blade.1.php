@extends('layouts.alumno')



@section('utilitiesHead')
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
  @section('content')

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Registro Justificaciones</small></h3>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Fecha Solicitud</th>
                        <th>Asignatura</th>
                        <th>Fecha Inicio Falta</th>
                        <th>Fecha Fin Falta</th>
                        <th>Estado</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>06/07/2018</td>
                        <td>Adm. Base de Datos</td>
                        <td>28/06/2018</td>
                        <td>04/07/2018</td>
                        <td>Aceptada</td>
                      </tr>
                      <tr>
                        <td>06/07/2018</td>
                        <td>Adm. Base de Datos</td>
                        <td>28/06/2018</td>
                        <td>04/07/2018</td>
                        <td>Rechazada</td>
                      </tr>
                      <tr>
                        <td>12/07/2018</td>
                        <td>Adm. Base de Datos</td>
                        <td>28/06/2018</td>
                        <td>04/07/2018</td>
                        <td>Validando</td>
                      </tr>
                      <tr>
                        <td>06/07/2018</td>
                        <td>Adm. Base de Datos</td>
                        <td>28/06/2018</td>
                        <td>04/07/2018</td>
                        <td>Rechazada</td>
                      </tr>
                      <tr>
                        <td>06/07/2018</td>
                        <td>Adm. Base de Datos</td>
                        <td>28/06/2018</td>
                        <td>04/07/2018</td>
                        <td>Rechazada</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /page content -->

@endsection

@section('utilities')
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <script type="text/javascript">
  $(document).ready( function () {
$('#datatable').DataTable();
} );
  </script>
@endsection
