<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@DoctrineAnnotation' => true,
    '@Symfony' => true,
    'phpdoc_summary' => false,
    'yoda_style' => false,
])
    ->setFinder($finder)
    ->setRiskyAllowed(true);
