<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(){
        return view('/contact/contact');
    }

    public function confirm(ContactRequest $request){
        var_dump($_POST['message']);
        Message::create([
            'name' => $_POST['nom'],
            'email' => $_POST['email'],
            'content' => $_POST['message'],
        ]);
        Mail::to('ronzier@alwaysdata.net')
            ->send(new Contact($request->except('_token')));
        return view('/contact/confirm');
    }
}
