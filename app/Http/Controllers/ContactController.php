<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required|string|min:4|max:15',
            'email' => 'required|email|unique:contacts,email',
            'subject' => 'nullable|string|min:4|max:150',
            'message' => 'required|string|min:6|max:200'
        ], [
            'full_name.required' => 'Please enter your full name',
            'email.unique' => 'This email is already used',
            'message.min' => 'Message must be at least 6 characters'
        ]);

        Contact::create($request->only([
            'full_name',
            'email',
            'subject',
            'message'
        ]));

        return redirect()->route('website.contact')->with('success', 'Enquiry Submited successfully!');
    }
}
