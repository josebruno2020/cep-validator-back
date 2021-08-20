<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    use HasFactory;
    protected $table = 'ceps';
    protected $fillable = ['city_id', 'cep'];


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
