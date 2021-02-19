<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Contact;

class ContactController extends Controller
{
    public function create(Contact $contact){
      return view('contacts.create', ['contact'=>$contact]);
    }

    public function confirm(ContactsRequest $request, Contact $contact){
      $inputs = $request->all();
      return view('contacts.confirm', ['inputs'=>$inputs, 'contact'=>$contact]);
    }

    public function store(ContactsRequest $request){
      $action = $request->get('action', 'return');
      $input = $request->except('action');

      if($action === 'submit'){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->content = $request->content;
        $contact->save();

        Mail::to($input['email'])->send(new ContactMail('mails.contact', 'お問い合わせありがとうございます！', $input));
        return redirect()->route('contacts.complete');
      } else {
        return redirect()->route('contacts.create')->withInput($input);
      }
    }

    public function complete(){
      return view('contacts.complete');
    }
}
