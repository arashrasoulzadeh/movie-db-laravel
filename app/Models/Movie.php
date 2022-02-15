<?php

namespace App\Models;

use App\Entities\MoviePoster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable =  [ 'title',  'year',  'rated',  'released',  'runtime',  'genre',  'director',  'writer',  'actors',  'plot',  'language',  'country',  'awards',  'poster',  'metascore',  'imdbrating',  'imdbvotes',  'imdbid',  'type',  'totalseasons' ];

    public $primaryKey = 'imdbId';

    public function getId()
    {
        return $this->getImdbid();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getRated()
    {
        return $this->rated;
    }

    public function getReleased()
    {
        return $this->released;
    }

    public function getRuntime()
    {
        return $this->runtime;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getWriter()
    {
        return $this->writer;
    }

    public function getActors()
    {
        return $this->actors;
    }

    public function getPlot()
    {
        return $this->plot;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getAwards()
    {
        return $this->awards;
    }

    public function getPoster()
    {
        return new MoviePoster( $this->poster );
    }

    public function getMetascore()
    {
        return $this->metascore;
    }

    public function getImdbrating()
    {
        return $this->imdbrating;
    }

    public function getImdbvotes()
    {
        return $this->imdbvotes;
    }

    public function getImdbid()
    {
        return $this->imdbid;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTotalseasons()
    {
        return $this->totalseasons;
    }

}
