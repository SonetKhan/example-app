<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactController extends Controller
{
    //
    public function __construct(){

        $this->middleware('auth');

    }
    public function adminContact(){

        $contactData = Contact::all();

        return view('admin.contact.index',compact('contactData'));
    }
    public function addContact(){

        return view('admin.contact.create');
    }
    public function storeContact(Request $request){

            $contacValidate = $request->validate([
                'address'=>'required|min:4',
                'email'=>'required',
                'phone'=>'required'
            ]);

        $contact = new Contact();

        $contact->address = $request->address;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->save();

        return redirect()->route('admin.contact')->with('success','Contact added successfully');
    }
    public function contactDetails(){
        $contactData = DB::table('contacts')->first();
        return view('pages.contact',compact('contactData'));
    }
    public function contactMessage(Request $request){
       $messageValidate = $request->validate([
           'name'=>'required|min:4',
           'email'=>'required',
           'message'=>'required'
       ]);

       $message = new ContactForm();

       $message->name = $request->name;

       $message->email = $request->email;

       $message->subject = $request->subject;

       $message->message = $request->message;

       $message->save();

       return redirect()->route('contact')->with('success','Message sent successfully. Thanks for messaging us!!');

    }
    public function adminMessage(){


        $messages = ContactForm::all();

        return view('admin.message.index',compact('messages'));
    }

    public function adminMessageDelete($id){



        $deleteData = new ContactForm();

        $deleteData->find($id)->delete();

        return redirect()->back()->with('success','Message delete successfully');
    }

}
