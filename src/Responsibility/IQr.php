<?php
namespace peal\qrcodegenerator\Responsibility;

interface IQr {
   /**
     * Url address 
     * 
     * @param string $url
     */
    public function url($url = null);
    
    /**
     * Text content
     * 
     * @param string $text
     */
    public function text($label, $text);
    
    /**
     * Email address
     * 
     * @param string $email
     */
    public function email($email = null);
    
    /**
     * Phone number
     * 
     * @param string $phone
     */
    public function phone($phone);
}

