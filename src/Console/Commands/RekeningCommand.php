<?php namespace Bantenprov\Rekening\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RekeningCommand class.
 *
 * @package Bantenprov\Rekening
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekeningCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rekening';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\Rekening package';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\Rekening package');
    }
}
