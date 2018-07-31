<?php
namespace peal\qrcodegenerator\Facades;

use Illuminate\Support\Facades\Facade;

class QR extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'QR'; }
}