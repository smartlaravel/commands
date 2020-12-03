<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ClearUnverifiedUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:clear-unverified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes unverified users from the database after 24 hours.';

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
        User::whereNull('email_verified_at')
            ->whereDate('created_at', '<', now()->startOfDay()->subDay())
            ->delete();
    }
}
