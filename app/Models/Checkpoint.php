<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'checkpoints'; 
    protected $fillable = [
        "segment_id",
        "participant_id",
        "checkpoint_time",
    ];
    protected $casts = [
        "segment_id"=> "string",
        "participant_id"=> "string",
        "checkpoint_time"=>"timestamp",
    ];
    public function participant(){
        return $this->belongsTo(Participant::class);
    }
    public function segment(){
        return $this->belongsTo(Segment::class);
    }
    public function identifiableAttribute()
    {
        return 'id'; // If 'id' is the primary key
    }

}
