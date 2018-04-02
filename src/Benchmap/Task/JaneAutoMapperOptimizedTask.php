<?php

namespace Benchmap\Task;

use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;
use Jane\AutoMapper\Compiler\Accessor;
use Jane\AutoMapper\Compiler\Compiler;
use Jane\AutoMapper\Compiler\Transformer\TransformerFactory;
use Jane\AutoMapper\MapperConfiguration;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class JaneAutoMapperOptimizedTask implements TaskInterface
{
    private $compiler;

    private $mapper;

    public function __construct()
    {
        $this->compiler = new Compiler(new PropertyInfoExtractor(
            [new ReflectionExtractor()],
            [new ReflectionExtractor(), new PhpDocExtractor()],
            [new ReflectionExtractor()],
            [new ReflectionExtractor()]
        ), new Accessor(), new TransformerFactory());

        // We assume that we get the mapper directly and that it has been previously writed to disk (so compile time is not included here)
        $configurationUser = new MapperConfiguration($this->compiler, User::class, UserDTO::class);
        $this->mapper = $configurationUser->getMapper();
    }

    public function getName()
    {
        return 'jane-php/automapper (optimized)';
    }

    public function prepare()
    {
    }

    public function run(array $sources)
    {
        foreach ($sources as $source) {
            $this->mapper->map($source);
        }
    }

    public function isValid()
    {
       return true;
    }
}