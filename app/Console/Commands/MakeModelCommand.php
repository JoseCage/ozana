<?php

namespace WatchLater\Console\Commands;

//use Illuminate\Console\Command;
use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModelCommand extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //   protected $signature = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model class with Modules namespace';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel[ 'path' ].'/Modules/'.str_replace('\\', '/', $name).'.php';
    }
    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace().'Modules';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('pivot')) {
            return __DIR__.'/stubs/pivot.model.stub';
        }

        return __DIR__.'/stubs/model.stub';
    }

}
