<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = "segments";
    protected $fillable = [
        "race_id",
        "name",
        "orderNunber",
    ];
    protected $casts = [
        "race_id"=> "string",
        "name"=> "string",
        "orderNumber"=> "integer",
    ];
    public function race(){
        return $this->belongsTo(Race::class);
    }

}
