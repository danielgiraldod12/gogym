<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Rol;
use App\Models\Record_num;
use App\Models\Training_center;
use App\Models\Training_program;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Models\States_event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function dashboard(){

        $NumUsers = User::all()->count(); //Estoy contando todos los registros de la tabla users
        $NumFichas = Record_num::all()->count(); //Estoy contando todos los registros de la tabla fichas
        $NumEvents = Event::all()->count(); //Estoy contando todos los registros de la tabla eventos

        return view('dashboard', compact('NumUsers', 'NumFichas', 'NumEvents')); //mostrar numero de usurios,eventos y fichas en la vista dashboard
    }

    public function users(){

        //Consulta para tabla usuarios
        $datatables = User::query() //Creo la variable datatables con el modelo User y el metodo query
            ->join('rols','rols.id', '=','users.id_rol') //Inner join con la tabla rols para poder usar sus tablas dentro de la consulta
            ->join('record_nums','record_nums.id', '=', 'users.id_record_num') //Inner join con la tabla ficha
            ->join('training_programs','training_programs.id', '=', 'users.id_training_program') //Inner join con la tabla programa
            ->join('training_centers','training_centers.id', '=', 'users.id_training_center') //Inner join con la tabla centro
            ->select([ //Selecciono
                'users.id', //Id de Usuario
                'users.typeOfIdentification', //Tipo de Doc
                'users.identification_num', //Num de Doc
                'users.name', //Nombre usuario
                'users.email', //Email usuario
                'rols.rol_name', //Rol del usuario con el inner join
                'record_nums.record_num', //Ficha del usuario con inner join
                'training_programs.name_program', //Programa del usuario con inner join
                'training_centers.name_center']) //Centro del usuario con inner join
            ->get();
        //Le retorno la vista al controlador y le digo que puede usar la variable datatables en la vista con el compact
        return view('user/users', compact('datatables'));
    }

    public function create(){
        /* Hago las querys de cada tabla para posteriormente usarlas en los selects
        del formulario create */
        $queryRol = Rol::all();
        $queryCentro = Training_center::all();
        $queryPrograma = Training_program::all();
        $queryFicha = Record_num::all();
        // Retorno la vista create y le digo que puede usar todas las variables creadas anteriormente
        return view('user/create', compact('queryRol','queryFicha','queryPrograma','queryCentro'));
    }

    public function crear(Request $request){

        $id = new User(); //Le digo que me cree un nuevo registro en el modelo User
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista create y los guarde en cada columna de la tabla users */
        
        $id->name = $request->name;
        $id->email = $request->email;
        $id->typeOfIdentification = $request->typeOfIdentification;
        $id->identification_num = $request->identification_num;
        $id->id_record_num = $request->id_record_num;
        $id->id_training_program = $request->id_training_program;
        $id->id_training_center = $request->id_training_center;
        $id->id_rol = $request->id_rol;
        $id->password = Hash::make('12345678');

        //$id->save(); //Le digo que guarde la informacion

        try {
            $error = !$id->save();
        } catch (QueryException $e) {
            $error = true;
            if ($e->getCode() === "23000") {
                $message = "¡El correo electronico y/o el numero de identidad ya estan en uso!";
            }
        }

        if (!$error) {
            /* Le digo que me redireccione a la vista de datatables con un mensaje */
            return redirect()->route('users' , $id)->with('message','¡Usuario creado satisfactoriamente!');
        } else {
            //$request->session()->flash('danger', $message ? $message : 'Error inesperado al intentar almacenar el usuario.');
            return redirect()->route('create' , $id)->with('message', $message);
        }
    }

    public function edit(User $id){
        /* Hago las querys de cada tabla para posteriormente usarlas en los selects
        del formulario edit */
        $rol = Rol::all();
        $training_center = Training_center::all();
        $training_program = Training_program::all();
        $record_num = Record_num::all();

        $query = $id; //Le mando la id

        return view('user/edit', compact('id','query','rol','training_program','training_center','record_num'));
    }

    public function update(Request $request, User $id){
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista edit y actualice el registro correspondiente */
        $id->name = $request->name;
        $id->email = $request->email;
        $id->typeOfIdentification = $request->typeOfIdentification;
        $id->identification_num = $request->identification_num;
        $id->id_record_num = $request->id_record_num;
        $id->id_training_program = $request->id_training_program;
        $id->id_training_center = $request->id_training_center;
        $id->id_rol = $request->id_rol;

        try {
            $error = !$id->save();
        } catch (QueryException $e) {
            $error = true;
            if ($e->getCode() === "23000") {
                $message = "¡El correo electronico y/o el numero de identidad ya estan en uso, volveremos a poner los datos que tenia antes!";
            }
        }

        if (!$error) {
            /* Le digo que me redireccione a la vista de datatables con un mensaje */
            return redirect()->route('users' , $id)->with('message','¡Actualizacion de usuario satisfactoria!');
        } else {
            //$request->session()->flash('danger', $message ? $message : 'Error inesperado al intentar almacenar el usuario.');
            return redirect()->route('edit' , $id)->with('message', $message);
        }

        //$id->save(); //Le digo que guarde la informacion
        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        //return redirect()->route('users' , $id)->with('message','¡Actualización de usuario satisfactoria!');
    }

    public function destroy(User $id){
        $id->delete(); //Le digo que elimine un registro utilizando la variable id y el metodo delete
        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        return redirect()->route('users' , $id)->with('message','¡Eliminación de usuario satisfactoria!');
    }

    /////////////////////////////////////

    public function record_num(){

        //Consulta para tabla usuarios
        $datatablesRecord = Record_num::query() //Creo la variable datatables con el modelo User y el metodo query
            ->join('training_programs','training_programs.id', '=', 'record_nums.id_training_program') //Inner join con la tabla programa
            ->select([ //Selecciono
                'record_nums.id', //Id de ficha
                'record_nums.record_num', //Nombre ficha
                'training_programs.name_program' //Programa de la ficha con inner join
                ])
            ->get();
        //Le retorno la vista al controlador y le digo que puede usar la variable datatables en la vista con el compact
        return view('record_num/record_nums', compact('datatablesRecord'));
    }

    public function creatern(){
        /* Hago las querys de cada tabla para posteriormente usarlas en los selects
        del formulario create */
        $queryPrograma = Training_program::all();
        // Retorno la vista create y le digo que puede usar todas las variables creadas anteriormente
        return view('record_num/createrecord_num', compact('queryPrograma'));
    }

    public function crearrn(Request $request){

        $id = new Record_num(); //Le digo que me cree un nuevo registro en el modelo User
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista create y los guarde en cada columna de la tabla users */

        $id->record_num = $request->record_num;
        $id->id_training_program = $request->id_training_program;

        $id->save(); //Le digo que guarde la informacion

        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        return redirect()->route('record_num' , $id)->with('message','¡Ficha creada satisfactoriamente!');
    }

    public function editrn(Record_num $id){
        /* Hago las querys de cada tabla para posteriormente usarlas en los selects
        del formulario edit */
        $record_num = Record_num::all();
        $training_program = Training_program::all();

        $query = $id; //Le mando la id

        return view('record_num/editrecord_num', compact('id','query','training_program','record_num'));
    }

    public function updatern(Request $request, Record_num $id){
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista edit y actualice el registro correspondiente */
        $id->record_num = $request->record_num;
        $id->id_training_program = $request->id_training_program;

        $id->save(); //Le digo que guarde la informacion
        return redirect()->route('record_num' , $id)->with('message','¡Actualización de ficha satisfactoria!');
    }

    public function destroyrn(Record_num $id){
        $id->delete(); //Le digo que elimine un registro utilizando la variable id y el metodo delete
        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        return redirect()->route('record_num' , $id)->with('message','¡Eliminación de ficha satisfactoria!');
    }

    /* Eventos */

    public function events(){

        //Consulta para tabla eventos
        $datatablesEvent = Event::query() //Creo la variable datatables con el modelo event y el metodo query
            ->select([ //Selecciono
                'events.id', //Id de evento
                'events.title', //Titulo evento
                'events.date', //Fecha del evento
                'events.description', //Descripcion de evento
                'events.state', //Estado del evento
                ])
            ->get();
        //Le retorno la vista al controlador y le digo que puede usar la variable datatables en la vista con el compact
        return view('event/events', compact('datatablesEvent'));
    }

    public function createevents(){
        // Retorno la vista create y le digo que puede usar todas las variables creadas anteriormente
        return view('event/createevents');
    }

    public function crearevents(EventRequest $request){

        $id = new Event(); //Le digo que me cree un nuevo registro en el modelo event
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista create y los guarde en cada columna de la tabla events */

        $id->title = $request->title;
        $id->date = $request->date;
        $id->description = $request->description;
        $id->state = $request->state;

        $id->save(); //Le digo que guarde la informacion

        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        return redirect()->route('events' , $id)->with('message','¡Evento creado satisfactoriamente!');
    }

    public function editevents(Event $id){
        /* Hago las querys de cada tabla para posteriormente usarlas en los selects
        del formulario edit */
        $stateEvents = States_event::all();

        $query = $id; //Le mando la id

        return view('event/editevents', compact('id','query','stateEvents'));
        //lo paso a la vista de editar eventos con el compact para utlizar el id query 
    }

    public function updateevents(EventRequest $request, Event $id){
        /* Le digo que utilice el request para que llame la informacion de los
        inputs de la vista edit y actualice el evento correspondiente */
        $id->title = $request->title;
        $id->date = $request->date;
        $id->description = $request->description;
        $id->state = $request->state;

        $id->save(); //Le digo que guarde la informacion
        return redirect()->route('events' , $id)->with('message','¡Actualización de evento satisfactorio!');
    }

    public function destroyevents(Event $id){
        $id->delete(); //Le digo que elimine un registro utilizando la variable id y el metodo delete
        /* Le digo que me redireccione a la vista de datatables con un mensaje */
        return redirect()->route('events' , $id)->with('message','¡Eliminación de evento satisfactorio!');
    }

    public function profile(){
        return view('profile'); //Vista perfil
    }



}

