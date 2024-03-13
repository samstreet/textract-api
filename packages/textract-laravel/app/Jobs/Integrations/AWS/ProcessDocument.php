<?php

namespace App\Jobs\Integrations\AWS;

use App\Bridge\DTO\Integrations\AWS\TextractProcessDocumentDTO;
use Aws\S3\S3Client;
use Aws\Textract\TextractClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use TextractApi\Core\Services\Integrations\AWS\TextractIntegrationService;

final class ProcessDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly TextractProcessDocumentDTO $processDocumentDTO)
    {
    }

    public function handle(): void
    {
        /** @var TextractClient $client */
        $client = App::make('aws')->createClient('Textract', ['region' => 'eu-west-1']);
        $response = $client->startDocumentAnalysis([
            'DocumentLocation' => [
                "S3Object" => [
                    "Bucket" => "effect-test-uploads",
                    "Name" => "{$this->processDocumentDTO->getUpload()->uuid}.pdf",
                ]
            ],
            'FeatureTypes' => ['FORMS', 'TABLES'],
        ]);

        sleep(15);

        $status = $client->getDocumentAnalysis([
            'JobId' => $response->get('JobId')
        ]);

        $this->processDocumentDTO->getUpload()->status = TextractIntegrationService::UPLOAD_IN_PROGRESS;
        if ($status->get('JobStatus') === 'SUCCEEDED') {
            $words =collect($status->get('Blocks'))->filter(fn ($data) => $data['BlockType'] === 'WORD');
            $words->each(fn(array $data) => $this->processDocumentDTO->getUpload()->content()->create(['content' => $data['Text']])->save());
            $this->processDocumentDTO->getUpload()->status = TextractIntegrationService::UPLOAD_SUCCESS;
        }

        $this->processDocumentDTO->getUpload()->save();
    }
}
