<?php

namespace Benchmap\Task;

use Benchmap\Domain\User;
use Benchmap\Domain\UserDTO;
use Benchmap\TaskInterface;
use Jane\AutoMapper\AutoMapper;
use Jane\AutoMapper\Compiler\Accessor\ReflectionAccessorExtractor;
use Jane\AutoMapper\Compiler\SourceTargetPropertiesMappingExtractor;
use Jane\AutoMapper\Compiler\Transformer\ArrayTransformerFactory;
use Jane\AutoMapper\Compiler\Transformer\BuiltinTransformerFactory;
use Jane\AutoMapper\Compiler\Transformer\ChainTransformerFactory;
use Jane\AutoMapper\Compiler\Transformer\MultipleTransformerFactory;
use Jane\AutoMapper\Compiler\Transformer\ObjectTransformerFactory;
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
        $transformerFactory = new ChainTransformerFactory();
        $transformerFactory->addTransformerFactory(new MultipleTransformerFactory($transformerFactory), 0);
        $transformerFactory->addTransformerFactory(new BuiltinTransformerFactory(), 1);
        $transformerFactory->addTransformerFactory(new ArrayTransformerFactory($transformerFactory), 2);
        $transformerFactory->addTransformerFactory(new ObjectTransformerFactory(), 3);

        $this->mappingExtractor = new SourceTargetPropertiesMappingExtractor(
            new PropertyInfoExtractor(
                [new ReflectionExtractor()],
                [new ReflectionExtractor(), new PhpDocExtractor()],
                [new ReflectionExtractor()],
                [new ReflectionExtractor()]
            ),
            new ReflectionAccessorExtractor(),
            $transformerFactory
        );
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
