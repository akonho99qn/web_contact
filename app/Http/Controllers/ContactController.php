<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(Request $request)
    {
       $contact = new Customer();
       $contact->name = $request['name'];
       $contact->email= $request['email'];
       $contact->phone = $request['phone'];
       $contact->tittle = $request['tittle'];
       $contact->save();

        Mail::to('yachin.vn@gmail.com')->send(new ContactMail($request['email']));
        return back();
//        return response()->json([]);
    }

}
