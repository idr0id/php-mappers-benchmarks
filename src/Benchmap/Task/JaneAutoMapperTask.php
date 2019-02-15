<?php

namespace Benchmap\Task;

use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;
use Jane\AutoMapper\AutoMapper;
use Jane\AutoMapper\Compiler\Compiler;
use Jane\AutoMapper\Compiler\FileLoader;
use Jane\AutoMapper\Context;

class JaneAutoMapperTask implements TaskInterface
{
    private $mapper;

    private $autoMapper;

    public function __construct()
    {
        $directory = __DIR__ . '/../../../cache/jane-automapper';
        @unlink($directory);
        @mkdir($directory, 0777, true);

        $loader = new FileLoader(
            new Compiler(),
            $directory,
        );

        $autoMapper = AutoMapper::create(true, $loader);
        $this->mapper = $autoMapper->getMapper(User::class, UserDTO::class);
    }

    public function getName()
    {
        return 'jane-php/automapper';
    }

    public function prepare()
    {
    }

    public function run(array $sources)
    {
        foreach ($sources as $source) {
            $this->mapper->map($source, new Context());
        }
    }

    public function isValid()
    {
       return true;
    }
}
