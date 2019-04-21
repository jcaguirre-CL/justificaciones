<?php

Route::get('/', function(){
    return redirect('/login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    // Route::post('/short', 'UrlMapperController@store');
    Route::post('alumno/store', 'JustificacionController@store');
    // Route::post('/short', 'UrlMapperController@store');
    // Route::post('alumno/store', 'JustificacionController@store');
});

//Imagen
Route::middleware(['auth'])->group(function(){

  // Alumno
  Route::get('/alumno/index','AlumnoController@index')->name('alumno');
  Route::get('/alumno/nuevaJustificacion','JustificacionController@create')->name('alumno');
  Route::get('/alumno/revisarJustificacion','JustificacionController@revisar')->name('alumno');
  Route::get('asignaturas/get/{asignaturaId}', 'JustificacionController@getAsignaturas');

  // Administrador
  Route::get('/administrador/index','AdministradorController@index')->name('administrador');

  // Coordinador
  Route::get('/coordinador/index','CoordinadorController@index')->name('coordinador');
  Route::get('coordinador/cambiarContrasena', 'ContrasenaController@index')->name('contrasena.create')->middleware('auth:web');

  //Roles
//   Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
//   Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
//   Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
//   Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
//   Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
//   Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
//   Route::get('roles/{role}', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');

  //Justificaciones
  Route::post('alumno/image/upload/store','SubirImagenController@upload')->name('subirimagen.filestore')->middleware('auth:web');

  Route::post('alumno/store', 'JustificacionController@store')->name('justificacion.store')->middleware('auth:web');
//   Route::post('alumno/store', 'JustificacionController@store')->name('justificacion.store')->middleware('can:post');
  //Route::get('justificaciones', 'JustificacionController@index')->name('justificacion.index')->middleware('permission:roles.index');
  Route::get('alumno/create', 'JustificacionController@create')->name('justificacion.create')->middleware('permission:justificacion.create');
  Route::get('alumno/cambiarContrasena', 'ContrasenaController@index')->name('contrasena.create')->middleware('auth:web');
  Route::post('alumno/contrasena/cambiar', 'ContrasenaController@cambiar')->name('contrasena.create')->middleware('auth:web');
//   Route::get('/changePassword','HomeController@showChangePasswordForm');

  Route::put('justificaciones/{role}', 'JustificacionController@update')->name('justificacion.update')->middleware('permission:justificacion.edit');
  Route::get('justificaciones/{role}', 'JustificacionController@show')->name('justificacion.show')->middleware('permission:justificacion.show');
  Route::get('justificaciones/{role}', 'JustificacionController@edit')->name('justificacion.edit')->middleware('permission:justificacion.edit');

  Route::get('justificaciones/{role}', 'JustificacionController@show')->name('justificacion.show')->middleware('permission:justificacion.show');
  Route::get('coordinador/edicion/{id}', 'JustificacionController@edit')->name('justificacion.edit')->middleware('auth:web');
  Route::post('coordinador/update/{id}', 'JustificacionController@update')->name('justificacion.update')->middleware('auth:web');

//  Route::post('coordinador/update', 'JustificacionController@udpdate')->name('justificacion.update');

  //Usuarios

//   Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
//   Route::put('users/{role}', 'UserCon troller@update')->name('users.update')->middleware('permission:users.edit');
//   Route::get('users/{role}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
//   Route::get('users/{role}', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

});







//-----------------------------------------------RUTAS DEL ADMINISTRADOR-----------------------------------------------------

// Route::get('/administrador/index', function () {
//     return view('administrador.index');
// });

// Route::get('/administrador/registroCoordinadores', function () {
//     return view('administrador.registroCoordinadores');
// });

// Route::get('/administrador/perfil', function () {
//     return view('administrador.perfil');
// });

// Route::get('/administrador/estadisticas1', function () {
//     return view('administrador.estadisticas1');
// });

// Route::get('/administrador/estadisticas2', function () {
//     return view('administrador.estadisticas2');
// });

// Route::get('/administrador/estadisticas3', function () {
//     return view('administrador.estadisticas3');
// });

// Route::get('/administrador/estadisticas4', function () {
//     return view('administrador.estadisticas4');
// });
//-----------------------------------------------RUTAS DEL ALUMNO-----------------------------------------------------

// Route::get('/alumno/nuevaJustificacion','JustificacionController@create');
// Route::post('/alumno/store', 'JustificacionController@store');



// Route::get('/alumno/misJustificaciones', function () {
//     return view('alumno.misJustificaciones');
// });


// Route::get('/alumno/perfil', function () {
//     return view('alumno.perfil');
// });




//-----------------------------------------------RUTAS DEL COORDINADOR-----------------------------------------------------

// Route::get('/coordinador/index', function () {
//     return view('coordinador.index');
// });

// Route::get('/coordinador/misJustificaciones', function () {
//     return view('coordinador.misEstadisticas');
// });

// Route::get('/coordinador/perfil', function () {
//     return view('coordinador.perfil');
// });

// Route::get('/coordinador/perfil', function () {
//     return view('coordinador.perfil');
// });



// Route::get('/home', 'HomeController@index')->name('home');
