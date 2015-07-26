<?php

namespace Benchmap\Task;

use BCC\AutoMapperBundle\Mapper\Mapper;
use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;

class BCCAutoMapperBundleTask implements TaskInterface
{
	private $mapper;

	function __construct()
	{
		$this->mapper = new Mapper();
	}

	public function getName()
	{
		return 'bcc/auto-mapper-bundle';
	}

	public function prepare()
	{
		$this->mapper->createMap('Benchmap\Domain\User', 'Benchmap\Domain\UserDTO');
	}

	public function run(array $sources)
	{
		$mapper = $this->mapper;
		return array_map(function (User $source) use ($mapper) {
			$mapper->Map($source, $destination = new UserDTO());
			return $destination;
		}, $sources);
	}

    public function isValid()
    {
        return true;
    }
}
