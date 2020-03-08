<?php

namespace Ozana\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFactoryCommand extends GeneratorCommand
{

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom factory provider class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:factory {name}';

    /**
    * The type of class being generated.
    *
    * @var string
    */
    protected $type = 'Factory';

    /**
    * Get the stub file for the generator.
    *
    * @return string
    */
    protected function getStub()
    {
        return  __DIR__.'/stubs/factory.stub';
    }

    /**
    * Get the default namespace for the class.
    *
    * @param  string  $rootNamespace
    * @return string
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace. '\Modules'; // $this->getNameInput().'s' . '\Database\Factories';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    // protected function getPath($class)
    // {

    //    // return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    //     return $this->getDefaultNamespace($class .'s/' . 'Database/Factories') . $class .'Factory.php';
    // }
    /**
    protected function getPath($name)
    {
        return 'app/' .str_replace($name .'/' . 's', '/', $name).'Factory.php';
    }*/

    /**
    * Get the console command options.
    *
    * @return array
    */
    protected function getOptions()
    {
        return [];
    }
}
