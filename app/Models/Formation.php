<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Formation extends Model
{
    use HasFactory;

    public function etudiants(): BelongsToMany
    {
        return $this->belongsToMany(Etudiant::class, 'etudiant_formation_niveau', 'formation_id', 'etudiant_phone');
    }

    public function niveaux(): BelongsToMany
    {
        return $this->belongsToMany(Niveau::class, 'etudiant_formation_niveau', 'formation_id','niveau_code');
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class, 'departement_name', 'name');
    }
}
