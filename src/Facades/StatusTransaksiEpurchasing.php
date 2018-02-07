<?php namespace Bantenprov\StatusTransaksiEpurchasing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The StatusTransaksiEpurchasing facade.
 *
 * @package Bantenprov\StatusTransaksiEpurchasing
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEpurchasing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'status-transaksi-e-purchasing';
    }
}
