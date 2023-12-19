<?php

namespace App\Http\Requests;

/**
 * TopicRequest
 */
class TopicRequest extends Request
{

    /**
     * @return array|string[]
     */
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'       => 'required|min:2',
                    'body'        => 'required|min:3',
                    'category_id' => 'required|numeric',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.min' => '标题必须至少两个字符',
            'body.min'  => '文章内容必须至少三个字符',
        ];
    }
}
