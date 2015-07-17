<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PowerdnsRecordRequest extends Request
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
        $types = implode(',', array_keys(\App\PowerdnsRecord::$Types));
        return [
            'name' => 'required',
            'content' => 'required',
            'type' => "required|in:{$types}",
            'content' => 'required',
            'ttl' => 'required|integer',
            'prio' => 'required|integer',
        ];
    }
}
