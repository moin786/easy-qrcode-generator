<h1 align="center">Laravel Package for QR Code generator in easy way.</h1>

<p align="center">
    A QR code (quick response code) is a type of 2D bar code that is used to provide easy access to information through a smartphone. In this process, known as mobile tagging, the smartphone's owner points the phone at a QR code and opens a barcode reader app which works in conjunction with the phone's camera.
</p>

## Installation

Inside your project root directory, open your terminal

```shell
composer require peal/qrcode-generator
```

Composer will automatically download all dependencies.

#### For Laravel

After complete the installation, open your app.php from config folder, paste below line inside providers array 

```php
peal\qrcodegenerator\QrServiceProvider::class,
```

For Facade support, paste below line inside aliases array

```php
'QR' => peal\qrcodegenerator\QR::class,
```

Then run this command

```shell
php artisan vendor:publish --provider="peal\qrcodegenerator\QrServiceProvider"
```
After vendor published check your config folder qr-config.php is created.

```php
/*
 * QR api url
 * 
 */

return [
    'qrapi'  => 'https://chart.googleapis.com/chart?',
];
```

### USAGES 

```php
try {
        
        //Using Facades
        
        $qrcontent = QR::qrFactory("QRCode")
                ->email("moinuddin7@gmail.com")
                ->phone("01716187302")
                ->url("https://moinshareidea.wordpress.com/")
                ->text("position:","Lead Developer at GrubDealz Inc.")
                ->QrCode(200);

        return '<p class="center"><img src="' . $qrcontent . '" alt="QR Code" /></p>';

} catch(Exception $e) {

    return $e->getMessage();

}

try {
        
        //Without Facades
        
        $qr = App::make('QR');

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

try {
        
        //Without Laravel, can be usable any php or php framework 
        
        $qr = new \peal\qrcodegenerator\Server\QrServer();
        
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

```

### Author

[Mohammed Minuddin(Peal)](https://moinshareidea.wordpress.com)
