<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBonSort extends Model
{
    use HasFactory;
    protected $fillable = [
        'bon_sort_id',
        'conditionnement_id',
        'produit_id',
        'qte',
    ];

    /**
     * Obtenir le bon de sortie associé à ce détail.
     */
    public function bonSort()
    {
        return $this->belongsTo(BonSort::class);
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
