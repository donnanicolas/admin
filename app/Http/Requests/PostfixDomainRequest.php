<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostfixDomainRequest extends Request
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
            'domain' => 'required|domain',
            'description' => 'required',
            'mailboxes' => 'required|integer|min:-1|max:100',
            'aliases' => 'required|integer|min:-1|max:100',
        ];

        //If the request is a post, then is a create, so we need the unique validation
        if (Request::isMethod('POST')) {
            $rules['domain'] .= '|unique:postfix.domain,domain';
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
