<?php

namespace App\Http\Requests;

use TextractAPI\Core\Http\Requests\Concerns;

class TextractUploadRequest extends CoreRequest
{
    use Concerns\HasNoValidator;

    public function rules(): array
    {
        return [
            'pdf' => ['required', 'file']
        ];
    }

    public function getFileAsBase64EncodedString(): string
    {
        return chunk_split(base64_encode(file_get_contents($this->file('pdf'))));
    }

    public function getFile()
    {
        return $this->file('pdf');
    }
}
