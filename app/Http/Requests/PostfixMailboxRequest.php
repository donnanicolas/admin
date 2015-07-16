<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostfixMailboxRequest extends Request
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
        $rules = [
            'name' => 'required',
            'domain' => 'required|domain',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ];

        //If the request is a post, then is a create, so we need the unique validation
        if (Request::isMethod('POST')) {
            $rules['username'] = 'required|email|unique:postfix.mailbox,username';
        }

        return $rules;
    }

    /**
     * Validation Messages
     *
     * @return array
     */
    public function messages() {
        return [
            'domain.domain' => 'Invalid domain'
        ];
    }
}
