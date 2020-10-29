<?php

namespace App\Mail;

use App\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $name= $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $tittle = $request['tittle'];


        return $this->view('mail',compact('name','email','phone','tittle'));
    }
}
