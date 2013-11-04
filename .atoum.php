<?php

use \mageekguy\atoum;

$runner = $script->getRunner();
if (false === $runner->hasReports()) {
    $report = $script->addDefaultReport();

    $report->addField(new atoum\report\fields\runner\atoum\logo());
} else {
    $reports = $runner->getReports();
    $report = current($reports);
}

$testGenerator = new atoum\test\generator();
$runner
    ->setTestGenerator(
        $testGenerator
            ->setTestClassesDirectory($testsDirectory = __DIR__ . '/Tests/Units')
            ->setTestClassNamespace('Hoathis\Bundle\ConsoleBundle\Tests\Units')
            ->setTestedClassesDirectory(__DIR__)
            ->setTestedClassNamespace('Hoathis\Bundle\ConsoleBundle')
    )
    ->addTestsFromDirectory($testsDirectory)
;

$script->noCodeCoverageForNamespaces('Symfony');