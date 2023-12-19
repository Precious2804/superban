<?php

namespace EdenLife\Superban\Console\Commands;

use Illuminate\Console\Command;

class InstallSuperban extends Command
{
    protected $signature = 'superban:install';

    protected $description = 'Install the Superban package';

    public function handle()
    {
        $this->info('Installing Superban package...');

        // Add any installation logic here

        $this->info('Superban package installed successfully.');
    }
}
