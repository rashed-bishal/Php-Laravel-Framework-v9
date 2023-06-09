<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address'=>'required',
            'phone'=>'required',
            'company_id'=> 'required|exists:companies,id',
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Why the hell did you keep the email field empty?",
            'email.email' => "This is an obnoxious type email address. Change it now!",
        ];
    }
}
