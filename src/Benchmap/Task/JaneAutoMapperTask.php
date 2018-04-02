<?php

namespace Benchmap\Task;

use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;
use Jane\AutoMapper\AutoMapper;
use Jane\AutoMapper\Compiler\Accessor\ReflectionAccessorExtractor;
use Jane\AutoMapper\Compiler\SourceTargetPropertiesMappingExtractor;
use Jane\AutoMapper\Compiler\Transformer\TransformerFactory;
use Jane\AutoMapper\MapperConfiguration;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class JaneAutoMapperTask implements TaskInterface
{
    private $mappingExtractor;

    private $autoMapper;

    public function __construct()
    {
        $this->mappingExtractor = new SourceTargetPropertiesMappingExtractor(new PropertyInfoExtractor(
            [new ReflectionExtractor()],
            [new ReflectionExtractor(), new PhpDocExtractor()],
            [new ReflectionExtractor()],
            [new ReflectionExtractor()]
        ), new ReflectionAccessorExtractor(), new TransformerFactory());
        $this->autoMapper = new AutoMapper();
    }

    public function getName()
    {
        return 'jane-php/automapper';
    }

    public function prepare()
    {
        $configurationUser = new MapperConfiguration($this->mappingExtractor, User::class, UserDTO::class);
        $this->autoMapper->register($configurationUser);
    }

    public function run(array $sources)
    {
        foreach ($sources as $source) {
            $this->autoMapper->map($source, UserDTO::class);
        }
    }

    public function isValid()
    {
       return true;
    }
}