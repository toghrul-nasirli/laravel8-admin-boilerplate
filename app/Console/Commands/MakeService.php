<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';
    protected $type = 'Service'; 

    protected function getStub()
    {
        return base_path() . '/stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }
}