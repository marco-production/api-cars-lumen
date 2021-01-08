<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_id', 'fuel_id', 'vehicle_type_id', 'year', 'chassis', 'description', 'condition', 'status', 'image', 'slug'
    ];

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function make()
    {
        return $this->belongsTo(MainMake::class);
    }

    public function model()
    {
        return $this->belongsTo(MakeModel::class);
    }
}
