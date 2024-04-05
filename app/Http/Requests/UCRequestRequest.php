<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UCRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "require|string|min:2|max:191",
            "email" => "require|string|min:2|max:191",
            "subject" => "require|string|min:2|max:191",
            "phone" => "require|string|min:10|max:21",
            "message" => "require|string|min:10|max:21",
        ];
    }
}
