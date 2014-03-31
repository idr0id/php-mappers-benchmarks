<?php

namespace Benchmap\Console\Command;

use Benchmap\Result;
use Benchmap\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BenchmapCommand extends Command
{
	/**
	 * @var Runner
	 */
	private $runner = null;

	public function __construct($name = null)
	{
		$this->runner = new Runner();
		parent::__construct($name);
	}

	protected function configure()
	{
		$this
			->setName('benchmap')
			->setDescription('Run a benchmark of php mappers')
			->addOption('size', 's', InputOption::VALUE_OPTIONAL, 'Size of source objects collection.', 100000);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('Runtime: PHP ' . phpversion());
		$output->writeln('Host: ' . php_uname());
		$output->writeln('Collection size: ' . $input->getOption('size'));
		$output->writeln('');

		$results = $this->runner->run($input->getOption('size'));

		// order by duration
		uasort($results, function (Result $a, Result $b) {
			if ($a->getDuration() == $b->getDuration()) {
				return 0;
			}
			return $a->getDuration() > $b->getDuration() ? 1 : -1;
		});

		$rows = array_map(function(Result $result) {
			return array($result->getName(), $result->getDuration(), $result->getMemory());
		}, $results);

		/* @var \Symfony\Component\Console\Helper\TableHelper $table */
		$table = $this->getHelper('table');
		$table->setHeaders(array('package', 'duration (MS)', 'MEM (B)'));
		$table->addRows($rows);
		$table->render($output);
	}
}
