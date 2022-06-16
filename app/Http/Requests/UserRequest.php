<?php

namespace App\Http\Requests;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:2|max:20',
            'Surname' => 'required|min:2|max:20',
            'birthday' => 'required|date_format:Y-m-d',
            'email' => 'bail|required|email|unique:users|max:4',
            'phone' => ['required', new PhoneRule()],
            'gender' => 'required|in:Female,Male'
        ];
    }
}
