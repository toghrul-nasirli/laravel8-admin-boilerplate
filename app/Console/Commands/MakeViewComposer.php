<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeViewComposer extends GeneratorCommand
{
    protected $signature = 'make:view-composer {name}';
    protected $description = 'Create a new view composer class';
    protected $type = 'View composer'; 

    protected function getStub()
    {
        return base_path() . '/stubs/view-composer.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\View\Composers';
    }
}