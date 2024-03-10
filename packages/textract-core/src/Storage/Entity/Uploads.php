<?php

namespace TextractApi\Core\Storage\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string uuid
 * @property string status
 * @property DateTime uploaded_at
 */
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
