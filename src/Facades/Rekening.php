<?php namespace Bantenprov\Rekening\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Rekening facade.
 *
 * @package Bantenprov\Rekening
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Rekening extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rekening';
    }
}
