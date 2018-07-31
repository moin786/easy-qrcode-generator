<?php

namespace peal\qrcodegenerator\Abstraction;

use peal\qrcodegenerator\Responsibility\IQr;

abstract class Qabstract implements IQr
{
    /**
     * Url address 
     * 
     * @param string $url
     */
    public function url($url = null) {
        
    }
    
    /**
     * Text content
     * 
     * @param string $text
     */
    public function text($label, $text) {
        
    }
    
    /**
     * Email address
     * 
     * @param string $email
     */
    public function email($email = null) {
        
    }
    
    /**
     * Phone number
     * 
     * @param string $phone
     */
    public function phone($phone) {
        
    }
    
    /**
     * QR code generator
     */
    abstract function QrCode($size = 400);
}
