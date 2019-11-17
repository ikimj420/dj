<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(1);
        return view('contacts.index', compact('user'));
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
