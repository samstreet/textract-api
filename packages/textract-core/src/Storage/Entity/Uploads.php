<?php

namespace TextractApi\Core\Storage\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uploads extends Model
{
    protected $table = 'uploads';

    protected $fillable = [
        'uuid',
        'uploaded_at',
        'status'
    ];

    public function content(): HasMany
    {
        return $this->hasMany(UploadContent::class);
    }
}