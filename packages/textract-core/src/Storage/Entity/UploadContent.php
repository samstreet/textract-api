<?php

namespace TextractApi\Core\Storage\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UploadContent extends Model
{
    protected $table = 'upload_content';

    protected $fillable = [
        'upload_id',
        'content'
    ];

    public function upload(): BelongsTo
    {
        return $this->belongsTo(Uploads::class);
    }
}