<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use TextractAPI\Core\Http\Requests\Concerns;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;
use TextractApi\Core\Storage\Entity\Uploads;

class DeleteTextractUploadStatusRequest extends CoreRequest
{
    use Concerns\HasNoRules;

    private Uploads $upload;

    public function __construct(private readonly TextractIntegrationServiceInterface $textractIntegrationService)
    {
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function () {
            $upload = $this->textractIntegrationService->findByUUID($this->route('uuid'));
            if (! $upload) {
                throw new Exception(
                    'No Upload Found',
                    Response::HTTP_NOT_FOUND
                );
            }

            $this->upload = $upload;
        });
    }

    public function getUpload(): Uploads
    {
        return $this->upload;
    }
}
