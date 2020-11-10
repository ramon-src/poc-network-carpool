<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasPrimaryKeyUuid;

class EventModel extends Model
{
    use HasPrimaryKeyUuid;

    protected $table = 'event';
    protected $fillable = ['id', 'initialDate', 'finalDate'];
}
