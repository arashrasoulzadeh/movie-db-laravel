<?php

namespace App\Entities;

class MovieSearchResultRow 
{
	private $id, $type, $year, $title, $poster;

	public function __construct( $id, $type, $year, $title, $poster )
	{
		$this->id     = $id;
		$this->type   = $type;
		$this->year   = $year;
		$this->title  = $title;
		$this->poster = new MoviePoster( $poster );
	}

	public static function createFromOpenMovieSearchResult( $searchResult )
	{
		$results = array();

		foreach( $searchResult as $result )
		{
			$results[] = new MovieSearchResultRow( $result->imdbID, $result->Type, $result->Year, $result->Title, $result->Poster );
		}
		return $results;
	}

	public function getId()
	{
		return $this->id;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getPoster()
	{
		return $this->poster;
	}
	

}