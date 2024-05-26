<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLivrason extends Model
{

    use HasFactory;
    protected $table = 'bon_livraisons';
    protected $fillable = [
        'date',
        'observation',
        'vendeur_id',
        'client_id',
    ];

    /**
     * Obtenir le vendeur associé à ce bon de livraison.
     */
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }

    /**
     * Obtenir le client associé à ce bon de livraison.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function details()
    {
        return $this->hasMany(DetailBonLivrason::class);
    }
}
