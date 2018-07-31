<?php

/**
 * Can use route from here
 */

Route::get("/testqr",function(){
    
    
    try {
        
        //Using Facades
        
        $qrcontent = QR::qrFactory("QRCode")
                ->email("moinuddin7@gmail.com")
                ->phone("01716187302")
                ->url("https://moinshareidea.wordpress.com/")
                ->text("position:","Lead Developer at GrubDealz Inc.")
                ->QrCode(200);

        //Without Facades
        
        $qr = App::make('QR');

        $qrcontent = $qr->qrFactory("QRCode")
                ->email("moinuddin7@gmail.com")
                ->phone("01716187302")
                ->text("website:","https://moinshareidea.wordpress.com/")
                ->text("position:","Lead Developer at GrubDealz Inc.")
                ->QrCode(200);
        
        //Without Laravel, can be usable any php or php framework 
        
        $qr = new \peal\qrcodegenerator\Server\QrServer("QRCode");
        
        $qrcontent = $qr->qrFactory("QRCode")
                ->email("moinuddin7@gmail.com")
                ->phone("01716187302")
                ->text("website:","https://moinshareidea.wordpress.com/")
                ->text("position:","Lead Developer at GrubDealz Inc.")
                ->QrCode(200);
    
        return '<p class="center"><img src="' . $qrcontent . '" alt="QR Code" /></p>';
    } catch(Exception $e) {
        return $e->getMessage();
    }
});
