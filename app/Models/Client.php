<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'ville',
        'tell',
        'email',
        'password',
        'vendeur_id',
    ];

    /**
     * Les attributs qui doivent être cachés pour les tableaux.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être mutés en types natifs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}
