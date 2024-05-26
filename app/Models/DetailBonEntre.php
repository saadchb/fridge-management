<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBonEntre extends Model
{
    use HasFactory;
    protected $fillable = [
        'bon_entre_id',
        'conditionnement_id',
        'produit_id',
        'qte',
        'prix',
    ];

    /**
     * Obtenir le bon d'entrée associé à ce détail.
     */
    public function bonEntre()
    {
        return $this->belongsTo(BonEntre::class);
    }

    /**
     * Obtenir le conditionnement associé à ce détail.
     */
    public function conditionnement()
    {
        return $this->belongsTo(Conditionnement::class);
    }

    /**
     * Obtenir le produit associé à ce détail.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
