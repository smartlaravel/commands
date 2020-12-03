<?php

namespace SmartLaravel\Commands;

use Illuminate\Console\Command;

class AppUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Does all the things one typically does when updating.  Composer update, NPM update, etc.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec('php -d memory_limit=-1 `which composer` update');
        exec('npm update');
        exec('npm audit fix');
        exec('git add .');
        exec('git commit -m "Composer and NPM update"');
        $this->call('optimize:clear');
        exec('composer dump-autoload');
        // $this->info('Laravel Framework Version '.app()->version()); - Doesn't show the latest version, sadly
    }
}
