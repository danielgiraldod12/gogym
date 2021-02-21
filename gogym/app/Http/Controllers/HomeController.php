<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactanos;

class HomeController extends Controller
{
    public function home()
    {
        return view('home'); //Le paso la vista principal
    }
    public function store(StoreContactanos $request){
            
        $correo=new ContactanosMailable($request->all());
        
        Mail::to('sweden@gmail.com')->send($correo);
     
      return redirect()->route('home')->with('info','Mensaje enviado');
    }

}
