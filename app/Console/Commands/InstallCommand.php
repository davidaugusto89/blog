<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instalador do projeto';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Preparando instalação...' . PHP_EOL);

        $list_commands =
        [
            //'composer install',
            //'cp .env.example .env',
            //'php artisan key:generate',
            //'php artisan migrate',
            'php artisan db:seed --class=CreateAdminUserSeeder',
        ];

        foreach ($list_commands as $key => $command) {
            $output = exec($command, $output);
            $this->info($output . PHP_EOL);
        }
    }
}
