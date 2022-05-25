<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    
    public function etudiantVille()
    {     
        return $this->belongsTo(Ville::class);
    }
    
  
    protected $fillable = [
        'nom',
        'adresse',
        'villes_id',
        'phone',
        'email',
        'date_naissance',
        
    ];
}
