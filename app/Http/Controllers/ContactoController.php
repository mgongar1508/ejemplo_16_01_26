<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function pintarFormularioContacto(){
        return view('correos.formcontacto');
    }

    public function procesarFormularioContacto(Request $request){
        $datos = $request->validate(self::rules());
        $datos = ['email'] == Auth::user() ? Auth::user()->mail : $datos['email'];
        return redirect()->route('contacto.show')->with('mensaje', 'mensaje enviado');
    }

    public function rules():array{
        $rules = [
            'nombre' => ['required', 'string', 'min:2', 'max:30'],
            'comentario' => ['required', 'string', 'min:2', 'max:500'],
        ];

        if(Auth::guest()){ //si el usuario es invitado, mete el email ademas de los campos anteriores
            $rules['email'] = ['required', 'email', 'max:250'];
        }

        return $rules;
    }
}
