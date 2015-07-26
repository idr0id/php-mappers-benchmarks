<?php

namespace Benchmap\Task;

use Benchmap\TaskInterface;
use Trismegiste\Alkahest\Transform\Delegation\MappingDirector;
use Trismegiste\Alkahest\Transform\Delegation\Stage\Neutral;
use Trismegiste\Alkahest\Transform\Transformer;
use Benchmap\Domain\User;

/**
 * Benchmark for trismegiste/alkahest
 */
class AlkahestTask implements TaskInterface
{

    /** @var \Trismegiste\Alkahest\Transform\TransformerInterface */
    protected $mapper;

    function __construct()
    {
        $director = new MappingDirector();
        $mappingChain = $director->create(new Neutral());
        $this->mapper = new Transformer($mappingChain);
    }

    public function getName()
    {
        return 'trismegiste/alkahest';
    }

    public function prepare()
    {

    }

    public function run(array $sources)
    {
        $mapper = $this->mapper;
        return array_map(function (User $source) use ($mapper) {
            return $mapper->desegregate($source);
        }, $sources);
    }

}
