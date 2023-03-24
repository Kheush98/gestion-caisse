<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etudiant extends Model
{
    use HasFactory;

        /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'phone';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class, 'etudiant_phone', 'phone');
    }

    public function formations(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class, 'etudiant_formation_niveau','etudiant_phone', 'formation_id');
    }

    public function niveaux(): BelongsToMany
    {
        return $this->belongsToMany(Niveau::class, 'etudiant_formation_niveau','etudiant_phone','niveau_code');
    }
}
