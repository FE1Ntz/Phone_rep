<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer manufacturer_id
 * @property string name
 */
class DeviceModel extends Model
{
    use HasFactory;
}
