<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyFirstController;
use App\Http\Controllers\Admin\PhotoController;


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


# ---------------------------------------------------------------------------------------------------------------------------------
#5 ROTTE PER COLLEGARE/GESTIRE UN CONTROLLER RIFERENDOSI AL METODO

// Rotta che risponde al path /hello-controller e invece di utilizzare una funzione dice a Laravel che per essere gestito deve collegarsi al Controller (MyFirstController) e al Metodo (index)
// Route::get('/hello-controller-1', 'MyFirstController@index'); // non funziona più (vecchia sintassi)
// Route::get('/hello-controller-2', 'App\Http\Controllers\MyFirstController@index'); // così funziona

Route::get('/hello-controller', [MyFirstController::class, 'index']); // nuova sintassi per riferirsi al Controller e al metodo


# ---------------------------------------------------------------------------------------------------------------------------------
#6 PASSARE DEI PARAMETRI ALLE ROTTE TRAMITE IL PATH +
#7 RESTITUIRE TUTTO TRAMITE UNA VISTA/VIEW
Route::get('/hello-controller/{param1}/{param2}', [MyFirstController::class, 'index']);


# ---------------------------------------------------------------------------------------------------------------------------------
#8 query-string
Route::get('/hello-controller-query-string', [MyFirstController::class, 'indexWithQueryString']);
// Se inseriamo come path: http://127.0.0.1:8000/hello-controller-query-string?p1=daniele&p2=segreto
// riceveremo: string(7) "daniele" string(7) "segreto"

# ---------------------------------------------------------------------------------------------------------------------------------

#metodo 1 (old, non funziona più)
// Route::get('photos', 'Admin\PhotoController@index');
// Route::post('photos', 'Admin\PhotoController@store');

#metodo 2 (new, questo funziona)
Route::get('photos', [PhotoController::class, 'index']);
Route::post('photos', [PhotoController::class, 'store']);
// e così per tutti gli altri che dobbiamo implementare/gestire

# altro modo per creare queste rotte
// Route::resource('photos', 'Admin\PhotoController'); // non funziona (old)
// Route::resource('photos', PhotoController::class); // funziona (new) // COMMENTIAMOLO

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#COMMENTARE QUESTA PARTE --------------------------------------------------------------
// togliere ->namespace('Admin') // altrimenti non funziona
// Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

// Route::resource('photos', 'PhotoController'); // non funziona (old)
// Route::resource('photos', PhotoController::class); // funziona (new)

//});

#FUNZIONA SE TOGLIAMO ->namespace('Admin')
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('photos', PhotoController::class); // funziona (new)

});
