<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class CoreRequest extends FormRequest
{
    protected array $allowedQueryStringParams = [];

    abstract public function withValidator(Validator $validator);

    abstract public function rules(): array;

    public function authorize(): bool
    {
        /** return true for the purposes of this test */
        return true;
    }

    public function filteredQueryStringParameters(): array
    {
        return collect($this->query->all())->only($this->allowedQueryStringParams)->toArray();
    }
}
