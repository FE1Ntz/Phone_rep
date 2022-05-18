<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property int phone_number
 */
class Client extends Model
{
    use HasFactory;
}
