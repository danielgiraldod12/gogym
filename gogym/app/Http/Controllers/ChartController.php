<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart1(){
        /* Creo la variable months y llamo al modelo User y le digo que me seleccione
        unicamente el mes de la columna created_at(creado en) con el alias mes y que
        ademas lo cuente por id, y despues le digo que lo agrupe por el mes*/
        $months = User::select([DB::raw("month(created_at) as mes"),DB::raw("count(id) as cantidad")])
            ->groupBy(DB::raw("month(created_at)"))
            ->get()->toArray(); //Le digo que me convierta la informacion en un array

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0); //Datos vacios para que despues los rellene la consulta
        foreach ($months as $index => $month) //For each de la variable months
        {
            $datas[$month['mes']-1]=$month['cantidad']; /*Le pido que en la variable
            datas me almacene la cantidad de usuarios reg en cada mes */
        }
        /* Le paso la vista chart1 y le digo que puede utilizar la variable datas */
        return view('charts/chart1', compact('datas'));
    }

    public function chart2(){
        /* Creo la variable record_num y llamo el modelo User y le digo que haga un inner join
        con la tabla record_nums y le digo que cuente nombre de la tabla user con el alias de cantidad
        y tambien le digo que seleccione record_num con el alias ficha y despues que lo agrupe
        por la ficha */
        $record_num = User::query()
            ->join('record_nums','record_nums.id', '=', 'users.id_record_num')
            ->select([DB::raw("count(name) as cantidad"),DB::raw("record_num as ficha")])
            ->groupBy(DB::raw("record_num"))
            ->get()->toArray(); //Le digo que me convierta la informacion en array

        $ficha= array(); //Esta vez es un array vacio debido a que no sabemos con certeza cuantas fichas pueden haber
        $cantFicha = array(); //Array vacio debido a que no sabemos cuantos usuarios tiene cada ficha
        foreach ($record_num as $index => $record)
        {
            array_push($ficha,$record['ficha']); //Voy ordenando el array de ficha con el array push
            array_push($cantFicha,$record['cantidad']); //Voy ordenando el array de Cantficha con el array push
        }
        /* Le paso la vista chart2 y le digo que puede utilizar las variables ficha y cantFicha */
        return view('charts/chart2', compact('ficha','cantFicha'));
    }
}
