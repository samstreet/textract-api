<?php

namespace TextractAPI\Core\Http\Requests\Concerns;

use Illuminate\Contracts\Validation\Validator;

trait HasNoValidator
{
    public function withValidator(Validator $validator): void
    {}
}
