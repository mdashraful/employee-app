<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeave_applicationRequest extends FormRequest
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
            'fiscal_year' => 'required',
            'leave_category' => 'required',
            'leave_from' => 'required|date|before:leave_to',
            'leave_to' => 'required|date|after:leave_from',
            'leave_applied_days' => 'required',
            'details' => 'required',
            'attachment' => 'nullable',
        ];
    }
}
