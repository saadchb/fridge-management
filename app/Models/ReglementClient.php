<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglementClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'montant',
        'observation',
        'mode_id',
        'client_id',
    ];

    /**
     * Obtenir le mode associé à ce règlement.
     */
    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    /**
     * Obtenir le client associé à ce règlement.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
