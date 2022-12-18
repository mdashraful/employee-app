<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            "employeeId" => ['required',
                Rule::unique('employees','employeeId')->ignore($this->employee)],
            "name" => 'required',
            "email" => ['required',
                Rule::unique('employees','email')->ignore($this->employee)],
            "company_id" => 'required',
            "department_id" => 'required',
            "designation_id" => 'required',
            "join_date" => 'required|date',
            "nid_no" => 'required',
            "phone" => 'required',
        ];
    }
}
