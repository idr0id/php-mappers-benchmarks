<?php

namespace Benchmap\Task;

use Benchmap\TaskInterface;
use Papper\Papper;

class PapperTask implements TaskInterface
{
	public function getName()
	{
		return 'idr0id/papper';
	}

	public function prepare()
	{
		Papper::createMap('Benchmap\Domain\User', 'Benchmap\Domain\UserDTO');
	}

	public function run(array $sources)
	{
		return Papper::map($sources, 'Benchmap\Domain\UserDTO', 'Benchmap\Domain\User');
	}
}
