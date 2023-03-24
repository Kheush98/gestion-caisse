<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Niveau extends Model
{
    use HasFactory;

        /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class, 'niveau_code', 'code');
    }

    public function etudiants(): BelongsToMany
    {
        return $this->belongsToMany(Etudiant::class, 'etudiant_formation_niveau','niveau_code', 'etudiant_phone');
    }

    public function formations(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class, 'etudiant_formation_niveau','niveau_code', 'formation_id');
    }

}
