<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PowerdnsDomainRequest extends Request
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
        $types = implode(',', array_keys(\App\PowerdnsDomain::$Types));

        return [
            'name' => 'required|domain',
            'type' => "required|in:{$types}",
            'master' => 'required_if:type,SLAVE|ip'
        ];
    }
}
