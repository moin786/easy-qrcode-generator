<?php
namespace peal\qrcodegenerator\Server;
use Illuminate\Container\Container;
use peal\qrcodegenerator\QRCode;

class QrServer 
{
  
    /**
     * Undocumented function
     *
     * @param peal\qrcodegenerator\QRCode $qrcode
     * @return void
     */
    protected $qrcode;

    public function __construct($qrcode)
    {
        $this->qrcode = $qrcode;
    }
    
    public function qrFactory() {
        
        if ($this->qrcode instanceof QRCode) {

            $this->qrcode = new QRCode();
        }
        
        return $this->qrcode;
    }
}
