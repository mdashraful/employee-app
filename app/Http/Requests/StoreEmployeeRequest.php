<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            "username" => 'required|unique:users,username',
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            'password' => 'required',
            "company_id" => 'required',
            "department_id" => 'required',
            "designation_id" => 'required',
            "join_date" => 'required|date',
            "nid_no" => 'required',
            "phone" => 'required|unique:employees,phone',
            'role_id' => 'nullable',
        ];
    }
}
