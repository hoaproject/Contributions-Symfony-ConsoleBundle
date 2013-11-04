<?php

namespace Hoathis\Bundle\ConsoleBundle;

use Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HoathisConsoleBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container
            ->addCompilerPass(new Compiler\FormatterStylePass())
            ->addCompilerPass(new Compiler\HelperPass())
        ;
    }
}
