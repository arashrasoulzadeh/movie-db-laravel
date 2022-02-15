<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable =  [ 'title',  'year',  'rated',  'released',  'runtime',  'genre',  'director',  'writer',  'actors',  'plot',  'language',  'country',  'awards',  'poster',  'metascore',  'imdbrating',  'imdbvotes',  'imdbid',  'type',  'totalseasons' ];

    public $primaryKey = 'imdbId';
}
