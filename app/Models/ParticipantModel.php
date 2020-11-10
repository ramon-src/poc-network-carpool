<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasPrimaryKeyUuid;

class ParticipantModel extends Model
{
    use HasPrimaryKeyUuid;

    protected $table = 'participant';
    protected $with = ['event'];

    protected $fillable = ['id', 'name', 'location', 'event_id'];

    public function event()
    {
        return $this->belongsTo('App\Models\EventModel');
    }
}
