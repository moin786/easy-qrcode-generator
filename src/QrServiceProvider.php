<?php
namespace peal\qrcodegenerator;
use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

use peal\qrcodegenerator\Server\QrServer;
use peal\qrcodegenerator\QRCode;

class QrServiceProvider extends ServiceProvider {
    
    public function register() {
        $this->registerQR();
    }
    
    /**
     * QR application
     * 
     * @return object [access pdf services]
     */
    
    public function registerQR() {
        $this->app->bind('QR', function(){
            return new QrServer(new QRCode());
        });
        
        $this->app->alias('QR', QR::class);
    }
    
    
    /**
     * Setup the application configuration
     * 
     */
    protected function setupConfig()
    {
        $config_source = realpath(__DIR__.'/../config/qr-config.php');
        
        // Check app instance is Laravel or lumen 
        if ($this->app instanceof LaravelApplication) {
            
            $this->publishes([
                $config_source => config_path('qr-config.php')
            ]);
            
        } elseif ($this->app instanceof LumenApplication) {
            
            $this->app->configure('qr-config');
            
        }
        $this->mergeConfigFrom($config_source, 'qr-config');
    }
    
    /*
     * Load routes if needed from package
     * 
     * 
     */
    protected function loadRoute() {
        
        require __DIR__ . '/routes.php';
        
    }
    
    /*
     * Booting our routes and configuration
     */
    public function boot() {
        
        $this->loadRoute();
        
        $this->setupConfig();
    }
}