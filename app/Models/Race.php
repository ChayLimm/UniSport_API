<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Race extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'inProgress';
    const STATUS_COMPLETED = 'completed';


    use CrudTrait;
    use HasFactory;

    //disable create and update at
    public $timestamps = false;

    protected $table =  "races";

    protected $fillable = [
        "name",
        "description",
        "start_time",
        "end_time",
        "status",
    ];
    protected $casts = [
        "name"=> "string",
        "desciption"=> "string",
        "start_time"=> "timestamp",
        "end_time"=> "timestamp",
    ];
    public function segments(){
        return $this->hasMany(Segment::class);
    }
    public function participants(){
        return $this->hasMany(Participant::class);
    }
}
