<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MakeModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'main_make_id'
    ];

    public function make()
    {
        return $this->belongsTo(MainMake::class,'main_make_id');
    }

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
