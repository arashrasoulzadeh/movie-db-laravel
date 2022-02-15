<?php

namespace App\Entities;

class MovieSingle
{
	private $title, $year, $rated, $released, $runtime, $genre, $director, $writer, $actors, $plot, $language, $country, $awards, $poster, $metascore, $imdbrating, $imdbvotes, $imdbid, $type, $totalseasons;

	public static function createFromOfflineSingleResult( $result )
	{
		$single = new MovieSingle();

		$single->title	        =	$result->title ?? null;
		$single->year	        =	$result->year ?? null;
		$single->rated	        =	$result->rated ?? null;
		$single->released	    =	$result->released ?? null;
		$single->runtime	    =	$result->runtime ?? null;
		$single->genre	        =	$result->genre ?? null;
		$single->director	    =	$result->director ?? null;
		$single->writer	        =	$result->writer ?? null;
		$single->actors	        =	$result->actors ?? null;
		$single->plot	        =	$result->plot ?? null;
		$single->language	    =	$result->language ?? null;
		$single->country	    =	$result->country ?? null;
		$single->awards	        =	$result->awards ?? null;
		$single->poster	        =	new MoviePoster($result->poster) ?? null;
		$single->metascore	    =	$result->metascore ?? null;
		$single->imdbrating	    =	$result->imdbrating ?? null;
		$single->imdbvotes	    =	$result->imdbvotes ?? null;
		$single->imdbid	        =	$result->imdbid ?? null;
		$single->type	        =	$result->type ?? null;
		$single->totalseasons	=	$result->totalseasons ?? null;
		return $single;
	}

	public static function createFromOpenMovieSingleResult( $result )
	{
		$single = new MovieSingle();

		$single->title	        =	$result->Title ?? null;
		$single->year	        =	$result->Year ?? null;
		$single->rated	        =	$result->Rated ?? null;
		$single->released	    =	$result->Released ?? null;
		$single->runtime	    =	$result->Runtime ?? null;
		$single->genre	        =	$result->Genre ?? null;
		$single->director	    =	$result->Director ?? null;
		$single->writer	        =	$result->Writer ?? null;
		$single->actors	        =	$result->Actors ?? null;
		$single->plot	        =	$result->Plot ?? null;
		$single->language	    =	$result->Language ?? null;
		$single->country	    =	$result->Country ?? null;
		$single->awards	        =	$result->Awards ?? null;
		$single->poster	        =	new MoviePoster($result->Poster) ?? null;
		$single->metascore	    =	$result->Metascore ?? null;
		$single->imdbrating	    =	$result->imdbRating ?? null;
		$single->imdbvotes	    =	$result->imdbVotes ?? null;
		$single->imdbid	        =	$result->imdbID ?? null;
		$single->type	        =	$result->Type ?? null;
		$single->totalseasons	=	$result->totalSeasons ?? null;
		return $single;
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
		return $this->poster;
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
