<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.Contact.contact');
    }
    public function create()
    {
        return view('frontend.Contact.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone', ''),
            'subject' => $request->input('subject', ''),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact.index')->with('success', 'Your message has been sent. Thank you!');
    }
}
