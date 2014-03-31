<?php

namespace Benchmap\Task;

use Adminomatic\AutoMapper\Mapper;
use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;

class PHPAutomapperTask implements TaskInterface
{
	private $mapper;

	public function __construct()
	{
		$this->mapper = new Mapper();
	}

	public function getName()
	{
		return 'nylle/php-automapper';
	}

	public function prepare()
	{
	}

	public function run(array $sources)
	{
		$mapper = $this->mapper;
		return array_map(function (User $source) use ($mapper) {
			$mapper->Map($destination = new UserDTO(), $source);
			return $destination;
		}, $sources);
	}
}
