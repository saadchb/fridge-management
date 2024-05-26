<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonEntre extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'date_entre',
        'date_sort',
        'observation',
        'vendeur_id',
    ];

    /**
     * Obtenir le vendeur associé à ce bon d'entrée.
     */
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}
