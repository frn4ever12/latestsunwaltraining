<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.Contact.index', compact('contacts'));
    }

    public function show($contact)
    {
        $contact = Contact::findOrFail($contact);
        return view('admin.Contact.show', compact('contact'));
    }
}
