<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusFormRequest extends FormRequest
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
        return [
            'date'=>'required',
            'busname'=>'required',
            'location'=>'required',
            'departure'=>'required',
            'arrival'=>'required',
            'availability'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048'
        ];
    }
}