<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(){
        return view('contacts.index');
    }
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        //
        Mail::to('dj@test.com')->send(new ContactMail($data));
        return back()->with('success','Message Sent Successfully!');
    }
}
