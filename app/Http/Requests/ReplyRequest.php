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
    public function rules(): array
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'content.required'=>'请填写内容',
        ];
    }
}
