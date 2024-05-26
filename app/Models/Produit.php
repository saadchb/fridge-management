<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'famille_id',
        'image',
    ];

  
    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }
}
