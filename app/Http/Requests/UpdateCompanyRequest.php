<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'companyId' => ['required', 
                Rule::unique('companies', 'companyId')->ignore($this->company)],
            'name' => 'required',
            'description' => 'required',
            'launch_date' => 'required|date',
            'departments' => 'required',
            'phone' => 'required',
            'email' => ['required', 
                Rule::unique('companies', 'email')->ignore($this->company)],
            'address' => 'required',
        ];
    }
}
