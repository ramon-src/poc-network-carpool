<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasPrimaryKeyUuid;

class CarpoolModel extends Model
{
    use HasPrimaryKeyUuid;

    protected $table = 'carpool';
    protected $fillable = ['id', 'location', 'maxOfPassengers', 'numberOfPassengers', 'participant_id'];

    public function driver()
    {
        return $this->belongsTo('App\Models\ParticipanModel');
    }

    public function passengers()
    {
        return $this->belongsToMany('App\Models\ParticipanModel');
    }
}
