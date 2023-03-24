<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_phone', 'phone');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function niveau(): BelongsTo
    {
        return $this->belongsTo(Niveau::class, 'niveau_code', 'code');
    }

    public function facture(): BelongsTo
    {
        return $this->belongsTo(Facture::class);
    }
}
