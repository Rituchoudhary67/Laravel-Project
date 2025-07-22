<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // your methods like store() and index() here
    public function store(Request $request) {
       $request->validate([
               'name' => 'required',
               'email' => 'required|email',
               'phone' => 'required',
               'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
           ]);
       
       $contact = new Contact();
       $contact->name = $request->name;
       $contact->email = $request->email;
       $contact->phone = $request->phone;
       $contact->address = $request->address;
    
       //handel photo upload
       if($request->hasFile('photo')) {
           $file = $request->file('photo');
           $filename = time().'_'.$file->getClientOriginalName();
           $file->move(public_path('images/contacts'), $filename);
           $contact->photo = $filename;
       }
    
       $contact->save();
    
       return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
    }
    
    public function index() {
       $contacts = Contact::all();
       return view('contacts.index', compact('contacts'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;

        // If a new photo is uploaded
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/contacts'), $imageName);
            $contact->photo = $imageName;
        }

        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function create() {
        return view('contacts.create'); // This will load resources/views/contacts/create.blade.php
    }

    public function edit($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }


}
