<?php

namespace Hoathis\Bundle\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PatchCommand extends ContainerAwareCommand
{
    public function __construct($name = null)
    {
        parent::__construct($name ?: 'hoathis:console:patch');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $kernel = $kernel = $this->getContainer()->get('kernel');

        $rootDir = $kernel->getRootDir();

        if (false === is_writable($rootDir)) {
            throw new \RuntimeException(sprintf('%s is not writable', $rootDir));
        }

        $consoleFile = $rootDir . DIRECTORY_SEPARATOR . 'console';

        if (false === is_writable($consoleFile)) {
            throw new \RuntimeException(sprintf('%s is not writable', $consoleFile));
        }

        $patchFile = $kernel->locateResource('@HoathisConsoleBundle/Resources/patch/console');


        $output->writeln(sprintf('Backuping original console: <comment>%s</comment>', $consoleFile));
        copy($consoleFile, $consoleFile . '.orig');
        $output->writeln(sprintf('Backup path: <comment>%s.orig</comment>', $consoleFile));

        $output->writeln('Patching console');
        file_put_contents($consoleFile, file_get_contents($patchFile));
        chmod($consoleFile, 0755);
        $output->writeln('<info>Succesfully patched console!</info>');
    }
} 