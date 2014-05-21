<?php

namespace Hoathis\Bundle\ConsoleBundle\Formatter;

use Hoathis\SymfonyConsoleBridge\Formatter;

class OutputFormatter extends Formatter\OutputFormatter
{
    public function addStyle($name, $foreground = null, $background = null, array $options = null)
    {
        $this->setStyle($name, new Formatter\OutputFormatterStyle($foreground, $background, $options ?: array()));

        return $this;
    }
}
