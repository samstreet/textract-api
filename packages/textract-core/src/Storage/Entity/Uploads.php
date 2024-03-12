<?php

namespace TextractApi\Core\Storage\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string uuid
 * @property string status
 * @property string uploaded_at
 */
class Uploads extends Model
{
    public $timestamps = false;

    protected $table = 'uploads';

    protected $fillable = [
        'uuid',
        'uploaded_at',
        'status'
    ];

    public function content(): HasMany
    {
        return $this->hasMany(UploadContent::class, 'upload_id', 'id');
    }
}
