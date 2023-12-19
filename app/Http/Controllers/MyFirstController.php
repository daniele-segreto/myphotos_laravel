<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    // Al path /hello-controller, verrà restituito alla vista (tramite il metodo index) 'My first Controller!!!'
    public function index($param1, $param2)
    {
        $model = [
            'param1' => $param1,
            'param2' => $param2
        ];
        return view('hello-view', $model);
    }

    // I parametri non sono presi dal path, sono nella Query String, quindi li chiediamo alla Request (per poterli recuperare)
    // La Request è stata impacchettata da Laravel e ci viene passata come argomento di questo metodo (attraverso la dependency injection)
    public function indexWithQueryString(Request $request)
    {

        $all = $request->all();  // Otteniamo tutti i parametri presenti nella richiesta

        $p1 = $request->input('p1');  // Recuperiamo il valore del parametro 'p1' dalla Query String
        $p2 = $request->input('p2');  // Recuperiamo il valore del parametro 'p2' dalla Query String

        // var_dump($request); // non funziona (da capire) - Commentato perché non funzionante, richiede ulteriori investigazioni

        // var_dump($all);  // Stampiamo a schermo tutti i parametri presenti nella richiesta
        var_dump($p1);   // Stampiamo a schermo il valore del parametro 'p1'
        var_dump($p2);   // Stampiamo a schermo il valore del parametro 'p2'
    }

    // INDEPENCY INJECTION: E' IL SETTAGGIO DI UNA O PIU' DIPENDENZE ALL'INTERNO DI UN ALTRO OGGETTO CHE NE HA BISOGNO

}
