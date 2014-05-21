<?php

namespace Hoathis\Bundle\ConsoleBundle\Tests\Units\DependencyInjection\Compiler;

use atoum;
use mock\Symfony\Component\DependencyInjection\ContainerBuilder;
use mock\Symfony\Component\DependencyInjection\Definition;
use Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler\HelperPass as TestedClass;

class HelperPass extends atoum
{
    public function testClass()
    {
        $this
            ->testedClass
                ->isSubclassOf('Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface')
                ->string(TestedClass::TAG_NAME)->isEqualTo('hoathis.console.helperSet.helper')
        ;
    }

    public function testProcess()
    {
        $this
            ->given($container = new ContainerBuilder())
            ->and($this->calling($container)->hasDefinition = false)
            ->if($pass = new TestedClass())
            ->then
                ->variable($pass->process($container))->isNull()
            ->given($container = new ContainerBuilder())
            ->and($this->calling($container)->hasDefinition = true)
            ->and($this->calling($container)->getDefinition[1] = $helperSetDefinition = new Definition())
            ->and($this->calling($container)->getDefinition[2] = $helperDefinition = new Definition())
            ->and($this->calling($container)->getDefinition[3] = $otherHelperDefinition = new Definition())
            ->and($this->calling($container)->findTaggedServiceIds = array(
                ($herlperId = 'hoathis.console.helperSet.helper.' . uniqid()) => array(array()),
                ($otherHelperId = 'hoathis.console.helperSet.helper.' . uniqid()) => array(array())
            ))
            ->then
                ->variable($pass->process($container))->isNull()
                ->mock($container)
                    ->call('getDefinition')
                        ->withArguments($herlperId)->once()
                        ->withArguments($otherHelperId)->once()
                ->mock($helperSetDefinition)
                    ->call('addMethodCall')
                        ->withIdenticalArguments('set', array($helperDefinition))->once()
                        ->withIdenticalArguments('set', array($otherHelperDefinition))->once()

        ;
    }
}
