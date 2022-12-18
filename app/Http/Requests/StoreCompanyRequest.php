<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'companyId' => 'required|unique:companies,companyId',
            'name' => 'required',
            'description' => 'required',
            'launch_date' => 'required|date',
            'phone' => 'required',
            'email' => 'required|unique:companies,email',
            'address' => 'required',
        ];
    }
}
