<?php namespace Bantenprov\StatusTransaksiEpurchasing\Console\Commands;

use Illuminate\Console\Command;

/**
 * The StatusTransaksiEpurchasingCommand class.
 *
 * @package Bantenprov\StatusTransaksiEpurchasing
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEpurchasingCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:status-transaksi-e-purchasing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\StatusTransaksiEpurchasing package';

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
        $this->info('Welcome to command for Bantenprov\StatusTransaksiEpurchasing package');
    }
}
