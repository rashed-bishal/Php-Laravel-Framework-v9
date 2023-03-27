<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name','asc')->pluck('name', 'id');
        $contacts = Contact::select('id', 'first_name', 'last_name', 'email', 'company_id')->orderBy('first_name', 'asc')->paginate(20);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function filteredContacts($id)
    {
        $companies = Company::orderBy('name','asc')->pluck('name', 'id');
        $contacts = Contact::select('id', 'first_name', 'last_name', 'email', 'company_id')->where('company_id', $id)
                    ->orderBy('first_name')->paginate(10);

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
}
