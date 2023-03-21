<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|max:255',
            'lastName' => 'max:255',
            'email' => 'required|max:255',
            'phone' => 'max:30',
            'service' => 'max:255',
            'migrateTo' => 'max:255',
            'academicBackground' => 'max:255',
            'timeExperience' => 'max:255',
            'occupation' => 'max:255',
            'annualIncome' => 'max:255',
            'language' => 'max:255',
            'formLink' => 'max:255',
            'event' => 'max:255',
            'imported' => 'max:255',
            'send_mail' => 'max:255',
        ];
    }
}
