<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Complaints;

class IndirectCommission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commission:covertbv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indirect Commission Distribution';
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
        $users = Complaints::create(['user_name' => 'TEST', 'complaint_name' => 'Test C']);
       
        $this->info('Successfully Created.');
    }
}
