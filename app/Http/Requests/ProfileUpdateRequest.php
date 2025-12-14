<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'username' => [
                'required',
                'string',
                'max:100',
                Rule::unique('users', 'username')->ignore($this->user()->id_user, 'id_user'),
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user()->id_user, 'id_user'),
            ],
        ];
    }
}
