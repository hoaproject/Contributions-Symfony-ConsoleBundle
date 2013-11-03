<?php

namespace Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FormatterStylePass implements CompilerPassInterface
{
    const TAG_NAME = 'hoathis.console.formatter.style';

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('hoathis.console.formatter')) {
            return;
        }

        $formatter = $container->getDefinition('hoathis.console.formatter');

        foreach ($container->findTaggedServiceIds(self::TAG_NAME) as $id => $attributes) {
            $name = preg_replace('/^' . preg_quote(self::TAG_NAME) . '\./', '', $id);

            foreach($attributes as $attr) {
                $attr = array_replace(
                    array(
                        'foreground' => null,
                        'background' => null,
                        'options' => null
                    ),
                    $attr
                );

                $formatter->addMethodCall('addStyle', array($name, $attr['foreground'], $attr['background'], explode(' ', $attr['options'])));
            }
        }
    }
}
