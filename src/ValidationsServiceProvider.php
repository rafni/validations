<?php

namespace Rafni\Validations;

use Illuminate\Support\ServiceProvider;

class ValidationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom($this->getPublishedTranslationsDirectory(), 'validation');
        $this->loadTranslationsFrom($this->getTranslationsDirectory(), 'validation');
        $this->publishFiles();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Publish modifiable files of the module to make adaptations in them.
     */
    public function publishFiles()
    {
        $this->publishes([
            $this->getTranslationsDirectory() => $this->getPublishedTranslationsDirectory(),
        ]);
    }
    
    /**
     * Obtain the absolute path of the package translations directory
     * published in the application directory
     * 
     * @return string
     */
    public function getPublishedTranslationsDirectory()
    {
        return resource_path('lang/vendor/rafni-validation');
    }
    
    /**
     * Obtain the absolute path of the package translations directory
     * 
     * @return string
     */
    public function getTranslationsDirectory()
    {
        return dirname(__DIR__) . '/lang';
    }
}
