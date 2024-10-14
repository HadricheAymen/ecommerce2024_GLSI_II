<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable =[
        'nomcategorie',
        'imagecategorie'

    ];

    /**
     * Get the scategories for the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function scategories(){
        return $this->hasMany(Scategorie::class,'categorieID');
    }
}
