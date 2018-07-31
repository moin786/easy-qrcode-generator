<?php
namespace peal\qrcodegenerator\Server;
use Illuminate\Container\Container;
use peal\qrcodegenerator\QRCode;

class QrServer 
{
  
    
    public function qrFactory($q) {
        
        $qr = null;
        
        switch($q) {
            
            case "QRCode":
                $qr = new QRCode();
                break;
        }
        
        return $qr;
    }
}
