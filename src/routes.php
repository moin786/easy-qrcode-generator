<?php

/**
 * Can use route from here
 */

Route::get("/testqr",function(){
    
    
    try {
        
        //Using Facades
        
        $qrcontent = QR::qrFactory("QRCode")
                ->email("shakil.ce.bdgmail.com")
                ->phone("01936208414")
                ->text("website:","http://bca-bd.com")
                ->text("position:","Designer")
                ->QrCode(100, "qrcode.png");

        //Without Facades
        
        $qr = App::make('QR');

        $qrcontent = $qr->qrFactory("QRCode")
                ->email("shakil.ce.bd@gmail.com")
                ->phone("01936208414")
                ->text("website:","http://bca-bd.com")
                ->text("position:","Designer")
                ->QrCode(100, "qrcode.png");
        
        //Without Laravel, can be usable any php or php framework 
        
        $qr = new \peal\qrcodegenerator\Server\QrServer("QRCode");
        
        $qrcontent = $qr->qrFactory("QRCode")
                ->email("shakil.ce.bd@gmail.com")
                ->phone("01936208414")
                ->text("website:","http://bca-bd.com")
                ->text("position:","Designer")
                ->QrCode(100, "qrcode.png");
    
        return '<p class="center"><img src="' . $qrcontent . '" alt="QR Code" /></p>';
    } catch(Exception $e) {
        return $e->getMessage();
    }
});