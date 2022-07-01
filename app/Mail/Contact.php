<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('melissa.mangione@gmail.com')
            ->view('emails.contact') // Le chemin d'abord nom du dossier puis nom du fichier
            ->with([ //ici j'assigne aux variables les données rentrées dans le formulaire pour les envoyer à la vue
                'contact_name' => $this->contact->contact_name,
                'email'=> $this->contact->email,
                'phone_number' => $this->contact->phone_number,
                'subject'=> $this->contact->subject,
                'content'=> $this->contact->message,
            ]);
    }
}
