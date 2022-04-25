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
        'phone',
        'email',
        'date_naissance',
        'ville_id'
    ];
}
