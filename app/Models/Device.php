<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int manufacturer_id
 * @property int model_id
 */

class Device extends Model
{
    use HasFactory;

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(DeviceManufacturer::class, 'manufacturer_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }
}
