<?php

namespace App\Http\Controllers;

use App\Mail\SendContactForm;
use App\Http\Requests\ContactRequest;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(): view {

        return view("contact.index");
    }

    public function send(ContactRequest $request) {
        
        try {

            Mail::to(User::first())->send(
                new SendContactForm(
                    $request->input("subject"),
                    $request->input("message"),
                )
            );

            return back()
                     ->with("success", "El mensaje fue enviado correctamente ");

        } catch(\Exception $exception){

            return back()
                     ->with("error", "Hubo un error al enviar el mensaje: ". $exception->getMessage() ); 
        }
    }
}
