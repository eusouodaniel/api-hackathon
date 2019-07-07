<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rulePassword = 'required|confirmed|min:8';

        $ruleEmail = array(
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->where(function ($query) {
                $query->whereNull('deleted_at');
            }),
        );

        if ($this->method() == 'PUT') {
            $ruleEmail = 'required|email|max:255|unique:users,id,'.$this->route('usuario');
            $rulePassword = array();
        }

        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => $ruleEmail,
            'birth_date' => 'required',
            'password' => $rulePassword,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|max:255',
            'number' => 'required|max:255',
            'neighborhood' => 'required|max:255',
            'zip_code' => 'required|max:11',
            'complement' => 'nullable|max:255',
            'latitude' => 'nullable|max:255',
            'longitude' => 'nullable|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'roles' => 'required',
        ];
    }
}