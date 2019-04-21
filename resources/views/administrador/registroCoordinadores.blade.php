@extends('layouts.admin')

@section('content')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Registro Coordinadores</small></h3>
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
                      <th>Nombre</th>
                      <th>Area</th>
                      <th>Pendientes</th>
                      <th>Aprobadas</th>
                      <th>Rechazadas</th>
                      <th>Total</th>
                      <th>Promedio</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Catalina Vargas</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Benicio Briones</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Sonia Soledad Lopez</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Juan Pablo Bravo</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Jaime Muñoz</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Carolina Aedo</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Ema Olivares</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Yusef Sagredo</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Natalia Navarrete</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Camila Gonzalez</td>
                      <td>System Architect</td>
                      <td>19</td>
                      <td>61</td>
                      <td>20</td>
                      <td>110</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Mitzi Zepeda</td>
                      <td>System Architect</td>
                      <td>0</td>
                      <td>61</td>
                      <td>20</td>
                      <td>81</td>
                      <td>12,1</td>
                    </tr>
                    <tr>
                      <td>Fernando Arriagada</td>
                      <td>System Architect</td>
                      <td>9</td>
                      <td>61</td>
                      <td>20</td>
                      <td>100</td>
                      <td>12,1</td>
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
