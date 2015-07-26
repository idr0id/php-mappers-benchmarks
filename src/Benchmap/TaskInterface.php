<?php

namespace Benchmap;

interface TaskInterface
{
	public function getName();
	public function prepare();
	public function run(array $sources);
    public function isValid();
}
