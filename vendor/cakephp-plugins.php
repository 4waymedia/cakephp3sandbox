<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Csvview' => $baseDir . '/plugins/Csvview/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Importer' => $baseDir . '/plugins/Importer/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];