<?php

namespace Hoathis\Bundle\ConsoleBundle\Tests\Units\DependencyInjection\Compiler;

use atoum;
use mock\Symfony\Component\DependencyInjection\ContainerBuilder;
use mock\Symfony\Component\DependencyInjection\Definition;
use Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler\FormatterStylePass as TestedClass;

class FormatterStylePass extends atoum
{
    public function testClass()
    {
        $this
            ->testedClass
                ->isSubclassOf('Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface')
                ->string(TestedClass::TAG_NAME)->isEqualTo('hoathis.console.formatter.style')
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
            ->given($this->calling($container)->hasDefinition = true)
            ->and($this->calling($container)->getDefinition = $definition = new Definition())
            ->and($this->calling($container)->findTaggedServiceIds = array(
                'hoathis.console.formatter.style.' . ($name = uniqid()) => array(array()),
                'hoathis.console.formatter.style.' . ($otherName = uniqid()) => array(
                    array(
                        'foreground' => 'white'
                    )
                ),
                'hoathis.console.formatter.style.' . ($thirdName = uniqid()) => array(
                    array(
                        'foreground' => 'white',
                        'background' => 'red',
                    )
                ),
                'hoathis.console.formatter.style.' . ($fourthName = uniqid()) => array(
                    array(
                        'foreground' => 'white',
                        'background' => 'red',
                        'options' => 'bold blink'
                    )
                )
            ))
            ->then
                ->variable($pass->process($container))->isNull()
                ->mock($definition)
                    ->call('addMethodCall')
                        ->withArguments('addStyle', array($name, null, null, null))->once()
                        ->withArguments('addStyle', array($otherName, 'white', null, null))->once()
                        ->withArguments('addStyle', array($thirdName, 'white', 'red', null))->once()
                        ->withArguments('addStyle', array($fourthName, 'white', 'red', array('bold', 'blink')))->once()
        ;
    }
}
