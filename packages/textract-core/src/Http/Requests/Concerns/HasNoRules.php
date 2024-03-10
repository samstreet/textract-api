<?php

namespace TextractAPI\Core\Http\Requests\Concerns;

trait HasNoRules
{
    public function rules(): array
    {
        return [];
    }
}
