<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    

    
    public function villeEtudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    protected $fillable = [
        'nom',

    ];
}
