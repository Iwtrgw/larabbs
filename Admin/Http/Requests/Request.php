<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request
 */
class Request extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
    	// Using policy for Authorization
        return true;
    }
}
