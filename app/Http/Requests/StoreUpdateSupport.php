<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body'=> [
                'required',
                'min:3',
                'max:10000',
            ],
        ];

        if($this -> method() === 'PUT' || $this -> method() === 'PATCH' ){
            $rules['subject'] = [
                'required',
                'min:3',
                'max: 255',
                // "unique: supports, subject, {$this -> id},id",
                Rule::unique('supports')->ignore($this -> support ?? $this -> id)
            ];
        }

        return $rules;
    }
}
