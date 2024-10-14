<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scategorie extends Model
{
    use HasFactory;

    protected $fillable=[
        'nomscategorie',
        'imagescategorie',
        'categorieID'
    ];

    /**
     * Get the category that owns the Scategorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function categories(){
        return $this->belongsTo(Categorie::class,"categorieID");
    }
    public function articles(){
        return $this->hasMany(Article::class,"scategorieID");
    }
}
