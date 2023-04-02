<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::pluck('name','id');
        $contacts = Contact::select('id', 'first_name', 'last_name', 'email', 'company_id')->orderBy('first_name', 'asc')->paginate(20);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function filteredContacts($id = null)
    {

        $companies = Company::pluck('name','id');
        if(isset($id))
        {
            $contacts = Contact::select('id', 'first_name', 'last_name', 'email', 'company_id')->where('company_id',$id)
                    ->orderBy('first_name')->paginate(10);
            return view('contacts.index', compact('contacts', 'companies'));
        }
        else if(!empty(request('search')))
        {
            $search = request('search');
            if(isset($search))
            {
                $contacts = Contact::select('id', 'first_name', 'last_name', 'email', 'company_id')->where('first_name','LIKE',"%{$search}%")
                            ->orWhere('last_name','LIKE',"%{$search}%")
                            ->orWhere('email','LIKE',"%{$search}%")
                            ->orderBy('first_name')->paginate(10);  

                return view('contacts.index', compact('contacts', 'companies'));
            }
        }  
         else
        {
            
            return redirect()->route('contacts.index');
        }   
    }

    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('contacts.create', compact('companies'));
    }

    public function show(Contact $contact)
    {
        $companies = Company::pluck('name','id');
        return view('contacts.show', compact('contact', 'companies'));
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name','id');
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(UpdateContactRequest $request)
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

    public function store(StoreContactRequest $request)
    {
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
