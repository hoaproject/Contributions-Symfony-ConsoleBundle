<?php

namespace Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HelperPass implements CompilerPassInterface
{
    const TAG_NAME = 'hoathis.console.helperSet.helper';

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('hoathis.console.helperSet')) {
            return;
        }

        $herlperSet = $container->getDefinition('hoathis.console.helperSet');

        foreach ($container->findTaggedServiceIds(self::TAG_NAME) as $id => $attributes) {
            foreach($attributes as $attr) {
                $herlperSet->addMethodCall('set', array($container->getDefinition($id)));
            }
        }
    }
}
