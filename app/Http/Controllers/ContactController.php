<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contacts.contact');
    }
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', ['contacts' => $contacts]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|string",
            'email' => "required|min:3|email",
            'content' => "required|min:3|string",
        ]);
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content']
        ];

        Contact::create($data);

        return redirect(route('posts.index'))->with('status', 'Success');
    }
}
