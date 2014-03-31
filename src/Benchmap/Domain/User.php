<?php

namespace Benchmap\Domain;

class User
{
	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var string
	 */
	public $age;

	public function __construct($id, $name, $age)
	{
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
} 
