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

Route::get('/filtrar',function ()
{
   $articulos = Articulo::where('seccion','Ceramica')->take(1)->get();
   /*foreach($articulos as $articulo){
       echo "Nombre: $articulo->Nombre_Articulo, Precio: $articulo->precio <br>";
   }*/

   return $articulos;
});

Route::get('/insertar', function(){
    $articulo = new Articulo;
    $articulo->Nombre_Articulo = "Pantalones";
    $articulo->precio = 30.00;
    $articulo->pais_origen = "España";
    $articulo->observaciones = "Lavados a la piedra";
    $articulo->seccion = "Confeccion";
    $articulo->save();
});

Route::get('/actualizar', function(){
    /*$articulo = Articulo::find(7);
    $articulo->Nombre_Articulo = "Pantalones";
    $articulo->precio = 35.00;
    $articulo->pais_origen = "España";
    $articulo->observaciones = "Lavados a la piedra";
    $articulo->seccion = "Confeccion";
    $articulo->save();*/
    Articulo::where('seccion', 'menaje')->where('pais_origen','España')->update(['precio'=>90.00]);
});

Route::get('/borrar', function(){
   /* $articulo = Articulo::find(2);
    $articulo->delete();*/
    Articulo::where('seccion','Ferreteria')->delete();
});

Route::get('/insertar_varios', function(){
    /* $articulo = Articulo::find(2);
     $articulo->delete();*/
     Articulo::create(["Nombre_Articulo"=>"Impresora", "precio"=>150.00, "pais_origen"=>"ESA", "seccion"=>"Informatica", "observaciones"=>"Muy economica"]);
 });

 Route::get('/softdelete', function(){
    /* $articulo = Articulo::find(2);
     $articulo->delete();*/
     Articulo::find(4)->delete();
 });

 Route::get('/forcedelete', function(){
    /* $articulo = Articulo::find(2);
     $articulo->delete();*/
     Articulo::withTrashed()->where('id',4)->forceDelete();
 });

 Route::get('/softdelete_leer', function(){

     //return Articulo::withTrashed()->where('id',4)->get();
     Articulo::withTrashed()->where('id',4)->restore();
 });
/*Route::get('/insertar', function(){
    DB::insert('INSERT INTO articulos (NOMBRE_ARTICULO, PRECIO, PAIS_ORIGEN, OBSERVACIONES, SECCION) VALUES(?,?,?,?,?)', ["NAVAJA",120.0,"SUIZA","Multiusos","Ferreteria"]);
});*/