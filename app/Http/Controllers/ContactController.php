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
        $companies = Company::orderBy('name','asc')->pluck('name', 'id');
        return view('contacts.create', compact('companies'));
    }

    public function show($id)
    {
        $companies = Company::orderBy('name','asc')->pluck('name', 'id');
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact', 'companies'));
    }

    public function edit($id)
    {
        $companies = Company::orderBy('name','asc')->pluck('name', 'id');
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(Request $request)
    {
        $contact = Contact::find($request->id_Contact)->update([
            'first_name'=>$request->first_name,
            'last_name' =>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'company_id'=>$request->company_id,
        ]);

        return redirect()->route('contacts.index');

    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address'=>'required',
            'phone'=>'required',
            'company_id'=> 'required|exists:companies,id',
        ]);

        Contact::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'company_id'=>$request->company_id,
        ]);

        return redirect()->route('contacts.index');
    }

    public function erase(Request $request)
    {
        Contact::destroy($request->id_Contact);

        return redirect()->route('contacts.index');
    }


}
