<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = "participants";
    protected $fillable = [ 
        'name',
        'race_id',
        'bib_number',
        'username',
        'age',
        'gender',
    ];
    protected $casts = [
        'name'=> 'string',
        'race_id'=> 'string',
        'bib_number'=> 'string',
        'username'=> 'string',
        'age'=> 'integer',
        'gender'=> 'string',
    ];
    public function race(){
        return $this->belongsTo(Race::class);
    }
    public function checkpoint(){
        return $this->hasMany(Checkpoint::class);
    }
}
