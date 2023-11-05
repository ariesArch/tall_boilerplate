<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create blade file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $view = $this->argument('view');
        return $this->createDir($view);

    }
    // private function viewPath($view) 
    // {
    //     $view = str_replace('.','/',$view).'.blade.php';
    //     $path = "resources/views/{$view}";
    //     return $path;
    // }
    private function createDir($file_name) 
    {
        $view = str_replace('.','/',$file_name) . '.blade.php';
        $path = "resources/views/${view}";
        $this->info("File: {$path}");
        if(File::exists($path)) {
            $this->error("Error: {$path} already exists!");
            return;
        }
        $dir = dirname($path);
        $this->info("Dir: {$dir}");
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $wire_prefix = Str::of($file_name)->before('s/');
        $wire_dir = Str::replaceFirst('s/','-',$file_name);
        $prepared = "<x-app-layout>
    @livewire('$wire_prefix.$wire_dir')
</x-app-layout>";
        File::put($path, $prepared);
        $this->info("Result: {$path} created.");
    }
}
