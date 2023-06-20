<?php

namespace App\Models;

use App\Models\cours;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nomForm',
        'description',
    ];

    public function cours()
    {
        return $this->hasMany(cours::class, 'id_formations');
    }
}
