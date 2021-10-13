<?php

namespace App\Mail;

use Dotenv\Util\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public string $textSubject;
    public string $textMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $message)
    {
        //TODO creo el mailable para enviar correo

        $this->textSubject = $subject;
        $this->textMessage = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //TODO se debe publicar en vendor para enviar el correo
        //php artisan vendor:publish y selecciona la opcion de mail
        //esto crea una carpeta vendor en view
        return $this
            ->subject("Formulario de Contacto - ". config("app.name"))
            ->markdown("emails.contact");
    }
}
