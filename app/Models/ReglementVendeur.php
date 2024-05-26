<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglementVendeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'montant',
        'observation',
        'mode_id',
        'vendeur_id',
    ];

    /**
     * Obtenir le mode associé à ce règlement.
     */
    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    /**
     * Obtenir le vendeur associé à ce règlement.
     */
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}
