<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{

    public $timestamps = false; 

    use CrudTrait;
    use HasFactory;
    protected $table = "segments";
    protected $fillable = [
        "race_id",
        "name",
        "orderNunber",
        "mark_as_finish"
    ];
    protected $casts = [
        "race_id"=> "string",
        "name"=> "string",
        "orderNumber"=> "integer",
    ];
    public function race(){
        return $this->belongsTo(Race::class);
    }
    public function checkpoint(){
        return $this->hasMany(Checkpoint::class);
    }


}
