<?php

namespace App\Http\Requests;

/**
 * ReplyRequest
 */
class ReplyRequest extends Request
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
