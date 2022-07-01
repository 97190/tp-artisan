<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as MailContact;

class ContactController extends Controller
{

    public function createForm(Request $request) {
        return view('contact-us');
    }

    public function ContactForm(Request $request) {
        // Form validation
        $request->validate([
            'contact_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'subject'=>'required',
            'message' => 'required'
        ]);

        $contact = Contact::create([ // Assigne les valeurs saisies dans le formulaire au champs correspondant dans la bd (création de la nouvelle opération)
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'message'=> $request->message,
        ]);

        //  Send mail to admin
        Mail::to('melissa.mangione@gmail.com') //permet définir de qui est envoyé le mail
        ->send(new MailContact($contact));

        return redirect('/contact-us')
            ->with('success', 'Message envoyé !');
    }

}
