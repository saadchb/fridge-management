<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSort extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'observation',
        'vendeur_id',
    ];

    /**
     * Obtenir le vendeur associé à ce bon de sortie.
     */
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}
