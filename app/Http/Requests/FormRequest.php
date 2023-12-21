<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as OrgFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Traits\ApiTrait;

class FormRequest extends OrgFormRequest
{
    use ApiTrait;
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->apiResponse(
            '401' , 'Validation Errors' , $validator->errors() , 'null')) ;
    }
}