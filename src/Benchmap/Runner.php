<?php

namespace Benchmap;

use Benchmap\Domain\User;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Stopwatch\Stopwatch;

class Runner
{
	/**
	 * @var TaskInterface[]
	 */
	private $tasks = array();

	public function __construct()
	{
		$finder = Finder::create()->in(__DIR__ . '/Task')->files()->name('*Task.php');

		foreach ($finder as $file) {
			/** @var \Symfony\Component\Finder\SplFileInfo $file */
			$fqcn = 'Benchmap\\Task\\' . str_replace('.php', '', $file->getRelativePathname());
			/** @var TaskInterface $runner */
			$runner = new $fqcn();

			$this->tasks[$runner->getName()] = $runner;
		}
	}

	public function run($collectionSize)
	{
		$testData = $this->prepareTestData($collectionSize);

		/** @var Result[] $results */
		$results = array();
		foreach ($this->tasks as $task) {

            if (!$task->isValid()) {
                continue;;
            }
			$stopwatch = new Stopwatch();
			$stopwatch->start('mapping');
			$task->prepare();
			$stopwatch->lap('mapping');
			$task->run($testData);
			$event = $stopwatch->stop('mapping');

			$results[] = new Result($task->getName(), $event, memory_get_peak_usage(true));
		}
		return $results;
	}

	private function prepareTestData($collectionSize)
	{
		$data = array();
		for ($i = 0; $i < $collectionSize; $i++) {
			$data[] = new User($i, 'John Smith #' . $i, 25);
		}
		return $data;
	}
}
