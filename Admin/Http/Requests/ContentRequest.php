<?php

namespace App\Http\Requests;

/**
 *  内容验证
 * Class ContentRequest
 * @package App\Http\Requests
 */
class ContentRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'content.required'=>'请填写内容',
        ];
    }
}
