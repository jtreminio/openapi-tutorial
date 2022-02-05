#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use OpenApi\Generator;
use Symfony\Component\Yaml\Yaml;

$openapi = Generator::scan([__DIR__.'/../src']);
$yaml = $openapi->toYaml(
    Yaml::DUMP_OBJECT_AS_MAP
    ^ Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE
    ^ Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK
);

$oas_file = __DIR__.'/../openapi.yaml';
file_put_contents($oas_file, $yaml);
echo "Wrote OAS file to {$oas_file}\n";

echo "\nRunning php-cs-fixer\n";
shell_exec(__DIR__.'/../vendor/bin/php-cs-fixer fix');
