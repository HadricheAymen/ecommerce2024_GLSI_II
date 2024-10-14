<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=[
        'designation',
        'imageart',
        'marque',
        'reference',
        'prix',
        'qtestock',
        'scategorieID'
    ];

    public function scategories(){
        return $this->belongsTo(Scategorie::class,"scategorieID");
    }
}
