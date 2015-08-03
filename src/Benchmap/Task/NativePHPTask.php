<?php

namespace Benchmap\Task;

use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;

class NativePHPTask implements TaskInterface
{
	public function getName()
	{
		return 'native php';
	}

	public function prepare()
	{
	}

	public function run(array $sources)
	{
		return array_map(function (User $source) {
			$destination = new UserDTO();
			$destination->id = $source->getId();
			$destination->name = $source->name;
			$destination->age = $source->age;
			return $destination;
		}, $sources);
	}

    public function isValid()
    {
        return true;
    }

}
