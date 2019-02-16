<?php

use App\Articulo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/contactanos', function () {
    return view('contacto');
});
Route::get('/galeria', function () {
    $alumnos = ["Ana", "Sara", "Antonio", "Manuel"];
    return view('galeria', compact("alumnos"));
});

/*Route::get('/insertar', function(){
    DB::insert('INSERT INTO articulos (NOMBRE_ARTICULO, PRECIO, PAIS_ORIGEN, OBSERVACIONES, SECCION) VALUES(?,?,?,?,?)', ["PC",1500.0,"EEUU","Powerfull","Electronica"]);
});

Route::get('/leer', function(){
    $resultados = DB::select('SELECT * FROM articulos WHERE id = ?',[1]);
    foreach($resultados as $articulo){
        return $articulo->Nombre_Articulo;
    }
});

Route::get('/actualiza', function(){
    DB::update('UPDATE articulos SET seccion = ? WHERE id = ?', ['Decoracion', 1]);
});

Route::get('/eliminar', function(){
    DB::delete('DELETE FROM articulos WHERE id = ?',[1]);
});*/

Route::get('/leer',function ()
{
   $articulos = Articulo::all();
   foreach($articulos as $articulo){
       echo "Nombre: $articulo->Nombre_Articulo, Precio: $articulo->precio <br>";
   }
});