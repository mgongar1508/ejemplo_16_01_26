<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormularioContacto(){
        return view('correos.formcontacto');
    }

    public function procesarFormularioContacto(Request $request){
        $datos = $request->validate(self::rules());
        $datos['email'] == Auth::user() ? Auth::user()->mail : $datos['email'];
        try{
            Mail::to('soporte@mitio.com')->send(new ContactoMailable($datos));
            return redirect()->route('inicio')->with('mensaje', 'Correo enviado, gracias por sus sugerencias');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            //return redirect()->route('inicio')->with('mensaje', 'No se pudo enviar el mensaje, intentelo más tarde');
        }
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
