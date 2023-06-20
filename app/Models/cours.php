<?php


namespace App\Models;

use App\Models\Formation;
use App\Models\etudiants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_formations',
        'id_etudiants',

    ];

    public function formation()
    {
        return $this->belongsTo(formation::class, 'id_formations');
    }

    public function etudiant()
    {
        return $this->belongsTo(etudiants::class, 'id_etudiants');
    }

    public function cours()
    {
        return $this->hasMany(Cours::class, 'id_formations');
    }
}
