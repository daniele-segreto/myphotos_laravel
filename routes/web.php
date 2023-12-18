<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


# ---------------------------------------------------------------------------------------------------------------------------------
#1 INTRODUZIONE ALLE ROTTE

// Rotta welcome preimpostata da LaraveL
Route::get('/', function () {
    return view('welcome'); // restituisce una vista (che possiamo trovare in resources > views > welcome.blade.php)
});

// Rotta realizzata manualmente
Route::get('/hello', function () {
    return 'Hello world!!!'; // restituisce una stringa
});


# ---------------------------------------------------------------------------------------------------------------------------------
#2 PARAMETRI

// Possiamo settare dei parametri dal path e possiamo leggerli e mostrarli in pagina
Route::get('/hello/{param}', function ($param) {
    return 'Hello world!!! Param : ' . $param; // restituisce una stringa
});
// Aggiungo dei parametri alla parte dinamica, che verranno poi letti e stampati
// Quando inserisco ad esempio il path http://127.0.0.1:8000/hello/Daniele, sulla pagina visualizzeremo: Hello world!!! Param : Daniele

// Possiamo avere più parametri
Route::get('/hello/{param1}/{param2}', function ($param1, $param2) {
    return 'Hello world!!! Param1 : ' . $param1 . ' Param2 : ' . $param2 . ''; // restituisce una stringa
});


# ---------------------------------------------------------------------------------------------------------------------------------
#3 ORDINE DEI PARAMETRI

// IMPORTANTE: Conta l'ordine. Il nome del parametro all'interno della funzione corrisponde a quello della rotta, per ordine di inserimento. Quindi se all'interno della funzione si invertono i parametri (es. $param1, $param2), funziona ugualmente, ma in ordine invertito
Route::get('/hello/{param1}/{param2}', function ($param2, $param1) {
    return 'Hello world!!! Param1 : ' . $param1 . ' Param2 : ' . $param2 . ''; // restituisce una stringa
});

// altro esempio per capire meglio:
Route::get('/hello/{param1}/{param2}', function ($p1, $p2) {
    return 'Hello world!!! Param1 : ' . $p1 . ' Param2 : ' . $p2 . ''; // restituisce una stringa
});
// Il nome del parametro non deve corrispondere necessariamente a quello del parametro della funzione, ma per semplicità lo mettiamo uguale


# ---------------------------------------------------------------------------------------------------------------------------------
#4 VIEWS

// Rotta per restituire una view
Route::get('/hello-view', function () {
    return view('hello-view'); // restituisce una vista
});

// Passare dei dati alla view
Route::get('/hello-view', function () {

    // Questo model è un array associativo che ha due chiavi: param1 (hello) e param2 (world)
    $model = [
        'param1' => 'hello',
        'param2' => 'world',
    ];

    return view('hello-view', $model); // restituisce una vista (e passiamo il $model alla vista)
});

// I dati alla views possono essere anche i parametri che abbiamo passato tramite path
Route::get('/hello-view/{param}', function ($param) {

    // Questo model è un array associativo che ha due chiavi: param1 (hello) e param2 (world)
    $model = [
        'param1' => $param, // impostato come parametro dinamico
        'param2' => 'world',
    ];

    return view('hello-view', $model); // restituisce una vista (e passiamo il $model alla vista)
});
