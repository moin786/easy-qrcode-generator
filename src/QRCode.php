<?php
namespace peal\qrcodegenerator;

use Illuminate\Container\Container;
use peal\qrcodegenerator\Abstraction\Qabstract;

class QRCode extends Qabstract
{
    private $qrdata;
    
    public function __construct() {}
    
    /**
     * Url address 
     * 
     * @param string $url
     * 
     * @return $this
     */
    public function url($url = null) {
        
        if (filter_var($url, FILTER_VALIDATE_URL) && isset($url)) {
        
            $this->qrdata .= "URL:" .$url ."\n\r";
            
            return $this;
            
        }
        
        throw new \RuntimeException("Provided url {$url} is not valid");
    }
    
    /**
     * Text content
     * 
     * @param string $text
     * 
     * @return $this
     */
    public function text($label, $text) {
        
        if (is_string($text) 
                && is_string($label) 
                && isset($text) 
                && isset($label)) {
            
            $this->qrdata .= strtoupper($label). $text. "\n\r";
            
            return $this;
            
        }
        
        
        throw new \RuntimeException("Content should be string");
    }
    
    /**
     * Email address
     * 
     * @param string $email
     * 
     * @return $this
     */
    public function email($email = null) {
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && isset($email)) {
        
            $this->qrdata .= "EMAIL: ".$email. "\n\r";
            
            return $this;
            
        }
        
        throw new \RuntimeException("Provided email {$email} is not valid");
        
    }
    
    /**
     * Phone number
     * 
     * @param string $phone
     * 
     * @return $this
     */
    public function phone($phone) {
        
        if (is_string($phone) && isset($phone)) {
            
            $this->qrdata .= "PHONE: ".$phone. "\n\r";
            
            return $this;
            
        }
        
        throw new \RuntimeException("Phone number should be string");
    }
    
    /**
     * QR code generator
     */
    public function QrCode($size = 400) {
        
        return app('config')['qr-config.qrapi']."chs={$size}x{$size}&cht=qr&choe=UTF-8&chl=" . urlencode($this->qrdata);
    }
}
