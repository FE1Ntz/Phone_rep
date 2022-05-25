<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\PseudoTypes\Numeric_;

/**
 * @property integer client_id
 * @property integer device_id
 * @property boolean is_done
 * @property numeric price
 *
 * @property Client $client
 * @property Collection $parts
 */

class Order extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(Part::class);
    }

    public function isContainPart(Part $part): bool
    {
        $parts = $this->parts;

        return $parts->contains(function (Part $orderPart) use ($part) {
            return $orderPart->id == $part->id;
        });
    }
}
