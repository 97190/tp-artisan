<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Operation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($operation) // C'est le constructeur qui est appelé avec une variable donnée en parametre
    {
        $this->operation = $operation; // le $this permet d'avoir une variable globale qui peut être appelée de partout dans ce fichier 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() //Construction du mail 
    {
        return $this->from('melissa.mangione@gmail.com')
            ->view('emails.operation') // Le chemin d'abord nom du dossier puis nom du fichier
            ->with([ //ici j'assigne aux variables les données rentrées dans le formulaire pour les envoyer à la vue
                'nature_operation' => $this->operation->nature_operation,
                'date_operation'=> $this->operation->date_operation,
                'debit' => $this->operation->debit,
                'category'=> $this->operation->category->category_name,
                'status'=> $this->operation->status->status_name,
                'amount'=> $this->operation->amount,
            ]);
    }
}
