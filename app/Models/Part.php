<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int id
 * @property string name
 * @property int manufacturer_id
 * @property int model_id
 * @property string count
 */

class Part extends Model
{
    use HasFactory;

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(PartManufacturer::class, 'manufacturer_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(PartModel::class, 'model_id');
    }
}
