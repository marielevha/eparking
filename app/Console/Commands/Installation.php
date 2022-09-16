<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Installation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install
    {init=init}
    {--data}
    {--roles}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installation BAC-Congo backend app';

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
        if ($this->argument('init') == 'init') {
            if ($this->confirm('Do you want to continue with the installation?')) {
                $this->warn("The installation has started, please do not close this window.");

                $this->call('migrate:fresh');
                if ($this->option('data')) {
                    $this->call('db:seed');

                    if ($this->option('roles'))
                        $this->call('app:roles');
                }


            }
        }
        return 0;
    }
}
