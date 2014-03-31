<?php

namespace Benchmap;

use Symfony\Component\Stopwatch\StopwatchEvent;

class Result
{
	private $name;
	private $event;

	public function __construct($name, StopwatchEvent $event)
	{
		$this->name = $name;
		$this->event = $event;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDuration()
	{
		return $this->event->getDuration();
	}

	public function getMemory()
	{
		return $this->event->getMemory();
	}
}
