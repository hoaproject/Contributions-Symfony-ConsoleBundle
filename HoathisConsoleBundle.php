<?php

namespace Hoathis\Bundle\ConsoleBundle;

use Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler\FormatterStylePass;
use Hoathis\Bundle\ConsoleBundle\DependencyInjection\Compiler\HelperPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HoathisConsoleBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container
            ->addCompilerPass(new FormatterStylePass())
            ->addCompilerPass(new HelperPass())
        ;
    }
}
