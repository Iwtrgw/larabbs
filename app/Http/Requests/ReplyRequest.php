<?php

namespace App\Http\Requests;

/**
 * ReplyRequest
 */
class ReplyRequest extends Request
{
    /**
     * 验证规则
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    /**
     * 提示内容
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'content.required'=>'请填写内容',
        ];
    }
}
