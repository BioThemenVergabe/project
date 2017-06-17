<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Name of the Person who writes a contact message
     *
     * @var String name
     */
    private $name;

    /**
     * The lastname of the Person who writes a contact message
     *
     * @var String lastname
     */
    private $lastname;

    /**
     * Mailaddress of the Person
     *
     * @var Mail Mailaddress
     */
    private $mail;

    /**
     * The Message send to the contact.
     *
     * @var Text message
     */
    private $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->name = $request->name;
        $this->lastname = $request->lastname;
        $this->mail = $request->email;
        $this->message = $request->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact')->with([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'mail' => $this->mail,
            'message' => $this->message,
        ]);
    }
}
