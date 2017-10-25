<?php

namespace Benchmap\Task;

use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;

class AutoMapperPlusTask implements TaskInterface
{
	/**
	 * @var \AutoMapperPlus\AutoMapperInterface
	 */
	private $mapper;

	function __construct()
	{
		$this->mapper = AutoMapper::initialize(function (AutoMapperConfig $config) {
			$config->registerMapping(User::class, UserDTO::class);
		});
	}

	public function prepare()
	{
		//
	}

	public function getName()
	{
		return 'mark-gerarts/auto-mapper-plus';
	}

	public function run(array $sources)
	{
		return $this->mapper->mapMultiple($sources, UserDTO::class);
	}

	public function isValid()
	{
		return true;
	}
}
