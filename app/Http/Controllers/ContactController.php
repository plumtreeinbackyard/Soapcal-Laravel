<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data = "";
        return view('contact.contact', compact('data'));
    }
    
    public function thankyou(Contact $contact)
    {        
        $this->validate(request(),[
            'name' => 'required',            
            'email' => 'required|email',
            'message' => 'required'
        ]);
             
        $data = $contact->submit(request(['name','email','message','g-recaptcha-response']));
        
        
        if (empty($data))
        {
            return view('contact.thankyou');
        }else{
            return view('contact.contact', compact('data'));
        }      
        
        //return view('contact.thankyou', compact('data'));
    
        //return view('contact.thankyou');
    }
}
