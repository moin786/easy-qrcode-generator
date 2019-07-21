<?php
namespace peal\qrcodegenerator\Server;
use Illuminate\Container\Container;
use peal\qrcodegenerator\QRCode;

class QrServer 
{

    /**
     * Qrcode object
     * 
     * @var peal\qrcodegenerator\QRCode $qrcode
     */ 
    protected $qrcode;

    public function __construct($qrcode)
    {
        $this->qrcode = $qrcode;
    }
    
    /**
     * QRFactory 
     *
     * @return peal\qrcodegenerator\QRCode
     */
    public function qrFactory() {
        
        if ($this->qrcode instanceof QRCode) {

            $this->qrcode = new QRCode();
        }
        
        return $this->qrcode;
    }
}
